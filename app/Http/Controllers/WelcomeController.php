<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Section;

class WelcomeController extends Controller
{
    public function index(){
        $flim_posts = Post::latest()->where('post_type','VIDEO')->limit(20)->get();
        $sections = Section::orderBy('section_position','asc')->get();
        
        $first_section = $sections->first();
        $second_section = $sections[1];
        $last_section = $sections->last();
        return view('welcome',compact(
            'flim_posts',
            'first_section',
            'second_section',
            'last_section',
        ));
    }
}
