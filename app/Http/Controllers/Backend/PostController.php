<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->where('post_type','PDF')->paginate(25);        
        return view('backend.post.index',compact('posts'));
    }


    public function create(){
        $post = new Post();
        $section = Section::where('section_position',2)->first();
        return view('backend.post.create',compact('section','post'));
    }

    // pdf post 

    public function store(PostStoreRequest $request)
    {
        $data = $request->except('pdf_file','thumbnail','old_file','old_thumbnail');
        
        if($request->hasFile('thumbnail')){
            $thumbnail = $this->fileUpload($request->file('thumbnail'),NULL,'image');
            $data['thumbnail'] = $thumbnail;
        }

        if($request->hasFile('pdf_file')){
            $file = $this->fileUpload($request->file('pdf_file'),NULL,'pdf');
            $data['file_url'] = $file;
        }
        
        $data['slug'] = str_replace(' ','-',$data['post_name']).time();

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('message',"The book Post has been created successfully");
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

            }elseif($file_type =='pdf'){
                $file_name = hexdec(uniqid()).time().".".$file->getClientOriginalExtension();
                $file->move(public_path('/media/post/pdf/'), $file_name);
                return 'media/post/pdf/'.$file_name;  
            }    
        }
    }

    public function duplicatePost(Post $post){
        $section = Section::where('section_position',2)->first();
        return view('backend.post.create',compact('post','section'));
    }


        
   

    private function deleteFile($file){
        if(file_exists($file)){
            unlink($file);
        }
    }

    public function edit(Post $post)
    {
        $section = Section::where('section_position',2)->first();
        return view('backend.post.edit',compact('post','section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->except('pdf_file','thumbnail','old_file','old_thumbnail');
        
        if($request->hasFile('thumbnail')){
            $thumbnail = $this->fileUpload($request->file('thumbnail'),$request->old_thumbnail,'image');
            $data['thumbnail'] = $thumbnail;
        }

        if($request->hasFile('pdf_file')){
            $file = $this->fileUpload($request->file('pdf_file'),$request->old_file,'pdf');
            $data['file_url'] = $file;
        }

        if($request->published_at == null){
            unset($data['published_at']);
        }

        $post->update($data);
    }

   
    public function destroy(Post $post)
    {
        $this->deleteFile($post->file_url);
        $this->deleteFile($post->thumbnail);
        $post->delete();

        return back()->with('message','Successfully Deleteted Publication');
    }
}
