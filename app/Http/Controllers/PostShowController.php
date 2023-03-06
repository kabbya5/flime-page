<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use App\Models\Subsection;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class PostShowController extends Controller
{
    public function videoPosts(Section $section){
        $documentaries = Subsection::where('slug','ডকুমেন্টারি')->with(['posts'=> function($e){
            $e->latest()->limit(25)->get();
        }
        ])->first();
        $flims = Subsection::where('slug','চলচ্চিত্র')->with(['posts' => function($e){
            $e->latest()->limit(25)->get();
        }])->first();
        
        $short_flims = Subsection::where('slug','শর্ট-ফিল্ম')->with(['posts' => function($e){
            $e->latest()->limit(25)->get();
        }])->first();
        $news = Subsection::where('slug','নিউজ')->with(['posts' => function($e){
            $e->latest()->limit(25)->get();
        }])->first();

        return view('post.all_video_posts',compact(
            'documentaries',
            'flims',
            'short_flims',
            'news',
        ));
    }

    public function videoSubsectionPosts(Subsection $subsection)
    {
        $posts = Post::latest()->where('subsection_id',$subsection->id)->paginate(30);
        return view('post.video_subsection_post',compact('posts','subsection'));

    }


    public function bookPosts(Section $section){
        $pictorials = Subsection::where('slug','সচিত্র-বাংলাদেশ')->with(['posts'=> function($e){
            $e->latest()->limit(25)->get();
        }
        ])->first();
        $menstruals = Subsection::where('slug','মাসিক-নবারুণ')->with(['posts' => function($e){
            $e->latest()->limit(25)->get();
        }])->first();
        
        $quarterlies = Subsection::where('slug','বাংলাদেশ-কোয়ার্টারলি')->with(['posts' => function($e){
            $e->latest()->limit(25)->get();
        }])->first();
        $publications = Subsection::where('slug','অ্যাডহক-প্রকাশনা')->with(['posts' => function($e){
            $e->latest()->limit(25)->get();
        }])->first();

        return view('post.all_book_posts',compact(
            'pictorials',
            'menstruals',
            'quarterlies',
            'publications',
        ));
    }

    public function bookSubsectionPosts(Subsection $subsection)
    {
        $posts = Post::latest()->where('subsection_id',$subsection->id)->paginate(30);
        return view('post.book_subsection_post',compact('posts','subsection'));

    }
}
