<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(){
        $sections = Section::orderBy('section_position','asc')->get();
        return view('backend.section.index',compact('sections'));
    }

    public function create(){
        $section = new Section();
        return view('backend.section.create',compact('section'));
    }

    public function store(Request $request){
        $request->validate([
            'section_name' => 'required|unique:sections,section_name',
            'section_slug' => 'required|unique:sections,section_slug',
            'section_position' => 'integer',
        ]);

        $data = $request->all();
        Section::create($data);

        return back()->with('message',"Section has been create successfully");

    }

    public function edit(Section $section){
        return view('backend.section.edit',compact('section'));
    }

    public function update(Request $request,Section $section){
        $request->validate([
            'section_name' => 'required|unique:sections,section_name,'.$section->id,
            'section_slug' => 'required|unique:sections,section_slug,'.$section->id,
            'section_position' => 'integer',
        ]);

        $data = $request->all();

        $section->update($data);

        return redirect()->route('admin.sections.index')->with('edit',"Section has been updated successfully");
    }
}
