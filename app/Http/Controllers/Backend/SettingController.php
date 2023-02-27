<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting= Setting::first();
        if(!$setting){
            $setting = new Setting();
        }
        return view('backend.setting.index',compact('setting'));
    }

   

   
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required',
            'title' => 'required',
        ]);

        $old_data = Setting::first();
        if($old_data){
            $this->deleteOldFile($old_data->title_image);
            $this->deleteOldFile($old_data->share_image);
            $old_data->delete();
        }

        $data = $request->except('title_image','share_image');

        if($request->hasFile('title_image')){
            $title_image = $this->imageUploade($request->file('title_image'),'title_image');
            $data['title_image'] = $title_image;
        }

        if($request->hasFile('share_image')){
            $share_image = $this->imageUploade($request->file('share_image'), 'share_image');
            $data['share_image'] = $share_image;
        }

        Setting::create($data);

        return back()->with('message',"The setting has been created successfully");
        
    }

    private function imageUploade($image, $name){
        
        if($name == 'title_image'){
            $file_name = 'title_image'.".".$image->getClientOriginalExtension();
            $img = Image::make($image)->resize(200,200);
        }else{
            $file_name = 'share_image'.".".$image->getClientOriginalExtension();
            $img = Image::make($image)->resize(400,400);
        }

        $img->save(public_path('/media/setting/') . $file_name);
        return  "media/setting/" . $file_name;
        
        
    }

    public function deleteOldFIle($image){
        if(file_exists($image)){
            unlink($image);
        }
    }

    
}
