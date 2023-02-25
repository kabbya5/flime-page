<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = new Post();
        $sections = Section::orderBy('section_position','asc')->get();
        $results = Post::latest()->where('post_type','PDF')->with('section','subsection')->get();
        $posts = '';
        if ($request->ajax()) {
            foreach ($results as $result) {
                $posts.= '<tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">' .
                                '<td>
                                    <div class="px-3 flex text-center  py-[24px]">' .
                                        '<p class="font-700 text-[14px] leading-[21px] text-black">' .$result->slug .'</p>'.
                                    '</div>' .
                               '</td>' .
                                
                                '<td class="text-left mr-4">' .
                                    '<p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">' .$result->section->section_name.'</p>' .
                                '</td>' .
                                '<td class="text-left mr-4">' .
                                    '<p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">' .$result->subsection->subsection_name.'</p>' .
                                '</td>' .
                                '<td class="text-left mr-4">' .
                                    '<p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93] uppercase">' .$result->post_type .'</p>' .
                                '</td>' .

                                '<td class="text-left mr-4">' .
                                    '<p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93] uppercase">' .$result->post_title .'</p>' .
                                '</td>' .

                                '<td class="text-left mr-4">' .
                                    '<p class="font-[600]  text-[14px] leading-[21px] text-[#8E8E93] uppercase">' .$result->status .'</p>' .
                                '</td>' .
                                
                                // '<td class="text-center">' .           
                                //     '<div class="flex">' .
                                    
                                //         '<a href="{{ route("'.'"admin.posts.edit",'.$result->slug .'") }}"' . 'class="ml-4">' .
                                //             '<i class="fa-regular fa-pen-to-square"></i>' .
                                //         '</a>'.
                                //     '</div>' .
                                // '</td>'.
                                '<td class="text-right">' .            
                                    '<div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">' .
                                        '<span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>' .
                                        '<span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>'.
                                        '<span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>'.

                                        '<div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">'.
                                            '<a href="/admin/posts/edit/"'. $result->slug .'class="btn text-[#56595">'.
                                                '<i class="fa-solid fa-edit mr-[10px]"></i>' .'Edit'.
                                            '</a>'.
                                            '<a class="btn text-[#565956]">'.
                                                '<i class="fa-solid fa-edit mr-[10px]"></i>' . 'Edit' .
                                            '</a>'.
                                            '<a class="btn text-[#565956">
                                                <i class="fa-solid fa-trash mr-[10px]"></i>'.'Delete'.
                                            '</a>'.
                                        '</div>'.
                                    '</div>'.
                                '</td>'.
                            '</tr>';
            }
            return $posts;
        }
        
        return view('backend.post.index',compact('posts','post','sections'));
    }


    public function getSubcategory(Request $request,$id){
        $section = Section::where('id',$id)->with('subsections')->first();
        $subsections = $section->subsections;
        
        return response()->json($subsections);
        
    }

    // pdf post 

    public function store(PostStoreRequest $request)
    {
        $data = $request->except('pdf_file','thumbnail');
        
        $thumbnail = $this->fileUpload($request->file('thumbnail'),NULL,'image');
        $file = $this->fileUpload($request->file('pdf_file'),NULL,'pdf');

        $data['thumbnail'] = $thumbnail;
        $data['file_url'] = $file;

        $data['slug'] = $data['post_name'].'-'.$data['post_title'];

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

    private function deleteFile($file){

    }

    
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
