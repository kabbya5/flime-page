@extends('layouts.app')

@section('style')
.header-home{
    height: 600px ;
}
@endsection

@section('hero_section')
<div class="hero w-full h-full">
    <div class="flex justify-center items-center h-full">
        <h2 class="text-white text-sm md:text-[60px] font-[700] leading-[90px] h-f"> {{ $clearence->title }} </h2>
    </div>
</div>
@endsection

@section('content')
    <!-- hero  -->
    <!-- নিবন্ধন  -->

    <div class="container mx-auto my-10 md:mt-[204px]">
        <div class="w-full mx-2 md:w-[676px] md:mx-auto">
            <h2 class="font-700 text-md md:text-[48px] leading-67 text-left text-black "> {{ $clearence->title }} </h2>
            <p class="text-[18px] mt-[17px] text-[#8D8989] font-[600] leading-[30px]"> 
                {{ $clearence->short_text }}
            </p>

            <!-- form  -->
            <div class="w-full mt-10 md:mt-[140px] md:mb-[200px]">
                <div class="w-full">
                    <div class="flex items-center justify-between">
                        <h2 class="font-[700] leading-[37px] text-[25px] text-[#545454] text-left"> পত্রিকা নামের ছাড়পত্র </h2>
                    </div>
                    
                    <form class="my-10 md:mt-[40px]" action="{{ route('user.input.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
    
                        <div class="form-group mb-5 md:mb-10 flex flex-col">
                           
                            <div class="flex">
                                <label for="" class=""> ১। শিক্ষাসনদ (সবগুলো)</label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('শিক্ষাসনদ_সবগুলো') error @enderror" type="file" name="শিক্ষাসনদ_সবগুলো">   
    
                            @error("শিক্ষাসনদ_সবগুলো")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>
                        
                        
                        <div class="form-group mb-5 md:mb-10 flex flex-col">
                           
                            <div class="flex">
                                <label for="" class=""> ২। ব্যাংক আর্থিক স্বচ্ছলতা সনদপত্র</label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র') error @enderror" type="file" name="ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র">   
    
                            @error("ব্যাংক_আর্থিক_স্বচ্ছলতা_সনদপত্র")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
    
                        <div class="form-group mb-5 md:mb-10 flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ৩। ব্যাংকের ৬ মাসের এস্টেটমেন্ট </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('ব্যাংকের_৬_মাসের_এস্টেটমেন্ট') error @enderror" type="file" name="ব্যাংকের_৬_মাসের_এস্টেটমেন্ট">   
    
                            @error("ব্যাংকের_৬_মাসের_এস্টেটমেন্ট")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
    
                        <div class="form-group mb-5 md:mb-10 flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ৪। আয়কর প্রত্যয়নপত্র </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('আয়কর_প্রত্যয়নপত্র') error @enderror" type="file" name="আয়কর_প্রত্যয়নপত্র">   
    
                            @error("আয়কর_প্রত্যয়নপত্র")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
    
                        <div class="form-group mb-5 md:mb-10 flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ৫। নাগরিক সনদপত্র (কমিশনার বা সিটি কর্পোরেশন) </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('নাগরিক_সনদপত্র') error @enderror" type="file" name="নাগরিক_সনদপত্র">   
    
                            @error("নাগরিক_সনদপত্র")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
    
                        <div class="form-group mb-5 md:mb-10 flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ৬। ন্যাশনাল আইডি কার্ড (সত্যায়িত কপি) </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('ন্যাশনাল_আইডি_কার্ড') error @enderror" type="file" name="ন্যাশনাল_আইডি_কার্ড">   
    
                            @error("ন্যাশনাল_আইডি_কার্ড")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
    
                        <div class="form-group mb-5 md:mb-10 flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ৭। সাংবাদিকতার অভিজ্ঞতার সনদপত্র </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র') error @enderror" type="file" name="সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র">   
    
                            @error("সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
        
                        <div class="form-group mb-5 md:mb-10 flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ৮। প্রেসের সাথে চুক্তিপত্র </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('সাংবাদিকতার_অভিজ্ঞতার_সনদপত্র') error @enderror" type="file" name="প্রেসের_সাথে_চুক্তিপত্র">   
    
                            @error("প্রেসের_সাথে_চুক্তিপত্র")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
    
                        <div class="form-group mb-5 md:mb-10 flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ৯। ছাপাখানার ঘোষণাপত্রের সত্যায়িত কপি </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি') error @enderror" type="file" name="ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি">   
    
                            @error("ছাপাখানার_ঘোষণাপত্রের_সত্যায়িত_কপি")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
                        
                        <div class="form-group mb-5 md:mb-10 flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ১০। লোকাল এমপি’র প্রত্যয়নপত্র যদি থাকে </label>
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('লোকাল_এমপি’র_প্রত্যয়নপত্র') error @enderror" type="file" name="লোকাল_এমপি’র_প্রত্যয়নপত্র">   
    
                            @error("লোকাল_এমপি’র_প্রত্যয়নপত্র")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
    
                        <div class="form-group mb-5 md:mb-[80px] flex flex-col"> 
                            <div class="flex">
                                <label for="" class=""> ১১। বাড়ী ভাড়া চুক্তিপত্র </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <input class="ml-6 file-input border-none mt-3 @error('বাড়ী_ভাড়া_চুক্তিপত্র') error @enderror" type="file" name="বাড়ী_ভাড়া_চুক্তিপত্র">   
    
                            @error("বাড়ী_ভাড়া_চুক্তিপত্র")
                                    <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                            @enderror
                        </div>
    
                        <button type="submit" class="btn-gradient-pink font-700 text-[18px] leading-[27px] text-white py-2 px-[72px] rounded-md"> আবেদন করুন </button>      
                    </form>  
                </div>
            </div> 
        </div>
    <div>
@endsection