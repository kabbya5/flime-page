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
        $posts = Post::latest()->with('section','subsection')->paginate(25);
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
        $sections = Section::OrderBy('section_position','asc')->get();
        return view('backend.video_post.create',compact('post','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoPostReequest $request)
    {
        $data = $request->except('video_file','thumbnail', 'old_thumbnail', 'old_video_file' );

        if($request->hasFile('thumbnail')){
            $thumbnail = $this->fileUpload($request->file('thumbnail'),NULL,'image');
            $data['thumbnail'] = $thumbnail;
        }

        if($request->hasFile('thumbnail')){
            $file = $this->fileUpload($request->file('video_file'),NULL,'video');
            $data['file_url'] = $file;
        }

        $data['slug'] = str_replace(' ','-',$data['post_name']);
        Post::create($data);

        return redirect()->route('admin.video.posts.index')->with('message',"The book Post has been created successfully");
    }

    private function fileUpload($file,$old_file,$file_type){
        if($file){
            if($old_file){
                $this->deleteFile($old_file);
            }

            if($file_type == 'image'){
                $file_name = hexdec(uniqid()).time().".".$file->getClientOriginalExtension();
                \Image::make($file)->resize(200,260)->save(public_path('/media/post/image/'.$file_name));
                
                return 'media/post/image/'.$file_name;

            }elseif($file_type =='video'){
                $file_name = hexdec(uniqid()).time().".".$file->getClientOriginalExtension();
                $file->move(public_path('/media/post/video/'), $file_name);
                return 'media/post/video/'.$file_name;  
            }    
        }
    }

    private function deleteFile($file){
        if(file_exists($file)){
            unlink($file);
        }
    }

    public function duplicatePost($slug,Post $post){
        $sections = Section::orderBy('section_position','asc')->get();
        return view('backend.video_post.create',compact('post','sections'));
    }

  
  
    public function edit($slug,Post $post)
    {
        $sections = Section::OrderBy('section_position','asc')->get();
        return view('backend.video_post.edit',compact('post','sections'));
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
        $data = $request->except('video_file','thumbnail', 'old_thumbnail', 'old_video_file' );
        
        if($request->hasFile('thumbnail')){
            $thumbnail = $this->fileUpload($request->file('thumbnail'),NULL,'image');
            $data['thumbnail'] = $thumbnail;
        }

        if($request->hasFile('thumbnail')){
            $file = $this->fileUpload($request->file('video_file'),NULL,'video');
            $data['file_url'] = $file;
        }
        
        $data['slug'] = str_replace(' ','-',$data['post_name']);
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