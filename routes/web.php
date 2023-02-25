<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\NewspaperNameClearanceController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\SubsectionController;
use App\Http\Controllers\Backend\UserControlController;
use App\Http\Controllers\Backend\VideoPostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// user 
Route::post('/emiail/verification/code',[VerificationController::class,'emaliVerification'])->name('email-verification-code');

Auth::routes(['verify' => true]);

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
    Route::get('/admin/posts/section/{id}',[PostController::class,'getSubcategory'])->name('admin.posts.getsubsection');

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
});

