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
        return view('backend.media_input.index',compact('media_header'));
    }
   

    public function headerStore(Request $request){
        $request->validate([
            'title' => 'required|max:200',
            'short_text' => 'required',
        ]);
        $item = MediaInputHeader::first();
        if($item){
            $item->delete();
        }

        $data = $request->all();
        MediaInputHeader::create($data);

        return back()->with('message','The old data hsa been deleted and updated the new data');
    }

}
