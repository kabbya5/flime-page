<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Subsection;
use Illuminate\Http\Request;

class SubsectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsections = Subsection::orderBy('section_id',"asc")->orderBy('subsection_position', 'asc')->get();
        return view('backend.sub_section.index',compact('subsections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subsection = new Subsection();
        $sections = Section::orderBy('section_position','asc')->get();

        return view('backend.sub_section.create',compact('subsection','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subsection_name' => 'required|unique:subsections,subsection_name',
            'slug' => 'required|unique:subsections,slug',
            'subsection_position' => 'integer',
        ]);

        $data = $request->all();
        $data['slug'] = str_replace(' ','-',$data['slug']);

        Subsection::create($data);

        return back()->with('message',"Subsection has been create successfully");
    }

  
    public function edit(Subsection $subsection)
    {
        $sections = Section::orderBy('section_position','asc')->get();
        return view('backend.sub_section.edit',compact('subsection','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subsection  $Subsection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subsection $subsection)
    {
        $request->validate([
            'subsection_name' => 'required|unique:subsections,subsection_name,'.$subsection->id,
            'slug' => 'required|unique:subsections,slug,'.$subsection->id,
            'subsection_position' => 'integer',
        ]);

        $data = $request->all();
        $data['slug'] = str_replace(' ','-',$data['slug']);

        $subsection->update($data);

        return redirect()->route('admin.subsections.index')->with('message',"Subsection has been edit successfully");
    }
}
