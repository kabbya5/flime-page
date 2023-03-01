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
        $results = Post::latest()->where('subsection_id',$subsection->id)->paginate(30);
        return view('post.video_subsection_post',compact('results','subsection'));

    }
}
