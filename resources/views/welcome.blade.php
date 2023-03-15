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
                <h2 class="subsection-name text-black font-[700] text-[45px]"> {{ $first_section->section_name }} </h2>
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
                    <button  data-id="{{$item->id}}" data-name="{{ $item->subsection_name }}" data-slug="{{ $item->slug }}" class="subsection-video block font-700 lg:w-[300px] py-2 text-center  mb-[12px] text-black bg-white transition duration-100 hover-flim-btn box-shadow  btn-gradient"> {{ $item->subsection_name }}</button>
                    @else
                    <button  data-id="{{$item->id}}" data-name="{{ $item->subsection_name }}" data-slug="{{ $item->slug }}" class="subsection-video block font-700 lg:w-[300px] py-3  mb-[12px] text-center text-black bg-white transition duration-100 hover-flim-btn box-shadow"> {{ $item->subsection_name }}</button>
                    @endif 
                @endforeach
                
            </div>
        </div>

        <!-- POST  -->
        <div class="col-span-12 md:col-span-7 lg:col-span-8 bg-white py-10 pl-2 md:px-2 lg:px-[40px] post-box rounded-lg box-shadow">
            <div class="flex items-center justify-between">
                <h2 class="text-[#4e4e51] font-[700] text-sm md:text-[25px]"> {{ $first_section->subsections[0]->subsection_name }} </h2>
            </div>

            <div id="result">
                <div  class="owl-carousel owl-theme post-slider post-book w-full grid grid-cols-12 gap-4 mt-10">
                    @foreach ($flim_posts as $post)
                        @if($post->file_url)
                            <div class="item">  
                                <div class="video">
                                    <video width="500px" height="500px" controls="controls"/>
                                    
                                    <source src="{{ asset($post->file_url)}}" type="video/mp4"> 
                                </div>                             
                                               
                                <a href="{{ route('video.posts.details',$post->slug) }}" class="font-[700] text-black block my-4">{{ $post->post_name }} </a>
                            </div>
                        @else
                        <div class="item">
                            <iframe width="560" height="315" src="{{ $post->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <a href="{{ route('video.posts.details',$post->slug) }}" class="font-[700] text-black block my-4">{{ $post->post_name }} </a>
                        </div>
                        @endif   
                    @endforeach
                </div>
            </div>
            
            
                
            <!-- Post Button  -->
            <div class="flex itmes-center justify-end -mt-11">
                <a href="{{ route('video.subsection.posts',$first_section->subsections[0]->slug) }}" class="video-subsection-all relative z-50 font-[700] px-4 py-2 bg-red-10 text-md text-[#E25896] rounded-md"> সব দেখুন </a>            
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
                <div class="lg:px-[48px] py-10 bg-white rounded-lg box-shadow">
                    <div class="flex items-center justify-between">
                        <h2 class="book-subsection-name text-black font-[700] md:text-[25px] leading-36"> {{ $second_section->subsections[0]->subsection_name }} </h2>
                    </div>
                    
                    <!-- slider  -->
                    <div id="result-book">
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
                    </div>
                    

                    <!-- Post Button  -->
                    <div class="flex itmes-center justify-end -mt-11">
                        <a href="{{ route('book.subsection.posts',$second_section->subsections[0]->slug) }}" class="book-subsection-all relative z-50 font-[700] px-4 mr-4 py-2 bg-green-10 text-md text-[#108A25]"> সব দেখুন </a>   
                    </div>
                </div>
            </div>
    
            <!-- button  -->
            <div class="col-span-12 md:col-span-5 lg:col-span-4 -mt-2">
                <div class="flex flex-col justify-start md:ml-[60px]">
                    @foreach ($second_section->subsections as $subsection)
                        @if($subsection->subsection_position == 1)
                        <button data-id="{{ $subsection->id }}" data-name="{{ $subsection->subsection_name }}" data-slug="{{ $subsection->slug }}" class="book-subsection block font-700 lg:w-[300px] py-2 text-center  mb-[12px] btn-gradient-green box-shadow"> {{ $subsection->subsection_name }}</button>
                        @else
                        <button  data-id="{{ $subsection->id }}" data-name="{{ $subsection->subsection_name }}" data-slug="{{ $subsection->slug }}" class="book-subsection block font-700 lg:w-[300px] py-3  mb-[12px] text-center text-black bg-white transition duration-100 hover-book-btn box-shadow"> {{ $subsection->subsection_name }}</button>
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
</div>


<!-- বিজ্ঞাপন ও নিরীক্ষা -->
<div class="py-10 px-4 md:px-0 md:py-[210px] pt-10 md:pt-[210px] bg-gradient-white">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-start-6 md:col-span-7 lg:col-start-5 lg:col-span-8">  
                <div class="lg:w-[700px] xl:w-[750px]">
                    <h2 class="text-black font-[700] text-[45px] leading-[67px]"> {{ $media_header->title }} </h2>
                    <p class="my-10 leading-[30px] text-[14px] xl:text-[16px] text-[#8d8989] font-[600]">
                        {{ $media_header->short_text}}
                    </p>
                </div>  
            </div>
            <!-- button  -->
            <div class="col-span-12 md:col-span-5 lg:col-span-4">
                <div class="flex flex-col justify-center md:mr-[60px]">
                    <a href="{{ route('all.media.news') }}" class="block lg:w-[300px]  py-3 mb-[12px] font-700 bg-white text-center text-black box-shadow media-hover">মোট নিবন্ধিত পত্রিকা</a>
                    <a href="{{ route('media.form') }}" class="block lg:w-[300px]  py-3 mb-[12px] font-700 text-center text-white btn-gradient-orange box-shadow">মিডিয়া তালিকাভুক্তির আবেদন </a>
                </div>
            </div>
    
            <!-- form -->
            <div class="col-span-12 md:col-span-7 lg:col-span-8 bg-white md:px-[48px]">
                <div class="grid grid-cols-12 gap-4 overflow-hidden">
                    <div class="col-span-12 md:col-span-9 lg:col-span-10">
                        <div class="form w-full mt-10">
                            <div class="w-full lg:w-[586px] mx-auto form input-overflow">  
                                <div class="flex items-center justify-between">
                                    <h2 class="font-[700] leading-[45px] text-[30px] text-[#545454] text-left"> মিডিয়া তালিকাভুক্তির আবেদন </h2>
                                    <a href="{{ route('media.form') }}"> <img src="{{ asset('media/icon/Bitmap.png') }}" class="w-10"></a>
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
    
                </div>
            </div>
        </div> 
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $(".subsection-video").click(function(){
                $(this).siblings('.subsection-video').removeClass('btn-gradient');
                $(this).addClass('btn-gradient');  

                let id = $(this).attr('data-id');
                let name = $(this).attr('data-name');
                $('.subsection-name').text(name);

                let slug = $(this).attr('data-slug');
                var new_url = '/video/subsections/posts/' + slug;
                $('.video-subsection-all').attr('href', new_url);
        
                $.ajax({
                        url:"/video/post/" + id,
                        type:"GET",
                        datatype:"html",
                })
                .done(function (response) {
                    $('#result').empty();
                        
                    $("#result").append(response);

                    $('.post-slider').owlCarousel({
                        loop:true,
                        margin:10,
                        nav:true,
                        navText: ["<div class='nav-button owl-prev'>"+
                            "<i class='fa-solid fa-arrow-left text-lg text-[#857F7F] bg-white box-shadow  px-6 py-2'></i>"+
                            "</div>", 
                            "<div class='nav-button owl-next'>"+
                                "<i class='fa-solid fa-arrow-right text-lg text-[#857F7F] bg-white box-shadow px-6 py-2'></i>"+
                            "</div>"],  
                        responsive:{
                            0:{
                                items:2
                            },
                            600:{
                                items:2
                            },
                            1000:{
                                items:3
                            }
                        }
                    })
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('Server error occured');
                });
            });

            $(".book-subsection").click(function(){
                $(this).siblings('.book-subsection').removeClass('btn-gradient-green');
                $(this).addClass('btn-gradient-green');   
                let id = $(this).attr('data-id');
                let name = $(this).attr('data-name');
                $('.book-subsection-name').text(name);
                let slug = $(this).attr('data-slug');

                var new_url = '/book/subsections/posts/' + slug;
                $('.book-subsection-all').attr('href', new_url);

                $.ajax({
                    url:"/book/post/" + id,
                    type:"GET",
                    datatype:"html",
                })
                .done(function (response) {
                    $('#result-book').empty();
                        
                    $("#result-book").append(response);

                    $('.post-book-slider').owlCarousel({
                        loop:true,
                        margin:10,
                        nav:true,
                        navText: ["<div class='nav-button owl-prev'>"+
                            "<i class='fa-solid fa-arrow-left text-lg text-[#857F7F] bg-white box-shadow  px-6 py-2'></i>"+
                            "</div>", 
                            "<div class='nav-button owl-next'>"+
                                "<i class='fa-solid fa-arrow-right text-lg text-[#857F7F] bg-white box-shadow px-6 py-2'></i>"+
                            "</div>"], 
                        responsive:{
                            0:{
                                items:2
                            },
                            1000:{
                                items:4
                            }
                        }
                    })

                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('Server error occured');
                });
            });
        });
    </script>
@endsection
