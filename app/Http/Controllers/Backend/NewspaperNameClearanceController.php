<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsPaperNameClearance;
use App\Models\NewspaperNameClearanceHeader;
use Illuminate\Http\Request;

class NewspaperNameClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clearences_header = NewspaperNameClearanceHeader::first();
        $newspaper_clearenc = new NewsPaperNameClearance(); 
        $newspaper_clearences = NewsPaperNameClearance::orderBy('input_position','asc')->get();
        return view('backend.newspaper_clearence.index',compact('newspaper_clearences','newspaper_clearenc','clearences_header'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'input_name' => 'required|unique:newspaper_name_clearances,input_name',
            'input_position' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = str_slug($data['input_name']);

        NewsPaperNameClearance::create($data);
        return back()->with('message','Input file add successfully');
    }

    public function headerStore(Request $request){
        $request->validate([
            'title' => 'required|min:15|max:150',
            'short_text' => 'required|min:40',
        ]);
        $item = NewspaperNameClearanceHeader::first();
        if($item){
            $item->delete();
        }

        $data = $request->all();
        NewspaperNameClearanceHeader::create($data);

        return back()->with('message','The old data hsa been deleted and updated the new data');



    }

    public function edit(NewsPaperNameClearance $newsPaperNameClearance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsPaperNameClearance  $newsPaperNameClearance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPaperNameClearance $newsPaperNameClearance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsPaperNameClearance  $newsPaperNameClearance
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPaperNameClearance $newsPaperNameClearance)
    {
        //
    }
}
