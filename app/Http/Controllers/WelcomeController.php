<?php

namespace App\Http\Controllers;

use App\Models\MediaInputHeader;
use App\Models\NewspaperNameClearanceHeader;
use App\Models\Post;
use App\Models\Section;

class WelcomeController extends Controller
{
    public function index(){
        $sections = Section::orderBy('section_position','asc')->with(['subsections' => function($e){
            $e->orderBy('subsection_position','asc');
        }])->get();
        $first_section = $sections->first();
        $second_section = $sections[1];
        $flim_posts = Post::latest()->where('subsection_id',$first_section->subsections[0]->id)->limit(30)->get();
        $book_posts = Post::latest()->where('subsection_id',$second_section->subsections[0]->id)->limit(25)->get();
        $last_section = $sections->last();


        $news_header = NewspaperNameClearanceHeader::first();

       
        $media_header = MediaInputHeader::first();
        return view('welcome',compact(
            'flim_posts',
            'first_section',
            'second_section',
            'last_section',
            'book_posts',
            'news_header',
            'media_header',
        ));
    }
}
