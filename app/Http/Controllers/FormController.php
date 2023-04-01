<?php

namespace App\Http\Controllers;

use App\Events\FormSubmitedProcessed;
use App\Models\File;
use App\Models\Media;
use App\Models\MediaInputHeader;
use Illuminate\Http\Request;
use Auth;

class FormController extends Controller
{
    private function fileUpload($file){
        $file_name = hexdec(uniqid()).time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('/media/form/'), $file_name);
        return 'media/form/'.$file_name;  
    }

    public function mediaForm(){
        $media = MediaInputHeader::first();
        return view('form.media',compact('media'));
    }

    public function mediaInputStore(Request $request){
        $request->validate([
            'পত্রিকার_নাম' => 'required',
            'পত্রিকা_প্রকাশের_তারিখ' => 'required',
            'পত্রিকার_সাইজ' => 'required',
            'কপি_সংখ্যা' => 'required',
            'প্রেস_ঠিকানা' => 'required',
            'নিউজরিন্ট_সংখ্যা' => 'required',
            'অফিসের_আয়তন' => 'required',
            'ল্যাপটপের_সংখ্যা' => 'required',
            'ই_টিন_রেজিস্ট্রেশন' => 'required',
            'ভ্যাট_রেজিস্ট্রেশন_নাম্বার' => 'required',
            'সংবাদপত্র_বিক্রয়বাবদ_আয়' => 'required',
            'বিজ্ঞাপন_বাবদ_আয়' => 'required',
            'অন্যান্য_আয়' => 'required',
            'গুদামঘরের_সাইজ' => 'required',
            
            'জাতীয়_পরিচয়পত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'ভাউচারের_ফটোকপি' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'ভাড়া_বাড়ি_চুক্তিপত্র' => 'mimes:png,jpg,jpeg,pdf,zip,rar',
            'বিদ্যুৎ_বইলের_কপি' => 'mimes:png,jpg,jpeg,pdf,zip,rar',
            'নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'ঘোষণাপত্রের_সত্যায়িত_কপি' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'জেলা_প্রশাসকের_প্রত্যয়নপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'বেতন_পরিশোধের_বিবরণী' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
            'রিটার্ন_সনদপত্র' => 'required|mimes:png,jpg,jpeg,pdf,zip,rar',
        ]);

        $data = $request->except(
            'জাতীয়_পরিচয়পত্র','ভাউচারের_ফটোকপি',
            'ভাড়া_বাড়ি_চুক্তিপত্র','বিদ্যুৎ_বইলের_কপি',
            'নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি',
            'ঘোষণাপত্রের_সত্যায়িত_কপি','জেলা_প্রশাসকের_প্রত্যয়নপত্র',
            'সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা','সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র',
            'বেতন_পরিশোধের_বিবরণী','রিটার্ন_সনদপত্র','এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা',
        );

        $data['জাতীয়_পরিচয়পত্র'] = $this->fileUpload($request->file('জাতীয়_পরিচয়পত্র'));
        $data['ভাউচারের_ফটোকপি'] = $this->fileUpload($request->file('ভাউচারের_ফটোকপি'));
        $data['নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি'] = $this->fileUpload($request->file('নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি'));
        $data['এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা'] = $this->fileUpload($request->file('এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা'));
        $data['ঘোষণাপত্রের_সত্যায়িত_কপি'] = $this->fileUpload($request->file('ঘোষণাপত্রের_সত্যায়িত_কপি'));
        $data['জেলা_প্রশাসকের_প্রত্যয়নপত্র'] = $this->fileUpload($request->file('জেলা_প্রশাসকের_প্রত্যয়নপত্র'));
        $data['সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা'] = $this->fileUpload($request->file('সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা'));
        $data['সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র'] = $this->fileUpload($request->file('সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র'));
        $data['বেতন_পরিশোধের_বিবরণী'] = $this->fileUpload($request->file('বেতন_পরিশোধের_বিবরণী'));
        $data['রিটার্ন_সনদপত্র'] = $this->fileUpload($request->file('রিটার্ন_সনদপত্র'));

        if($request->hasFile('ভাড়া_বাড়ি_চুক্তিপত্র')){
            $data['ভাড়া_বাড়ি_চুক্তিপত্র'] = $this->fileUpload($request->file('ভাড়া_বাড়ি_চুক্তিপত্র'));
        }
        if($request->hasFile('বিদ্যুৎ_বইলের_কপি')){
            $data['বিদ্যুৎ_বইলের_কপি'] = $this->fileUpload($request->file('বিদ্যুৎ_বইলের_কপি'));
        }
        $data['user_id'] = Auth::id();

        

        $media_id = Media::create($data)->id;

        File::create([
            'user_id' => $data['user_id'],
            'media_id' => $media_id,
            'subject' => 'মিডিয়া তালিকাভুক্তির আবেদন',
            'section' => 'বিজ্ঞাপন ও নিরীক্ষা'
        ]);

        event(new FormSubmitedProcessed('Media Registration',$data['user_id']));
        
        return back()->with('message','Form successfully submited!');
    }
}
