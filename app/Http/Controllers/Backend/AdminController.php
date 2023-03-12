<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard($slug){
        $files = File::latest()->paginate(25);
        return view('backend.dashboard',compact('files'));
    }

    public function mediaFile(){
        $files = File::latest()->whereNotNull('media_id')->paginate(25);
        return view('backend.dashboard',compact('files'));
    }

    public function clearencFile(){
        $files = File::latest()->whereNotNull('clearence_id')->paginate(25);
        return view('backend.dashboard',compact('files'));
    }

    public function pictorialBangladeshFile(){
        $files = File::latest()->where('section','=','সচিত্র বাংলাদেশ')->paginate(25);
        return view('backend.dashboard',compact('files'));
    }

    public function menstrualNewbornFile(){
        $files = File::latest()->where('section','=','মাসিক নবারুণ')->paginate(25);
        return view('backend.dashboard',compact('files'));
    }

    public function bangladeshQuarterlyFile(){
        $files = File::latest()->where('section','=','বাংলাদেশ কোয়ার্টারলি')->paginate(25);
        return view('backend.dashboard',compact('files'));
    }
}
