<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use App\Models\UserFile;
use App\Notifications\userFileStatusChangeNotification;
use ZipArchive;
use Notification;

class FileManagementController extends Controller
{
    public function statusChange(File $file,$status){
        $file->update([
            'status' => $status,
        ]);

        $user = User::where('id',$file->user_id)->first();
        Notification::send($user,new userFileStatusChangeNotification($status,$file,$file->user));

        return back()->with('message','Successfull Changed ' .$status);
    }

    public function fileDetails(File $file,Request $request){
        foreach(auth()->user()->unreadNotifications as $notification){
            $notification->markAsRead();
        };
        
        $data = '';
		if ($request->ajax()) {
			$data.= '
            <div class="flex flex-wrap justify-center md:justify-between items-center py-[24px]">
                <div class="flex items-center">';
                

                if($file->user->profile_image){
                  $data.='<img class="h-[40px] w-[40px] rounded-full" src="'.$file->user->profile_image.'" alt="">';
                }else{
                    $data.= '<img class="h-[40px] w-[40px] rounded-full" src="/media/icon/user.png" alt="">';
                }
                
                
                $data.='<p class="font-700 text-[22px] leading-[21px] text-black ml-2">'.$file->user->name .'</p>
                </div>
                
                <div class="flex">
                    <span class="font-700 text-[22px] text-[#8E8E93] leading-[33px]">' .$file->subject .' > </span> 
                    <span class="font-700 text-[22px] text-black ml-4 leading-[33px]">' .$file->section .'</span>
                </div>

                <a href="/admin/download/all/'.$file->id.'" id="border-and-radius-white-bg"  
                class=" flex items-center font-700 text-[14px] leading-[21px]] text-black"> 
                    <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt=""> সব ডাউনলোড
                </a>
            </div>';

            if($file->clearence_id){
                $data.= '<div class="mt-[29px] data-table">
                
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ১। শিক্ষাসনদ (সবগুলো) </p>
                        
                        <a href="/admin/download/' .$file->id.'/form/clearence/শিক্ষাসনদ_সবগুলো/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ২। ব্যাংক আর্থিক স্বচ্ছলতা সনদপত্র</p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৩। ব্যাংকের ৬ মাসের এস্টেটমেন্ট </p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/ব্যাংকের_৬_মাসের_এস্টেটমেন্ট/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৪। আয়কর প্রত্যয়নপত্র </p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/আয়কর_প্রত্যয়নপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৫। নাগরিক সনদপত্র (কমিশনার বা সিটি কর্পোরেশন) </p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/নাগরিক_সনদপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]">৬। ন্যাশনাল আইডি কার্ড (সত্যায়িত কপি) </p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/ন্যাশনাল_আইডি_কার্ড/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]">৭। সাংবাদিকতার অভিজ্ঞতার সনদপত্র </p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]">৮। প্রেসের সাথে চুক্তিপত্র </p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/প্রেসের_সাথে_চুক্তিপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]">৯। ছাপাখানার ঘোষণাপত্রের সত্যায়িত কপি </p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]">১০। লোকাল এমপি’র প্রত্যয়নপত্র যদি থাকে</p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/লোকাল_এমপি’র_প্রত্যয়নপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]">১১। বাড়ী ভাড়া চুক্তিপত্র</p>
                        <a href="/admin/download/'.$file->id.'/form/clearence/বাড়ী_ভাড়া_চুক্তিপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            ';
            }elseif($file->media_id){
              $data.=  '<div class="mt-[29px] data-table">
                
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ১। জাতীয় পরিচয়পত্রের কপিসহ প্রকাশকের নাম ও ঠিকানা </p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/জাতীয়_পরিচয়পত্র/"> 
                        <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ২। নিউজপ্রিন্ট ক্রয়ের ভাউচারের ফটোকপি </p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/ভাউচারের_ফটোকপি/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৩। ভাড়া বাড়ি হলে যথাযথ স্ট্যাম্পে ভাড়ার চুক্তিপত্র </p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/ভাড়া_বাড়ি_চুক্তিপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৪। নিজস্ব ঠিকানায় হলে বিদ্যুৎ বইলের কপি সংযুক্ত করতে হবয়ে  </p>
                        
                        <a href="/admin/download/'.$file->id.'"/form/media/বিদ্যুৎ_বইলের_কপি/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৫।  নিউজপ্রিন্ট ক্রয়ের ভাউচারের ফটোকপি </p>
                        
                        <a href="/admin/download/"'.$file->id.'/form/media/নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৬। বিলি বণ্টনের জন্য প্রত্যেক এজেন্টের নাম ও ঠিকানাসহ প্রত্যেক এজেন্টকে সরবরাহের সংখ্যা</p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৭। ঘোষণাপত্রের সত্যায়িত কপি</p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/ঘোষণাপত্রের_সত্যায়িত_কপি/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৮। পত্রিকার নিয়মিত প্রকাশনা সম্পর্কে স্বরাষ্ট্র মন্ত্রণালয় ও সংশ্লিষ্ট জেলা প্রশাসকের প্রত্যয়নপত্র; </p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/জেলা_প্রশাসকের_প্রত্যয়নপত্র"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ৯ সাংবাদিক-কর্মকর্তা-কর্মচারীদের নাম, ঠিকানা ও জাতীয় পরিচয়পত্রের নম্বর, নিয়োগপত্র </p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ১০। সাংবাদিকদের বেতনের উপর আয়কর পরিশোধ করা হলে তার সনদপত্র  </p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]">১১। ব্যাংকের মাধ্যমে বেতন পরিশোধের বিবরণী </p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/বেতন_পরিশোধের_বিবরণী/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ১২ । সর্বশেষ আয়কর রিটার্ন সম্পর্কিত সনদপত্র </p>
                        
                        <a href="/admin/download/'.$file->id.'/form/media/রিটার্ন_সনদপত্র/"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            ';
            }else{
                $data.=  '<div class="mt-[29px] data-table">
                
                <div class="mt-7 overflow-x-auto">
                    <div class="flex items-center justify-between border-33">
                        <p class="font-[600] text-[18px] leading-[27px]"> ডাউনলোড </p>
                        
                        <a href="/admin/download/user/file/'.$file->id.'"> 
                            <img class="mr-[15px] download-icon" src="/image/download_icon.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            ';
            }
			return $data;
		}  
    }

    public function allDownload(File $file){
        $zip = new ZipArchive();
        $file_name = $file->user->name.".zip";

        

        $all_files =[];

        if($file->media_id){
            $files = [
                $file->media->জাতীয়_পরিচয়পত্র,
                $file->media->ভাউচারের_ফটোকপি,
                $file->media->ভাড়া_বাড়ি_চুক্তিপত্র,
                $file->media->রিটার্ন_সনদপত্র,
                $file->media->নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি,
                $file->media->ঘোষণাপত্রের_সত্যায়িত_কপি,
                $file->media->এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা,
                $file->media->জেলা_প্রশাসকের_প্রত্যয়নপত্র,
                $file->media->সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা,
                $file->media->রিটার্ন_সনদপত্র,
                $file->media->সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র,
                $file->media->বেতন_পরিশোধের_বিবরণী,
            ];
            
            foreach($files as $f){
                $temFile =  public_path().'/'.$f;
                if(\File::exists(public_path('/'.$f))){
                    $all_files[] = public_path('/'.$f);
                }
            } 

        }elseif($file->clearence_id){
            $files = [
                $file->clearence->শিক্ষাসনদ_সবগুলো,
                $file->clearence->ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র,
                $file->clearence->আয়কর_প্রত্যয়নপত্র,
                $file->clearence->নাগরিক_সনদপত্র,
                $file->clearence->ব্যাংকের_৬_মাসের_এস্টেটমেন্ট,
                $file->clearence->ন্যাশনাল_আইডি_কার্ড,
                $file->clearence->সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র,
                $file->clearence->প্রেসের_সাথে_চুক্তিপত্র,
                $file->clearence->ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি,
                $file->clearence->বাড়ী_ভাড়া_চুক্তিপত্র,
                $file->clearence->লোকাল_এমপি’র_প্রত্যয়নপত্র,
            ];
            
            foreach($files as $f){
                if(\File::exists(public_path('/'.$f))){
                    $all_files[] = public_path('/'.$f);
                }
            }  
        }else{
            $files = UserFile::where('user_id',$file->user_id)->get();
            foreach($files as $f){
                $temFile =  public_path().'/'.$f->file_name;
                if(\File::exists(public_path('/'.$f->file_name))){
                    $all_files[] = public_path('/'.$f->file_name);
                }
            }
        }
        

        $zip = new ZipArchive;

        $fileName = $file->user->name.'.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = $all_files; 

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }

    public function downloadClearence(File $file,$name){
        $position = strpos($file->clearence->$name,'.');
        $extensition = substr($file->clearence->$name,$position + 1);

        $file= public_path().'/'. $file->clearence->$name;

        $headers = array(
            'Content-Type: application/'.$extensition,
        );

        $name = $name.'.'.$extensition;

        return response()->download($file,$name, $headers);
    }

    public function downloadUploadFile(File $file){
        $position = strpos($file->user_file->file_name,'.');
        $extensition = substr($file->user_file->file_name,$position + 1);

        $name = $file->section.'.'.$extensition;
        $file= public_path(). '/'. $file->user_file->file_name;

        $headers = array(
            'Content-Type: application/'.$extensition,
        );

        return response()->download($file,$name, $headers);
    }

    public function downloadMedia(File $file,$name){
        $position = strpos($file->media->$name,'.');
        $extensition = substr($file->media->$name,$position + 1);

        $file= public_path().'/'. $file->media->$name;

        $headers = array(
            'Content-Type: application/'.$extensition,
        );

        $name = $name.'.'.$extensition;

        return response()->download($file,$name, $headers);
    }

    public function deleteFIle(File $file){
        if($file->media_id){
            $files = [
                $file->media->জাতীয়_পরিচয়পত্র,
                $file->media->ভাউচারের_ফটোকপি,
                $file->media->ভাড়া_বাড়ি_চুক্তিপত্র,
                $file->media->রিটার্ন_সনদপত্র,
                $file->media->নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি,
                $file->media->ঘোষণাপত্রের_সত্যায়িত_কপি,
                $file->media->এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা,
                $file->media->জেলা_প্রশাসকের_প্রত্যয়নপত্র,
                $file->media->সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা,
                $file->media->রিটার্ন_সনদপত্র,
                $file->media->সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র,
                $file->media->বেতন_পরিশোধের_বিবরণী,
            ];
        }elseif($file->clearence_id){
            $files = [
                $file->clearence->শিক্ষাসনদ_সবগুলো,
                $file->clearence->ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র,
                $file->clearence->আয়কর_প্রত্যয়নপত্র,
                $file->clearence->নাগরিক_সনদপত্র,
                $file->clearence->ব্যাংকের_৬_মাসের_এস্টেটমেন্ট,
                $file->clearence->ন্যাশনাল_আইডি_কার্ড,
                $file->clearence->সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র,
                $file->clearence->প্রেসের_সাথে_চুক্তিপত্র,
                $file->clearence->ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি,
                $file->clearence->বাড়ী_ভাড়া_চুক্তিপত্র,
                $file->clearence->লোকাল_এমপি’র_প্রত্যয়নপত্র,
            ];
        }else{
            $files = [
                $file->user_file->file_name,
            ];
        }

        foreach ($files as $f){
            $this->unlinkFile($f);
        }

        $file->delete();

        return back()->with('message','The File has been deleted successfully!');
    }

    private function unlinkFile($file){
        if(file_exists($file)){
            unlink($file);
        }
    }


}
 