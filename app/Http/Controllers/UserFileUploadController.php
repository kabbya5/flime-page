<?php

namespace App\Http\Controllers;

use App\Events\UserFileUploadProcessed;
use App\Models\NewspaperNameClearance;
use App\Models\Section;
use App\Models\UserFile;
use Illuminate\Http\Request;
use Auth;
use Laravel\Ui\Presets\React;

class UserFileUploadController extends Controller
{
    public function fileUpload(){
        $section = Section::OrderBy('section_position','asc')->get()[1];
        return view('user.file_upload',compact('section'));
    }

    public function storeFile(Request $request){
        $request->validate([
            'subsection_name' => 'required',
            'subject' => 'required',
            'date' => 'required',
        ]);

        
        $data = $request->except('file');
        $data['user_id'] = Auth::id();

        $file = $request->file('file');
        $name =  hexdec(uniqid()).time().".". $file->getClientOriginalExtension();
        $file->move(public_path('/media/user/file/'),$name);

        $data['file_name'] = 'media/user/file/' .$name;

        UserFile::create($data);

        event(new UserFileUploadProcessed($data));
    }

    public function notification(){
        $data = [
            'subsection_name' => 'name',
            'subject' => 'subject', 
        ];
        event (new UserFileUploadProcessed($data));

        return back()->with('message', 'successfull');
    }
}
