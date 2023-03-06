<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MediaInput;
use App\Models\MediaInputHeader;
use Illuminate\Http\Request;

class MediaInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media_header = MediaInputHeader::first();
        if(!$media_header){
            $media_header = new MediaInputHeader();
        }
        $input = new MediaInput(); 
        $inputs = MediaInput::orderBy('input_position','asc')->get();
        return view('backend.media_input.index',compact('inputs','input','media_header'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'input_name' => 'required|unique:newspaper_name_clearances,input_name',
            'input_position' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = str_slug($data['input_name']).rand(1,1000);

        MediaInput::create($data);
        return back()->with('message','Input file add successfully');
    }

    public function headerStore(Request $request){
        $request->validate([
            'title' => 'required|min:15|max:150',
            'short_text' => 'required|min:40',
        ]);
        $item = MediaInputHeader::first();
        if($item){
            $item->delete();
        }

        $data = $request->all();
        MediaInputHeader::create($data);

        return back()->with('message','The old data hsa been deleted and updated the new data');



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaInput  $input
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaInput $input)
    {
        return view('backend.media_input.edit',compact('input'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaInput  $input
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaInput $input)
    {
        $data=$request->all();
        if(!$request->has('input_type')){
            $data['input_type'] = 'text';
        }
        $input->update($data);

        return redirect()->route('admin.media.inputs.index')->with('message', 'The input section has been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaInput  $input
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaInput $input)
    {
        $input->delete();
        return back()->with('message','Successfully deleted input section');
    }
}
