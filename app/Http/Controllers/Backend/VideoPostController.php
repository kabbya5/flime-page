<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoPostReequest;
use App\Models\Post;
use App\Models\Section;

class VideoPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with('section','subsection')->where('post_type','VIDEO')->paginate(25);
        return view('backend.video_post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $section = Section::OrderBy('section_position','asc')->first();
        return view('backend.video_post.create',compact('post','section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoPostReequest $request)
    {
        $data = $request->except('video_file', 'old_video_file' );

        if($request->hasFile('video_file')){
            $file = $this->fileUpload($request->file('video_file'),NULL);
            $data['file_url'] = $file;
        }

        $data['slug'] = str_replace(' ','-',$data['post_name']).time();
        Post::create($data);
    }

    private function fileUpload($file,$old_file){
        if($file){
            if($old_file){
                $this->deleteFile($old_file);
            }
            $file_name = hexdec(uniqid()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path('/media/post/video/'), $file_name);
            return 'media/post/video/'.$file_name;     
        }
    }

    private function deleteFile($file){
        if(file_exists($file)){
            unlink($file);
        }
    }

    public function duplicatePost(Post $post){
        $section = Section::orderBy('section_position','asc')->first();
        return view('backend.video_post.create',compact('post','section'));
    }

  
  
    public function edit(Post $post)
    {
        $section = Section::OrderBy('section_position','asc')->get()->first();
        return view('backend.video_post.edit',compact('post','section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(VideoPostReequest $request, Post $post)
    {
        $data = $request->except('video_file','old_video_file' );
        
        if($request->hasFile('video_file')){
            $file = $this->fileUpload($request->file('video_file'),$request->old_video_file);
            $data['file_url'] = $file;
            $data['video_link'] = ' ';
        }

        if($request->published_at == NULL){
            unset($data['published_at']);
        }
        $post->update($data);
    }

    public function destroy(Post $post)
    {
        $this->deleteFile($post->thumbnail);
        $this->deleteFile($post->file_url);

        $post->delete();

        return back()->with('message','The has been delete successfully');
    }
}
