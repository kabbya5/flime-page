<?php

namespace App\Http\Controllers;

use App\Events\UserFileUploadProcessed;

use App\Models\Section;
use App\Models\UserFile;
use Illuminate\Http\Request;
use Auth;
use App\Models\File;

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
        $file->move(public_path('/media/form/'),$name);

        $data['file_name'] = 'media/form/' .$name;

        $id = UserFile::create($data)->id;

        File::create([
            'user_id' => $data['user_id'],
            'user_file_id' => $id,
            'subject' => $data['subject'],
            'section' => $data['subsection_name'],
        ]);

        event(new UserFileUploadProcessed($data));
    }
}
