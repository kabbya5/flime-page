<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FormController extends Controller
{
    public function clearenceForm(){
        return view('form.clearence');
    }

    public function inputStore(Request $request){
        $validateion =   $request->validate([
            'শিক্ষাসনদ_সবগুলো' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'ব্যাংকের_৬_মাসের_এস্টেটমেন্ট' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'আয়কর_প্রত্যয়নপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'নাগরিক_সনদপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'ন্যাশনাল_আইডি_কার্ড' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'প্রেসের_সাথে_চুক্তিপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'লোকাল_এমপি’র_প্রত্যয়নপত্র' => 'mimes:png,jpg,jpeg,pdf,zip,rar',
            'বাড়ী_ভাড়া_চুক্তিপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
        ]);


        $data = [];
        $data['শিক্ষাসনদ_সবগুলো'] = $this->fileUpload($request->file('শিক্ষাসনদ_সবগুলো'));
        $data['ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র'] = $this->fileUpload($request->file('ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র'));
        $data['ব্যাংকের_৬_মাসের_এস্টেটমেন্ট'] = $this->fileUpload($request->file('ব্যাংকের_৬_মাসের_এস্টেটমেন্ট'));
        $data['আয়কর_প্রত্যয়নপত্র'] = $this->fileUpload($request->file('আয়কর_প্রত্যয়নপত্র'));
        $data['ন্যাশনাল_আইডি_কার্ড'] = $this->fileUpload($request->file('ন্যাশনাল_আইডি_কার্ড'));
        $data['সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র'] = $this->fileUpload($request->file('সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র'));
        $data['প্রেসের_সাথে_চুক্তিপত্র'] = $this->fileUpload($request->file('প্রেসের_সাথে_চুক্তিপত্র'));
        $data['ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি'] = $this->fileUpload($request->file('ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি'));
        if($request->hasFile('লোকাল_এমপি’র_প্রত্যয়নপত্র')){
            $data['লোকাল_এমপি’র_প্রত্যয়নপত্র'] = $this->fileUpload($request->file('লোকাল_এমপি’র_প্রত্যয়নপত্র'));
        }
        
        $data['বাড়ী_ভাড়া_চুক্তিপত্র'] = $this->fileUpload($request->file('বাড়ী_ভাড়া_চুক্তিপত্র'));
        $data['নাগরিক_সনদপত্র'] = $this->fileUpload($request->file('নাগরিক_সনদপত্র'));
        $data['user_id'] = Auth::id();

        dd($data);
        

    }

    private function fileUpload($file){
        $file_name = hexdec(uniqid()).time().'.'.$file->getClientOriginalExtension();
        // $file->move(public_path('/media/form/'), $file_name);
        return 'media/form/'.$file_name;  
       
    }
}
