<?php

namespace App\Http\Controllers;

use App\Models\MediaInputHeader;
use App\Models\Post;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\TotalRegistered;
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

    public function mediaNews(){
        $registers = TotalRegistered::latest()->get();
        $media = MediaInputHeader::first();

        return view('post.media_register',compact('registers','media'));
    }

    public function ajaxSubsectionVideoPosts(Request $request,$id){
        if($request->ajax()){
            $datas =  Post::where('subsection_id',$id)->latest()->get();
            $posts = '';
            $posts .=  '<div  class="owl-carousel owl-theme post-slider post-book w-full grid grid-cols-12 gap-4 mt-10">';
            foreach ($datas as $data){
                if($data->file_url){
                    $posts.='
                    
                        <div class="item">  
                            <div class="video">
                                <video width="500px" height="500px" controls="controls"/>
                                
                                <source src="/'.$data->file_url.'" type="video/mp4"> 
                            </div>                             
                                        
                            <a href="/video/posts/' .$data->slug .'" class="font-[700] text-black block my-4">'.$data->post_name .'</a>
                        
                    </div>';
                }else{
                    $posts.='
                        <div class="item">
                            <iframe width="560" height="315" src="'. $data->video_link .'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <a href="/video/posts/' .$data->slug .'" class="font-[700] text-black block my-4"> '.$data->post_name .'</a>
                        
                    </div>';
                }
            }  
            
            $posts .= '</div>';
            return $posts;
        }

    }
    public function ajaxSubsectionBookPosts(Request $request,$id){
        if($request->ajax()){
            $datas =  Post::where('subsection_id',$id)->latest()->get();
            $posts = '';
            $posts .=  '<div class="mt-10 grid grid-cols-12 gap-4 overflow-hidden owl-carousel owl-theme post-book-slider pr-4">';
            foreach ($datas as $data){

                $posts .= '<div class="item">
                                <a href="/book/post/details/'.$data->slug .'">
                                    <img class="book-img" src="/'.$data->thumbnail.'" alt="'.$data->post_name .'">
                                </a>
                                <a href="/book/post/details/'.$data->slug .'" class="font-[700] text-black block my-4"> '.$data->post_date .'</a>
                            </div>';
            }  
            
            $posts .= '</div>';
            return $posts;
        }
    }
}
