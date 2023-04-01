<?php

namespace App\Http\Controllers;

use App\Models\Bibliograpy;
use App\Models\MediaInputHeader;
use App\Models\NewspaperNameClearanceHeader;
use App\Models\Post;
use App\Models\Section;
use App\Models\Subsection;
use App\Models\TotalRegistered;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class PostShowController extends Controller
{
    
    public function videoSubsectionPosts(Subsection $subsection)
    {
        $posts = Post::latest()->where('subsection_id',$subsection->id)->paginate(30);
        return view('post.video_subsection_post',compact('posts','subsection'));

    }


    public function bookSubsectionPosts(Subsection $subsection)
    {
        $posts = Post::latest()->where('subsection_id',$subsection->id)->paginate(30);
        return view('post.book_subsection_post',compact('posts','subsection'));

    }

    public function bibliograpyPost(){
        $bibliograpy_posts = Bibliograpy::paginate(30); 
        $clearence = NewspaperNameClearanceHeader::first();

        return view('post.bibliograpy_post',compact('bibliograpy_posts','clearence'));
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
                            <div class="youtube relative" video-id="'.$data->video_link .'">
                                <img src="/media/icon/play.png" class="absolute">
                                <img src="//i.ytimg.com/vi/'.$data->video_link.'/hqdefault.jpg" class="video-image">
                            </div>
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
