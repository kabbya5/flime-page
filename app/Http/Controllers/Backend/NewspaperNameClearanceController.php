<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
       
        if(!$clearences_header){
            $clearences_header = new NewspaperNameClearanceHeader();
        }
        return view('backend.newspaper_clearence.index',compact('clearences_header'));
    }
    
    

    public function headerStore(Request $request){
        $request->validate([
            'title' => 'required|max:150',
            'short_text' => 'required',
        ]);
        $item = NewspaperNameClearanceHeader::first();
        if($item){
            $item->delete();
        }

        $data = $request->all();
        NewspaperNameClearanceHeader::create($data);

        return back()->with('message','The old data hsa been deleted and updated the new data');
    }
}
