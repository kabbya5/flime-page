<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        $images = Image::latest()->get();
        $categories = Category::orderBy('category_position','asc')->get();
        return view('test.image.index',compact('categories','images'));
    }

    public function categoryImage($status){
        $categories = Category::orderBy('category_position','asc')->get();
        $category = Category::where('slug',$status)->with(['images' => function($e){
            $e->latest()->get();
        }])->first();

        $images = $category->images;
        return view('test.image.index',compact('categories','images'));
    }

    public function create(){
        $image = new Image();
        $categories = Category::all();
        return view('test.image.create',compact('image','categories'));
    }

    public function store(Request $request){
        $request->validate([
            'image_name' => 'required',
            'image_path' => 'required|mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ],[
            'category_id.required' => 'category name field required',
        ]);
        $data = $request->except('old_image','image_path');

        if($request->hasFile('image_path')){
          $data['image_path'] =  $this->uploadImage($request->file('image_path'));
        }
       
        Image::create($data);

        return redirect()->route('images.index')->with('message','Success');
    }

    private function uploadImage($image){
        $file_name = hexdec(uniqid()).time().'.'.$image->getClientOriginalExtension();
        \Image::make($image)->resize(500,600)->save(public_path('/media/test/'.$file_name));

        return 'media/test/'.$file_name;
    }

    public function edit(Image $image){
        $categories = Category::all();
        return view('test.image.edit',compact('image','categories'));
    }

    public function update(Request $request,Image $image){
        $request->validate([
            'image_name' => 'required',
            'image_path' => 'mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ],[
            'category_id.required' => 'category name field required',
        ]);
        $data = $request->except('old_image','image_path');

        if($request->hasFile('image_path')){
          $data['image_path'] =  $this->uploadImage($request->file('image_path'));
          $this->deleteImage($request->old_image);
        }

        $image->update($data);
        return redirect()->route('images.index')->with('message','Success');
    }

    private function deleteImage($image){
        if(file_exists('image')){
            unlink($image);
        }
    }
}
