<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TotalRegistered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class MediaRegisteredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registereds = TotalRegistered::latest()->paginate(25);
        return view('backend.media_registration.index',compact('registereds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registered = new TotalRegistered();
        return view('backend.media_registration.create',compact('registered'));
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
            'registered_name' => 'required|min:15',
            'description' => 'required|min:50',
            'published_date' => 'required',
            'pdf' => 'required|mimes:pdf',
        ]);

        $data = $request->except('pdf', 'old_pdf');
        if($request->hasFile('pdf')){
            $file = $this->fileUpload($request->file('pdf'),NULL);
            $data['pdf_url'] = $file;
        }
        $data['slug'] =  str_replace(' ','-',$data['registered_name']).$data['published_date'].rand(1,1000);

        TotalRegistered::create($data);
    }

    private function fileUpload($file,$old_file){
        if($file){
            if($old_file){
                $this->deleteFile($old_file);
            }
            
            $file_name = hexdec(uniqid()).time().".".$file->getClientOriginalExtension();
            $file->move(public_path('/media/registereds'), $file_name);
            return 'media/registereds/'.$file_name;     
        }
    }

    private function deleteFile($file){
        if(file_exists($file)){
            unlink($file);
        }

        return back()->with('message','The data has been deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TotalRegistered  $totalRegistered
     * @return \Illuminate\Http\Response
     */
    public function edit(TotalRegistered $registered)
    {

        return view('backend.media_registration.edit',compact('registered'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TotalRegistered  $totalRegistered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TotalRegistered $registered)
    {
        $request->validate([
            'registered_name' => 'required|min:15',
            'description' => 'required|min:50',
            'published_date' => 'required',
        ]);

        $data = $request->except('pdf', 'old_pdf');
        if($request->hasFile('pdf')){
            $file = $this->fileUpload($request->file('pdf'),$request->old_pdf);
            $data['pdf_url'] = $file;
        }
        $data['slug'] =  str_replace(' ','-',$data['registered_name']).$data['published_date'].rand(1,1000);

        $registered->update($data);
    }

    public function duplicate(TotalRegistered $registered){
        return view('backend.media_registration.create',compact('registered'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TotalRegistered  $totalRegistered
     * @return \Illuminate\Http\Response
     */
    public function destroy(TotalRegistered $registered)
    {
        $this->deleteFile($registered->pdf_url);
        $registered->delete();
    }
}
