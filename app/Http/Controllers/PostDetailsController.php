<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostDetailsController extends Controller
{
    public function videoPostDetails(Post $post){
        return view('post.video_post_details',compact('post'));
    }

    public function bookDetails(Post $post){
        return view('post.book_post_details',compact('post'));
    }

    public function downloadPost(Post $post){
        $position = strpos($post->file_url,'.');
        $extension = substr($post->file_url,$position + 1);
        $file = $post->file_url;
        $name = $post->post_name . '.'.$extension;
        $header = ['Content-Type: application/'.$extension];
        

        return response()->download($file,$name,$header);
    }
}
