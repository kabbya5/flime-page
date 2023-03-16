<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::OrderBy('category_position','asc')->with('images')->get();
        return view('test.category.index',compact('categories'));
    }

    public function create(){
        $category = new Category();
        return view('test.category.create',compact('category'));
    }

    public function store(CategoryRequest $request){
        $data = $request->all();
        $data['slug'] = str_slug($data['category_name']);
        Category::create($data);
        return back()->with('message',"The category has been create Successfully");
    }

    public function edit(Category $category){
        return view('test.category.edit',compact('category'));
    }

    public function Update(CategoryRequest $request,Category $category){
        $data = $request->all();
        $data['slug'] = str_slug($data['category_name']);
        $category->update($data);
        return redirect()->route('categories.index')->with('message',"The category has been Updated Successfully");
    }

    public function destroy(Category $category){
        $category->delete();

        return back()->with('message', 'The category has been deleted successfull');
    }
}
