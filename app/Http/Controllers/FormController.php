<?php

namespace App\Http\Controllers;

use App\Events\FormSubmitedProcessed;
use App\Models\Clearence;
use App\Models\File;
use App\Models\Media;
use App\Models\MediaInputHeader;
use App\Models\NewspaperNameClearanceHeader;
use Illuminate\Http\Request;
use Auth;

class FormController extends Controller
{
    public function clearenceForm(){
        $clearence = NewspaperNameClearanceHeader::first();
        return view('form.clearence',compact('clearence'));
    }

    public function inputStore(Request $request){
        $request->validate([
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

        $clearence_id = Clearence::create($data)->id;

        File::create([
            'user_id' => $data['user_id'],
            'clearence_id' => $clearence_id,
            'subject' => 'পত্রিকা নামের ছাড়পত্র',
            'section' => 'নিবন্ধন'
        ]);

        event(new FormSubmitedProcessed('Newspaper name clearance',$data['user_id']));

        return back()->with('message','Form successfully submited!');
        

    }

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
            'কপি_সংখ্যা' => 'required|integer',
            'প্রেস_ঠিকানা' => 'required',
            'নিউজরিন্ট_সংখ্যা' => 'required|integer',
            'অফিসের_আয়তন' => 'required',
            'ল্যাপটপের_সংখ্যা' => 'required|integer',
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
