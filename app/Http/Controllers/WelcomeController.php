<?php

namespace App\Http\Controllers;

use App\Models\MediaInput;
use App\Models\MediaInputHeader;
use App\Models\NewspaperNameClearance;
use App\Models\NewspaperNameClearanceHeader;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Section;

class WelcomeController extends Controller
{
    public function index(){
        $flim_posts = Post::latest()->where('post_type','VIDEO')->limit(20)->get();
        $book_posts = Post::latest()->where('post_type','PDF')->limit(25)->get();
        $sections = Section::orderBy('section_position','asc')->get();
        
        $first_section = $sections->first();
        $second_section = $sections[1];
        $last_section = $sections->last();

        $newspaper_name_clearances_inputs = NewspaperNameClearance::orderBy('input_position', 'asc')->get();
        $news_header = NewspaperNameClearanceHeader::first();

        $media_inputs = MediaInput::orderBy('input_position','asc')->get();
        $media_header = MediaInputHeader::first();
        return view('welcome',compact(
            'flim_posts',
            'first_section',
            'second_section',
            'last_section',
            'book_posts',
            'newspaper_name_clearances_inputs',
            'news_header',
            'media_inputs',
            'media_header',
        ));
    }
}
