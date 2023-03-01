<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\MediaInputController;
use App\Http\Controllers\Backend\MediaRegisteredController;
use App\Http\Controllers\Backend\NewspaperNameClearanceController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubMediaInputController;
use App\Http\Controllers\Backend\SubsectionController;
use App\Http\Controllers\Backend\UserControlController;
use App\Http\Controllers\Backend\VideoPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostShowController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',[WelcomeController::class,'index'])->name('welcome');

// user 
Route::post('/emiail/verification/code',[VerificationController::class,'emaliVerification'])->name('email-verification-code');

Auth::routes(['verify' => true]);

Route::controller(PostShowController::class)->group(function(){
    Route::get('/video/posts','videoPosts')->name('video.posts');
    Route::get('/video/subsections/posts/{subsection}','videoSubsectionPosts')->name('video.subsection.posts');
    Route::get('/subsection/{subsection}/posts','subsectionPosts')->name('subsection.posts');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth','verified']], function (){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/profile', 'index')->name('home');
        Route::put('/profile/update/','updateProfile')->name('user.profile.update');
        Route::put('/password/update/','updatePassword')->name('user.password.update');
        Route::delete('/{slug}/delete/{id}', 'destroyAccount')->name('user.delete');
    });
});



Route::group(['prefix' => 'admin', 'middleware' =>['auth','admin','verified']],
function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/dasboard/{slug}/','adminDashboard')->name('admin.dashboard');
    });

    Route::controller(SectionController::class)->group(function(){
        Route::get('/sections','index')->name('admin.sections.index');
        Route::get('/sections/create', 'create')->name('admin.sections.create');
        Route::post('/sections/store','store')->name('admin.sections.store');
        Route::get('/sections/{section}/edit','edit')->name('admin.sections.edit');
        Route::put('/sectons/{section}/update','update')->name('admin.sections.update');
    });

    Route::resource('/subsections',SubsectionController::class,[
        'as' => 'admin'
    ]);

    Route::resource('/posts',PostController::class,[
        'as' => 'admin'
    ]);
    Route::get('/posts/section/{id}',[PostController::class,'getSubcategory'])->name('admin.posts.getsubsection');
    Route::get('/posts/{slug}/duplicate/{post}',[PostController::class,'duplicatePost'])->name('admin.posts.duplicate');

    Route::resource('/video/posts',VideoPostController::class,[
        'as' => 'admin.video'
    ])->except('edit','show');
    Route::get('/video/posts/{slug}/edit/{post}',[VideoPostController::class,'edit'])->name('admin.video.posts.edit');
    Route::get('/video/posts/{slug}/duplicate/{post}',[VideoPostController::class,'duplicatePost'])->name('admin.video.posts.duplicate');

    Route::controller(UserControlController::class)->group(function(){
        Route::get('/users','index')->name('admin.users.index');
        Route::get('/users/{slug}/edit/{id}','edit')->name('admin.users.edit');
        Route::put('/users/{slug}/update/{id}','update')->name('admin.users.update');
    });

    Route::resource('/newspaper/clearence/inputs',NewspaperNameClearanceController::class,[
        'as' => 'admin.clearence'
    ])->except('create','show');

    Route::post('/newspaper/clearence/header',[NewspaperNameClearanceController::class,'headerStore'])->name('amdin.clearence.header.store');

    Route::resource('/media/registereds',MediaRegisteredController::class,[
        'as' => 'admin.media'
    ]);
    Route::get('/admin/media/registereds/duplicate/{registered}',[MediaRegisteredController::class,'duplicate'])->name('admin.media.registereds.duplicate');

    Route::resource('/media/inputs',MediaInputController::class,[
        'as' => 'admin.media'
    ])->except('create','show');

    Route::post('/media/header',[MediaInputController::class,'headerStore'])->name('amdin.media.header.store');

    Route::controller(SettingController::class)->group(function(){
        Route::get('/setting/index','index')->name('admin.setting.index');
        Route::post('/setting/store','store')->name('admin.setting.store');
    });

    Route::resource('/submedia/inputs',SubMediaInputController::class,[
        'as' => 'admin.submedia'
    ])->except('create','show');
});

