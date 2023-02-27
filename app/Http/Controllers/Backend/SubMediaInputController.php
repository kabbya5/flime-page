<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubMediaInput;
use App\Models\MediaInput;
use Illuminate\Http\Request;

class SubMediaInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = new SubMediaInput(); 
        $media_inputs = MediaInput::orderBy('input_position','asc')->get();
        $subinputs = SubMediaInput::orderBy('media_input_id','asc')->orderBy('input_position','asc')->get();
        return view('backend.sub_media_input.index',compact('media_inputs','input','subinputs'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'input_name' => 'required|unique:newspaper_name_clearances,input_name',
            'input_position' => 'required',
            'media_input_id' => 'required',
        ]);

        $data = $request->all();

        SubMediaInput::create($data);
        return back()->with('message','Input file add successfully');
    }


    public function edit(SubMediaInput $input)
    {
        return view('backend.sub_media_input.edit',compact('input'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMediaInput  $subMediaInput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubMediaInput $input)
    {
        $data=$request->all();
        if(!$request->has('need_file')){
            $data['need_file'] = 'text';
        }
        $input->update($data);

        return redirect()->route('admin.submedia.inputs.index')->with('message', 'The input section has been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMediaInput  $subMediaInput
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMediaInput $input)
    {
        $input->delete();
        return back()->with('message','Successfully deleted input section');
    }
}
