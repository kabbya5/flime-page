@extends('layouts.app')
@section('style')
.header-home{
    height: 600px ;
}
@endsection

@section('hero_section')
<div class="hero pl-4 my-10 container mx-auto">
    <div class="flex flex-col-reverse justify-center items-center md:flex-row md:justify-between items-center">
        <h1 class="text-white md:ml-3 font-bold text-[30px] w-[310px] md:text-[40px] md:w-[410px] leading-[70px] lg:text-[60px] lg:w-[600px] lg:leading-[90px]">
            চলচ্চিত্র, সম্পাদনা
            প্রকাশনা ও নিবন্ধনের
            ডিজিটাল প্লাটফর্ম
        </h1> 
       <img class="w-[432px] h-[340px]" src="{{ asset('image/Book.png')}}" alt="">
    </div>
</div>
@endsection

@section('content')

<!-- চলচ্চিত্র -->
<div class="container mx-auto my-10 px-2">     
    <div class="grid grid-cols-12 gap-4 my-10 md:my-[220px] px-2 md:px-0"> 
        <div class="col-span-12 md:col-start-6 md:col-span-12 lg:col-start-5 lg:col-span-8">  
            <div class="lg:w-[720px] px-2 lg:px-0">
                <h2 class="text-black font-[700] text-[45px]"> চলচ্চিত্র </h2>
                <p class="my-10 leading-[30px] text-[16px] text-[#8d8989] font-[600]">
                    চলচ্চিত্র ও প্রকাশনার মাধ্যমে দেশের ইতিহাস ও ঐতিহ্যের চিত্র ভবিষ্যত প্রজন্মের ধারণ করা এবং সরকারের
                    অনুসৃত নীতি ও উন্নয়ন কার্যক্রমে জনগণকে সম্পৃক্ত করা এ অধিদপ্তরের মূল লক্ষ্য। 
                </p>
            </div>  
        </div>
        <!-- button  -->
        <div class="col-span-12 md:col-span-5 lg:col-span-4">
            <div class="flex flex-col justify-end md:mr-[60px]">
                @foreach ($first_section->subsections as $item)
                    @if($item->subsection_position == 1)
                    <a href="{{ route('video.subsection.posts',$item->slug) }}" class="block font-700 lg:w-[300px] py-2 text-center  mb-[12px] btn-gradient"> {{ $item->subsection_name }}</a>
                    @else
                    <a href="{{ route('video.subsection.posts',$item->slug) }}" class="block font-700 lg:w-[300px] py-3  mb-[12px] text-center text-black bg-white transition duration-100 hover-flim-btn"> {{ $item->subsection_name }}</a>
                    @endif 
                @endforeach
                
            </div>
        </div>

        <!-- POST  -->
        <div class="col-span-12 md:col-span-7 lg:col-span-8 bg-white py-10 pl-2 md:px-2 lg:px-[40px] post-box rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-[#4e4e51] font-[700] text-sm md:text-[25px]"> ডকুমেন্টারি </h2>
            </div>
            
            <div class="owl-carousel owl-theme post-slider post-book w-full grid grid-cols-12 gap-4 mt-10">
                @foreach ($flim_posts as $post)
                    @if($post->file_url)
                        <div class="item">  
                            <div class="video">
                                <video width="500px" height="500px" controls="controls"/>
                                
                                <source src="{{ asset($post->file_url)}}" type="video/mp4"> 
                            </div>                             
                                           
                            <p class="font-[700] text-black block my-4">{{ $post->post_name }} </p>
                        </div>
                    @else
                    <div class="item">
                        <iframe width="560" height="315" src="{{ $post->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <p class="font-[700] text-black block my-4"> {{ $post->post_name }} </p>
                    </div>
                    @endif   
                @endforeach
            </div>
                
            <!-- Post Button  -->
            <div class="flex itmes-center justify-end -mt-11">
                <a href="{{ route('video.posts') }}" class="relative z-50 font-[700] px-4 py-2 bg-red-10 text-md text-[#E25896] rounded-md"> সব দেখুন </a>            
            </div>
        </div>

    </div>
</div>

 <!-- সম্পাদনা ও প্রকাশনা -->
<div class="pt-10 md:pt-[220px] bg-gradient-semiwhite pb-10 md:pb-[220px]">
    <div class="container mx-auto pt-[50px]">
        <div class="grid grid-cols-12 gap-4 px-2 md:px-5 lg:px-4">
            <div class="col-span-12">  
                <div class="lg:w-[720px]">
                    <h2 class="text-black font-[700] text-[45px] leading-[67.5px]"> সম্পাদনা ও প্রকাশনা </h2>
                    <p class="my-10 leading-[30px] text-[16px] text-[#8d8989] font-[600]">
                        চলচ্চিত্র ও প্রকাশনার মাধ্যমে দেশের ইতিহাস ও ঐতিহ্যের চিত্র ভবিষ্যত প্রজন্মের ধারণ করা এবং 
                        সরকারের অনুসৃত নীতি ও উন্নয়ন কার্যক্রমে জনগণকে সম্পৃক্ত করা এ অধিদপ্তরের মূল লক্ষ্য। 
                    </p>
                </div>  
            </div>
            
    
            <!-- POST BOOK -->
            <div class="col-span-12 md:col-span-7 lg:col-span-8 lg:px-[48px] py-10 bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between">
                    <h2 class="text-black font-[700] md:text-[25px] leading-36"> বাংলাদেশ কোয়ার্টারলি </h2>
                </div>
                
                <!-- slider  -->
                <div class="mt-10 grid grid-cols-12 gap-4 overflow-hidden owl-carousel owl-theme post-book-slider pr-4">   
                    <div class="item">
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১ </p>
                    </div>
                    <div class="item">
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১ </p>
                    </div>
                    <div class="item">
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১ </p>
                    </div>
                    <div class="item">     
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১ </p>
                    </div>
                    <div class="item">
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১ </p>
                    </div>
                    <div class="item">
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১ </p>
                    </div>
                    <div class="item">
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১</p>
                    </div>
                    <div class="item">
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১ </p>
                    </div>
                    <div class="item">
                        <img class="book-img" src="image/book_1.JPG" alt="">
                        <p class="font-[700] text-black block my-4">ডিসেম্বর ২০২১</p>
                    </div>
                     
                </div>
    
                <!-- Post Button  -->
                <div class="flex itmes-center justify-end -mt-11">
                    <a href="film.html" class="relative z-50 font-[700] px-4 mr-4 py-2 bg-green-10 text-md text-[#108A25]"> সব দেখুন </a>   
                </div>
            </div>
    
            <!-- button  -->
            <div class="col-span-12 md:col-span-5 lg:col-span-4 -mt-2">
                <div class="flex flex-col justify-start md:ml-[60px]">
                    <button class="block lg:w-[300px]  py-2 mb-[12px] font-700 bg-white text-center text-[#4e4e51]">চলচ্চিত্র </button>
                    <button class="block lg:w-[300px]  py-2 mb-[12px] font-700 text-center text-white btn-gradient-green">ডকুমেন্টারি </button>
                    <button class="block lg:w-[300px]  py-2 mb-[12px] font-700 text-center  bg-white text-[#4e4e51]">শর্ট ফিল্ম</button>
                    <button class="block lg:w-[300px]  py-2 mb-[12px] font-700 text-center bg-white  text-[#4e4e51]">নিউজ</button>
                </div>
            </div>
    
        </div>
    </div>
</div>

<!-- নিবন্ধন -->

<div class="py-10 md:py-[220px] flex flex-col items-center justify-center w-full bg-[#f9f9f9]">
    <div class="container mx-auto px-4 md:px-10">
        <div class="w-full mt-2 lg:w-[820px] px-2 mx-auto">
            <h2 class="mb-[17px] font-[700] text-[45px] text-center"> নিবন্ধন </h2>
            <p class="font-[600] text-center text-[18px] text-[#8D8989] leading-[30px]">
                চলচ্চিত্র ও প্রকাশনার মাধ্যমে দেশের ইতিহাস ও ঐতিহ্যের চিত্র ভবিষ্যত প্রজন্মের ধারণ করা এবং সরকারের অনুসৃত নীতি ও উন্নয়ন কার্যক্রমে জনগণকে সম্পৃক্ত করা এ অধিদপ্তরের মূল লক্ষ্য। 
            </p>
        </div>

        <div class="form px-4 md:px-0 w-full mt-10 md:mt-[70px] border-blue rounded-md bg-white">
            <div class="w-full md:w-[586px] my-10 md:my-[60px] mx-auto">
                <div class="flex items-center justify-between">
                    <h2 class="font-[700] leading-[45px] text-[30px] text-[#545454] text-left"> পত্রিকা নামের ছাড়পত্র </h2>
                    <i class="fa-solid fa-arrow-right-long fa-2x "></i>
                </div>
                
                <form class="my-10 md:mt-[40px]" action="">
                    <div class="form-group mb-5 md:mb-[24px]">
                        <label for="" class=""> ১। শিক্ষাসনদ (সবগুলো) </label>
                        <div class="flex mt-3">
                            <input type="text" class="w-full ml-6 border-2 focus:outline-none">
                            <button class="py-2 px-6 bg-[#EBEBEB] text-[#C7C7CC] ml-[14px]"> <i class="fa-solid fa-up-long"></i> </button>
                        </div>
                    </div>

                    <div class="form-group mb-5 md:mb-[24px]">
                        <label for="" class=""> ২। ব্যাংক আর্থিক স্বচ্ছলতা সনদপত্র</label>
                        <div class="flex mt-3">
                            <input type="text" class="w-full ml-6 border-2 focus:outline-none">
                            <button class="py-2 px-6 bg-[#EBEBEB] text-[#C7C7CC] ml-[14px]"> <i class="fa-solid fa-up-long"></i> </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class=""> ৩। ব্যাংকের ৬ মাসের এস্টেটমেন্ট </label>
                        <div class="flex mt-3">
                            <input type="text" class="w-full ml-6 border-2 focus:outline-none">
                            <button class="py-2 px-6 bg-[#EBEBEB] text-[#C7C7CC] ml-[14px]"> <i class="fa-solid fa-up-long"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- বিজ্ঞাপন ও নিরীক্ষা -->
<div class="py-10 px-4 md:px-0 md:py-[210px] pt-10 md:pt-[210px] bg-gradient-white">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-start-6 md:col-span-7 lg:col-start-5 lg:col-span-8">  
                <div class="lg:w-[700px] xl:w-[750px]">
                    <h2 class="text-black font-[700] text-[45px] leading-[67px]"> বিজ্ঞাপন ও নিরীক্ষা  </h2>
                    <p class="my-10 leading-[30px] text-[14px] xl:text-[16px] text-[#8d8989] font-[600]">
                        চলচ্চিত্র ও প্রকাশনার মাধ্যমে দেশের ইতিহাস ও ঐতিহ্যের চিত্র 
                        ভবিষ্যত প্রজন্মের ধারণ করা এবং সরকারের অনুসৃত নীতি ও 
                        উন্নয়ন কার্যক্রমে জনগণকে সম্পৃক্ত করা এ অধিদপ্তরের মূল লক্ষ্য। 
                    </p>
                </div>  
            </div>
            <!-- button  -->
            <div class="col-span-12 md:col-span-5 lg:col-span-4">
                <div class="flex flex-col justify-center md:mr-[60px]">
                    <button class="block lg:w-[300px]  py-2 mb-[12px] font-700 mb-2 bg-[#E6E5E5] text-center text-[#4e4e51]">মোট নিবন্ধিত পত্রিকা</button>
                    <button class="block lg:w-[300px]  py-2 mb-[12px] font-700 mb-2 text-center text-white btn-gradient-orange">মিডিয়া তালিকাভুক্তির আবেদন </button>
                </div>
            </div>
    
            <!-- form -->
            <div class="col-span-12 md:col-span-7 lg:col-span-8 bg-white md:px-[48px]">
                <div class="grid grid-cols-12 gap-4 overflow-hidden">
                    <div class="col-span-12 md:col-span-9 lg:col-span-10">
                        <div class="form w-full mt-10">
                            <div class="w-full lg:w-[586px] mx-auto">
                                <div class="flex items-center justify-between">
                                    <h2 class="font-[700] leading-[45px] text-[30px] text-[#545454] text-left"> মিডিয়া তালিকাভুক্তির আবেদন </h2>
                                    <img class="w-[41px] h-[22.46px]" src="image/bitmap.png" alt="">
                                </div>
                                
                                <form class="my-10 md:mt-[40px]" action="">
                                    <div class="form-group mb-5 md:mb-[24px]">
                                        <label for="" class=""> ১। পত্রিকার নাম </label>
                                        <div class="flex mt-3">
                                            <input type="text" class="w-full ml-6 border-2 focus:outline-none">
                                        </div>
                                    </div>
            
                                    <div class="form-group mb-5 md:mb-[24px]">
                                        <label for="" class=""> ২। জাতীয় পরিচয়পত্রের কপিসহ প্রকাশকের নাম ও ঠিকানা </label>
                                        <div class="flex mt-3">
                                            <input type="text" class="w-full ml-6 border-2 focus:outline-none">
                                            <button class="py-2 px-6 bg-[#EBEBEB] text-[#C7C7CC] ml-[14px]"> <i class="fa-solid fa-up-long"></i> </button>
                                        </div>
                                    </div>
            
                                    <div class="form-group mb-5">
                                        <label for="" class=""> ৩। পত্রিকা প্রথম প্রকাশের তারিখ </label>
                                        <div class="flex mt-3">
                                            <input type="text" class="w-full ml-6 border-2 focus:outline-none">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
        </div> 
    </div>
</div>

@endsection

