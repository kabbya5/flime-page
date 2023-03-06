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

    public function downloadBook(Post $post){
        $file = $post->file_url;
        $name = $post->post_name . '.pdf';
        $header = ['Content-Type: application/pdf'];

        return response()->download($file,$name,$header);
    }
}
