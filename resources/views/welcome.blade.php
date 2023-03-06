@extends('layouts.app')
@section('style')
.header-home{
    height: 600px ;
}
@endsection

@section('hero_section')
<div class="hero pl-4 my-10 container mx-auto">
    <div class="flex flex-col-reverse justify-center  md:flex-row md:justify-between items-center">
        <h1 class="text-white md:ml-3 font-bold text-[30px] w-[310px] md:text-[40px] md:w-[410px] leading-[70px] lg:text-[60px] lg:w-[600px] lg:leading-[90px]">
            চলচ্চিত্র, সম্পাদনা
            প্রকাশনা ও নিবন্ধনের
            ডিজিটাল প্লাটফর্ম
        </h1> 
       <img class="w-[432px] h-[340px]" src="{{ asset('image/book.png')}}" alt="">
    </div>
</div>
@endsection

@section('content')

<!-- চলচ্চিত্র -->
<div class="container mx-auto my-10 px-2">     
    <div class="grid grid-cols-12 gap-4 my-10 md:my-[220px] px-2 md:px-0"> 
        <div class="col-span-12 md:col-start-6 md:col-span-12 lg:col-start-5 lg:col-span-8">  
            <div class="lg:w-[720px] px-2 lg:px-0">
                <h2 class="text-black font-[700] text-[45px]"> {{ $first_section->section_name }} </h2>
                <p class="my-10 leading-[30px] text-[16px] text-[#8d8989] font-[600]">
                    {{ $first_section->section_description }}
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
                    <a href="{{ route('video.subsection.posts',$item->slug) }}" class="block font-700 lg:w-[300px] py-3  mb-[12px] text-center text-black bg-white transition duration-100 hover-flim-btn shadow-sm"> {{ $item->subsection_name }}</a>
                    @endif 
                @endforeach
                
            </div>
        </div>

        <!-- POST  -->
        <div class="col-span-12 md:col-span-7 lg:col-span-8 bg-white py-10 pl-2 md:px-2 lg:px-[40px] post-box rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-[#4e4e51] font-[700] text-sm md:text-[25px]"> {{ $first_section->subsections[0]->subsection_name }} </h2>
            </div>
            
            <div class="owl-carousel owl-theme post-slider post-book w-full grid grid-cols-12 gap-4 mt-10">
                @foreach ($flim_posts as $post)
                    @if($post->file_url)
                        <div class="item">  
                            <div class="video">
                                <video width="500px" height="500px" controls="controls"/>
                                
                                <source src="{{ asset($post->file_url)}}" type="video/mp4"> 
                            </div>                             
                                           
                            <a href="{{ route('video.posts.details',$post->slug) }}" class="font-[700] text-black block my-4">{{ $post->post_name }} </p>
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
                    <h2 class="text-black font-[700] text-[45px] leading-[67.5px]"> {{ $second_section->section_name }} </h2>
                    <p class="my-10 leading-[30px] text-[16px] text-[#8d8989] font-[600]">
                        {{ $second_section->section_description }}
                    </p>
                </div>  
            </div>
            
    
            <!-- POST BOOK -->
            <div class="col-span-12 md:col-span-7 lg:col-span-8">
                <div class="lg:px-[48px] py-10 bg-white rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <h2 class="text-black font-[700] md:text-[25px] leading-36"> {{ $second_section->subsections[0]->subsection_name }} </h2>
                    </div>
                    
                    <!-- slider  -->
                    <div class="mt-10 grid grid-cols-12 gap-4 overflow-hidden owl-carousel owl-theme post-book-slider pr-4">   
                        @foreach ($book_posts as $post)
                        <div class="item">
                            <a href="{{ route('book.post.details',$post->slug) }}">
                                <img class="book-img" src="{{ asset($post->thumbnail) }}" alt="{{ $post->post_name }}">
                            </a>
                            <a href="{{ route('book.post.details',$post->slug) }}" class="font-[700] text-black block my-4">{{ $post->post_date }} </a>
                        </div>  
                        @endforeach   
                    </div>

                    <!-- Post Button  -->
                    <div class="flex itmes-center justify-end -mt-11">
                        <a href="{{ route('book.posts') }}" class="relative z-50 font-[700] px-4 mr-4 py-2 bg-green-10 text-md text-[#108A25]"> সব দেখুন </a>   
                    </div>
                </div>
            </div>
    
            <!-- button  -->
            <div class="col-span-12 md:col-span-5 lg:col-span-4 -mt-2">
                <div class="flex flex-col justify-start md:ml-[60px]">
                    @foreach ($second_section->subsections as $item)
                        @if($item->subsection_position == 1)
                        <a href="{{ route('book.subsection.posts',$item->slug) }}" class="block font-700 lg:w-[300px] py-2 text-center  mb-[12px] btn-gradient-green"> {{ $item->subsection_name }}</a>
                        @else
                        <a href="{{ route('book.subsection.posts',$item->slug) }}" class="block font-700 lg:w-[300px] py-3  mb-[12px] text-center text-black bg-white transition duration-100 hover-book-btn shadow-sm"> {{ $item->subsection_name }}</a>
                        @endif 
                    @endforeach
                </div>
            </div>

            <div class="col-span-12">
                <!-- upload-page-button  -->
                <div class="mt-10 md:mt-[125px] lg:mr-[42px]"> 
                    <h2 class="font-700 md:text-[36px] text-[#4801FF] leading-67 border-bottom-22"> সম্পাদনা শাখায় বিষয়ভিত্তিক লেখা জমা দিন </h2>
                    <div class="mt-10 md:mt-[50px]">
                        <label class="block mt-[22px]">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <img class="w-10 h-10 md:w-[35px] md:h-[35px]" src="{{ asset('image/input-book.png') }}" alt="{{$second_section->section_name}}">
                                    <span class="ml-2 text-black font-700 text-sm md:text-[14px] xl:text-[17px] leading-36">
                                        সচিত্র বাংলাদেশ, মাসিক নবারুণ ও বাংলাদেশ কোয়ার্টারলিতে লেখা জমা দিতে <span class="text-[#3023AE]"> ‘জমা দিন’ </span>  বাটনে ক্লিক করুন
                                    </span>
                                </div>
                                <a href="{{ route('user.file.upload') }}" class="py-[12px] px-[45px] text-[12px] md:text-[16px] hover-bg-pink bg-[#C7C7CC] text-black rounded-md"> জমা দিন </a>
                            </div>
                        </label>
                    </div>
                </div>  
            </div>
    
        </div>
    </div>
</div>

<!-- নিবন্ধন -->

<div class="py-10 md:py-[220px] flex flex-col items-center justify-center w-full bg-[#f9f9f9]">
    <div class="container mx-auto px-4 md:px-10">
        <div class="w-full mt-2 lg:w-[820px] px-2 mx-auto">
            <h2 class="mb-[17px] font-[700] text-[45px] text-center"> {{ $news_header->title }} </h2>
            <p class="font-[600] text-center text-[18px] text-[#8D8989] leading-[30px]">
                {{ $news_header->short_text}}
            </p>
        </div>

        <div class="form input-overflow px-4 md:px-0 w-full mt-10 md:mt-[70px] border-blue rounded-md bg-white">
            <div class="w-full md:w-[586px] my-10 md:my-[60px] mx-auto">
                <div class="flex items-center justify-between">
                    <h2 class="font-[700] leading-[45px] text-[30px] text-[#545454] text-left"> পত্রিকা নামের ছাড়পত্র </h2>
                    <a href="{{ route('new.clearence.form') }}"> <img src="{{ asset('media/icon/Bitmap.png') }}" class="w-10"></a>
                   
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
                            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                        </div>
                        <input class="ml-6 file-input border-none mt-3 @error('লোকাল_এমপি’র_প্রত্যয়নপত্র') error @enderror" type="file" name="লোকাল_এমপি’র_প্রত্যয়নপত্র">   

                        @error("লোকাল_এমপি’র_প্রত্যয়নপত্র")
                                <p class="mt-2 text-red-500 ml-6">{{ $message }}</p>    
                        @enderror
                    </div>

                    <div class="form-group mb-5 md:mb-[50px] flex flex-col"> 
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
                    <button class="block lg:w-[300px]  py-3 mb-[12px] font-700 bg-[#E6E5E5] text-center text-[#4e4e51]">মোট নিবন্ধিত পত্রিকা</button>
                    <button class="block lg:w-[300px]  py-3 mb-[12px] font-700 text-center text-white btn-gradient-orange">মিডিয়া তালিকাভুক্তির আবেদন </button>
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
                                    <div class="form-group mb-5 md:mb-10">
                                        <label for="" class=""> ১। পত্রিকার নাম </label>
                                        <div class="flex mt-3">
                                            <input type="text" class="w-full ml-6 border-2 focus:outline-none">
                                        </div>
                                    </div>
            
                                    <div class="form-group mb-5 md:mb-10">
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

@section('script')
    <script>
        $(document).ready(function(){

            $('#file').each(function() {
                $input = $(this).children('#file_input');
            
                $input.change(function() {
                    var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
                    var id = $(this).attr('data-name');
                    alert(id);
                    $(this).siblings('#'+id).text(filename);
                })
            });   
        })
    </script>
@endsection

