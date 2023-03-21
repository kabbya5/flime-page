@extends('layouts.app')

@section('style')
.header-home{
    height: 600px ;
}
@endsection

@section('hero_section')
<div class="hero w-full h-full">
    <div class="flex justify-center items-center h-full md:h-44  md:pt-[190px]">
        <h2 class="text-white text-[38px] md:text-[60px] font-[700] leading-[90px] h-f"> {{ $media->title }} </h2>
    </div>
</div>
@endsection
@section('content')
    <!-- বিজ্ঞাপন ও নিরীক্ষা -->
    <div class="container mx-auto my-10 md:mt-[204px]">
        <div class="w-full mx-2 md:w-[676px] md:mx-auto">
            <h2 class="font-700 text-[20px] md:text-[48px] leading-67 text-center text-black"> {{ $media->title }}</h2>
            <p class="text-[18px] mt-[17px] text-[#8D8989] font-[600] leading-[30px] text-center md:text-left"> 
                {{ $media->short_text }}
            </p>

            <div class="flex flex-col md:flex-row md:justify-between mt-[70px]">
                <a href="{{ route('all.media.news') }}" class="py-2 px-[70px] font-700 text-[18px]  leading-[27px rounded-md text-[#4E4E51] transition duration-300 bg-gray-200 text-center hover:text-[#4801FF] hover:bg-blue-100">
                    মোট নিবন্ধিত পত্রিকা
                </a>
                <a href="{{ route('media.form') }}" class="mt-5 md:mt-0 py-2 px-[32px] font-700 text-[18px] bg-blue-10 leading-[27px]  rounded-md bg-blue-100 transition duration-300  text-[#4801FF]  text-center">
                    মিডিয়া তালিকাভুক্তির আবেদন
                </a>
            </div>

            <!-- form  -->
            <div class="w-full mt-10 md:mt-[140px] md:mb-[200px]">
                <div class="w-full">
                    <div class="flex items-center justify-between">
                        <h2 class="font-[700] leading-[37px] text-[25px] text-[#545454] text-left"> মিডিয়া তালিকাভুক্তির আবেদন </h2>
                    </div>
                    
                    <form class="my-10 md:mt-[40px]" action="{{ route('user.media.input.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ১। পত্রিকার নাম </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('পত্রিকার_নাম')  error @enderror" placeholder="পত্রিকার_নাম"
                                value="{{ old('পত্রিকার_নাম') }}" name="পত্রিকার_নাম">
                            </div>
                            @error("পত্রিকার_নাম")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-10 flex flex-col">
                           
                            <div class="flex">
                                <label for="" class="">২। জাতীয় পরিচয়পত্রের কপিসহ প্রকাশকের নাম ও ঠিকানা </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input class="file-input ml-6 border-none w-full  @error('জাতীয়_পরিচয়পত্র') error @enderror" type="file" name="জাতীয়_পরিচয়পত্র">   
                            </div>
                            
    
                            @error("জাতীয়_পরিচয়পত্র")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>
                        
                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ৩। পত্রিকা প্রথম প্রকাশের তারিখ </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('পত্রিকা_প্রকাশের_তারিখ')  error @enderror" placeholder="পত্রিকা প্রথম প্রকাশের তারিখ"
                                value="{{ old('পত্রিকা_প্রকাশের_তারিখ') }}" name="পত্রিকা_প্রকাশের_তারিখ">
                                
                            </div>

                            @error("পত্রিকা_প্রকাশের_তারিখ")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ৪। পত্রিকার সাইজ ও পৃষ্ঠা সংখ্যা </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('পত্রিকার_সাইজ')  error @enderror" placeholder="পত্রিকার সাইজ ও পৃষ্ঠা সংখ্যা"
                                name="পত্রিকার_সাইজ" value="{{ old('পত্রিকার_সাইজ') }}">
                            </div>
                            @error("পত্রিকার_সাইজ")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ৫। প্রতি সংখ্যার জন্য কত কপি ছাপা হয় </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('কপি_সংখ্যা')  error @enderror" placeholder="প্রতি সংখ্যার জন্য কত কপি ছাপা হয়"
                                name="কপি_সংখ্যা" value="{{ old('কপি_সংখ্যা') }}">
                            </div> 
                            @error("কপি_সংখ্যা")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ৬। কোন প্রেস হতে ছাপা হয় তার পূর্ণ ঠিকানা</label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('প্রেস_ঠিকানা')  error @enderror" placeholder="কোন প্রেস হতে ছাপা হয় তার পূর্ণ ঠিকানা"
                                name='প্রেস_ঠিকানা' value="{{ old('প্রেস_ঠিকানা') }}">
                            </div>
                            @error("প্রেস_ঠিকানা")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ৭। কি পরিমাণ নিউজরিন্ট প্রতি সংখ্যায় প্রয়োজন </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('নিউজরিন্ট_সংখ্যা')  error @enderror" placeholder="কি পরিমাণ নিউজরিন্ট প্রতি সংখ্যায় প্রয়োজন"
                                name="নিউজরিন্ট_সংখ্যা" value="{{ old('নিউজরিন্ট_সংখ্যা') }}">
                            </div>
                            @error("নিউজরিন্ট_সংখ্যা")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>


                        <div class="form-group mb-5 md:mb-10 flex flex-col">
                           
                            <div class="flex">
                                <label for="" class="">৮। নিউজপ্রিন্ট ক্রয়ের ভাউচারের ফটোকপি </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input class="file-input ml-6 border-none w-full  @error('ভাউচারের_ফটোকপি') error @enderror" type="file" name="ভাউচারের_ফটোকপি">   
                            </div>
                            
    
                            @error("ভাউচারের_ফটোকপি")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>
                        <div class="form-group mb-5 md:mb-[24px] md:w-[586px]">
                            <label for="" class=""> ৯। অফিস সংক্রান্ত প্রশ্ন </label>
    
                            <div class="form-group mb-5 md:mt-[24px] pl-6">
                                <div class="flex">
                                    <label for="" class=""> ক। পত্রিকা অফিসের আয়তন </label>
                                    <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                                </div>
                                
                                <div class="flex mt-3 w-full">
                                    <input type="text" class="w-full border-2 focus:outline-none @error('অফিসের_আয়তন')  error @enderror" placeholder="পত্রিকা অফিসের আয়তন"
                                    name="অফিসের_আয়তন" value="{{ old('অফিসের_আয়তন') }}">
                                </div>
                                @error("অফিসের_আয়তন")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>

                            <div class="form-group mb-5 md:mt-[24px] pl-6">
                                <div class="flex">
                                    <label for="" class=""> খ। ভাড়া বাড়ি হলে যথাযথ স্ট্যাম্পে ভাড়ার চুক্তিপত্র </label>
                                </div>
                                
                                <div class="flex mt-3 w-full">
                                    <input class="file-input ml-6 border-none w-full  @error('ভাড়া_বাড়ি_চুক্তিপত্র') error @enderror" type="file" name="ভাড়া_বাড়ি_চুক্তিপত্র">   
                                </div>
                                @error("ভাড়া_বাড়ি_চুক্তিপত্র")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>

                            <div class="form-group mb-5 md:mt-[24px] pl-6">
                                <div class="flex">
                                    <label for="" class=""> গ। নিজস্ব ঠিকানায় হলে বিদ্যুৎ বইলের কপি সংযুক্ত করতে হবয়ে </label>
                                </div>
                                
                                <div class="flex mt-3 w-full">
                                    <input class="file-input ml-6 border-none w-full  @error('বিদ্যুৎ_বইলের_কপি') error @enderror" type="file" name="বিদ্যুৎ_বইলের_কপি">   
                                </div>
                                @error("বিদ্যুৎ_বইলের_কপি")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ১০। কম্পিউটার / ল্যাপটপের সংখ্যা</label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('ল্যাপটপের_সংখ্যা')  error @enderror" placeholder="কম্পিউটার / ল্যাপটপের সংখ্যা"
                                name="ল্যাপটপের_সংখ্যা" value="{{ old('ল্যাপটপের_সংখ্যা') }}">
                            </div>
                            @error("ল্যাপটপের_সংখ্যা")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class="">১১। ই-টিন রেজিস্ট্রেশন নাম্বার</label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('ই_টিন_রেজিস্ট্রেশন')  error @enderror" placeholder="ই-টিন রেজিস্ট্রেশন নাম্বার"
                                name="ই_টিন_রেজিস্ট্রেশন" value="{{ old('ই_টিন_রেজিস্ট্রেশন') }}">
                            </div>
                            @error("ই_টিন_রেজিস্ট্রেশন")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class="">১২। ১১ ডিজিট ভ্যাট রেজিস্ট্রেশন নাম্বার </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('ভ্যাট_রেজিস্ট্রেশন_নাম্বার')  error @enderror" placeholder="১১ ডিজিট ভ্যাট রেজিস্ট্রেশন নাম্বার"
                                name="ভ্যাট_রেজিস্ট্রেশন_নাম্বার" value="{{ old('ভ্যাট_রেজিস্ট্রেশন_নাম্বার') }}">
                            </div>
                            @error("ভ্যাট_রেজিস্ট্রেশন_নাম্বার")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ১৩। নিরীক্ষাধীন সময়ে সংবাদপত্র বিক্রয়বাবদ আয়</label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('সংবাদপত্র_বিক্রয়বাবদ_আয়')  error @enderror" placeholder="নিরীক্ষাধীন সময়ে সংবাদপত্র বিক্রয়বাবদ আয়"
                                name="সংবাদপত্র_বিক্রয়বাবদ_আয়" value="{{ old('সংবাদপত্র_বিক্রয়বাবদ_আয়') }}">
                            </div>
                            @error("সংবাদপত্র_বিক্রয়বাবদ_আয়")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ১৪। সর্বশেষ আয়কর রিটার্ন সম্পর্কিত সনদপত্র </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input class="file-input ml-6 border-none w-full  @error('রিটার্ন_সনদপত্র') error @enderror" type="file" name="রিটার্ন_সনদপত্র">   
                            </div>
                            @error("রিটার্ন_সনদপত্র")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class="">১৫। নিরীক্ষাধীন সময়ে ( বেসরকারি) বিজ্ঞাপন প্রকাশ বাবদ আয় </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('বিজ্ঞাপন_বাবদ_আয়')  error @enderror" placeholder="নিরীক্ষাধীন সময়ে ( বেসরকারি) বিজ্ঞাপন প্রকাশ বাবদ আয়"
                                name="বিজ্ঞাপন_বাবদ_আয়" value="{{ old('বিজ্ঞাপন_বাবদ_আয়') }}">
                            </div>
                            @error("বিজ্ঞাপন_বাবদ_আয়")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class="">১৬। নিরীক্ষাধীন সময়ে অন্যান্য উৎস থেকে আয়</label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('অন্যান্য_আয়')  error @enderror" placeholder="নিরীক্ষাধীন সময়ে অন্যান্য উৎস থেকে আয়"
                                name="অন্যান্য_আয়" value="{{ old('অন্যান্য_আয়') }}">
                            </div>
                            @error("অন্যান্য_আয়")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ১৭। নিউজপ্রিন্টের জন্য গুদামঘরের সাইজ এবং কি পরিমাণ মজুদ থাকে </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input type="text" class="w-full ml-6 border-2 focus:outline-none @error('গুদামঘরের_সাইজ')  error @enderror" placeholder="১৭। নিউজপ্রিন্টের জন্য গুদামঘরের সাইজ এবং কি পরিমাণ মজুদ থাকে"
                                name="গুদামঘরের_সাইজ" value="{{ old('গুদামঘরের_সাইজ') }}">
                            </div>
                            @error("গুদামঘরের_সাইজ")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full">
                            <div class="flex">
                                <label for="" class=""> ১৮। নিরীক্ষাধীন সময়ে নিউজপ্রিন্ট ক্রয়ের মুসক চালানের কপি </label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input class="file-input ml-6 border-none w-full  @error('নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি') error @enderror" type="file" name="নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি">   
                            </div>
                            @error("নিউজপ্রিন্ট_ক্রয়ের_চালানের_কপি")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[24px] w-full lg:w-[740px]">
                            <div class="flex">
                                <label for="" class="block"> ১৯। বিলি বণ্টনের জন্য প্রত্যেক এজেন্টের নাম ও ঠিকানাসহ প্রত্যেক এজেন্টকে সরবরাহের সংখ্যা</label>
                                <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                            </div>
                            
                            <div class="flex mt-3 w-full md:w-[586px]">
                                <input class="file-input ml-6 border-none w-full  @error('এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা') error @enderror" type="file" name="এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা">   
                            </div>
                            @error("এজেন্টের_নাম_ঠিকানাসহ_সংখ্যা")
                                <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                            @enderror
                        </div>

                        <div class="form-group mb-5 md:mb-[80px] md:w-[750px]">
                            <label for="" class=""> বিলি বণ্টনের জন্য প্রত্যেক এজেন্টের নাম ও ঠিকানাসহ প্রত্যেক এজেন্টকে সরবরাহের সংখ্যা
                                এ ছাড়াও নিম্নবর্ণিত কাগজপত্র আবেদনের সাথে সংযুক্ত করতে হবে </label>
    
                            <div class="form-group mb-5 md:mt-[24px] pl-6">
                                <div class="flex">
                                    <label for="" class="">(ক) ঘোষণাপত্রের সত্যায়িত কপি </label>
                                    <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                                </div>
                                
                                <div class="flex mt-3 w-full md:w-[560px]">
                                    <input class="file-input ml-6 border-none w-full  @error('ঘোষণাপত্রের_সত্যায়িত_কপি') error @enderror" type="file" name="ঘোষণাপত্রের_সত্যায়িত_কপি">   
                                </div>
                                @error("ঘোষণাপত্রের_সত্যায়িত_কপি")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>

                            <div class="form-group mb-5 md:mt-[24px] pl-6">
                                <div class="flex">
                                    <label for="" class="">(খ) পত্রিকার নিয়মিত প্রকাশনা সম্পর্কে স্বরাষ্ট্র মন্ত্রণালয় ও সংশ্লিষ্ট জেলা প্রশাসকের প্রত্যয়নপত্র; </label>
                                    <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                                </div>
                                
                                <div class="flex mt-3 w-full md:w-[560px]">
                                    <input class="file-input ml-6 border-none w-full  @error('জেলা_প্রশাসকের_প্রত্যয়নপত্র') error @enderror" type="file" name="জেলা_প্রশাসকের_প্রত্যয়নপত্র">   
                                </div>
                                @error("জেলা_প্রশাসকের_প্রত্যয়নপত্র")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>

                            <div class="form-group mb-5 md:mt-[24px] pl-6">
                                <div class="flex">
                                    <label for="" class=""> (গ) সাংবাদিক-কর্মকর্তা-কর্মচারীদের নাম, ঠিকানা ও জাতীয় পরিচয়পত্রের নম্বর, নিয়োগপত্র </label>
                                    <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                                </div>
                                
                                <div class="flex mt-3 w-full md:w-[560px]">
                                    <input class="file-input ml-6 border-none w-full  @error('বিদ্যুৎ_বইলের_কপি') error @enderror" type="file" name="সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা">   
                                </div>
                                @error("সাংবাদিক_কর্মকর্তা_কর্মচারীদের_নাম_ঠিকানা")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>

                            <div class="form-group mb-5 md:mt-[24px] pl-6">
                                <div class="flex">
                                    <label for="" class=""> (ঘ) ব্যাংকের মাধ্যমে বেতন পরিশোধের বিবরণী; </label>
                                    <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                                </div>
                                
                                <div class="flex mt-3 w-full md:w-[560px]">
                                    <input class="file-input ml-6 border-none w-full  @error('বেতন_পরিশোধের_বিবরণী') error @enderror" type="file" name="বেতন_পরিশোধের_বিবরণী">   
                                </div>
                                @error("বেতন_পরিশোধের_বিবরণী")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>

                            <div class="form-group mb-5 md:mt-[24px] pl-6">
                                <div class="flex">
                                    <label for="" class="">(ঙ) সাংবাদিকদের বেতনের উপর আয়কর পরিশোধ করা হলে তার সনদপত্র </label>
                                    <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                                </div>
                                
                                <div class="flex mt-3 w-full md:w-[560px]">
                                    <input class="file-input ml-6 border-none w-full  @error('সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র') error @enderror" type="file" name="সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র">   
                                </div>
                                @error("সাংবাদিকদের_বেতন_পরিশোধের_সনদপত্র")
                                    <p class="mt-2 ml-6 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>
                        </div>

                    
    
                        <button type="submit" class="btn-gradient-pink font-700 text-[18px] leading-[27px] text-white py-2 px-[72px] rounded-md"> আবেদন করুন </button>      
                    </form>  
                </div>
            </div> 
        </div>
    <div>
@endsection