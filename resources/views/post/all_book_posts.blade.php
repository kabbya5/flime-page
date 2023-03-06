@extends('layouts.app')
@section('content')
<div class="hero">
    <div class="flex flex-col-reverse justify-center md:flex-row md:justify-between items-center">
       <img class="w-full h-full" src="{{ asset('image/Banner.png')}}" alt="">
    </div>
</div>


<!-- সচিত্র বাংলাদেশ -->
<div class="pt-10 px-4 lg:px-3 xl:px-0 md:pt-[190px] bg-white">
    <div class="container mx-auto pb-5 md:pb-[221px]">
        <div class="flex justify-between items-center">
            <h2 class="font-700 text-[45px] leading-[67px] text-[#7028F7]"> {{ $pictorials->subsection_name}} </h2>
            <a href="{{ route('book.subsection.posts', $pictorials->slug) }}" class="font-700 texxt-[19px] px-6 py-2 bg-pink-10 leading-[30px] text-[#7028F7] lg:mr-[42px]"> সব দেখুন </a>
        </div>
        <div class="editing-section mt-6 md:mt-[53px]">
            <div class="slider owl-carousel owl-theme book-editing-slider w-full grid grid-cols-12 gap-4">
                @foreach ($pictorials->posts as $post)
                <div class="item lg:mr-[42px]">
                    <a href="{{ route('book.post.details',$post->slug) }}">
                        <img class="book-img" src="{{ asset($post->thumbnail) }}" alt="{{ $post->post_name }}">
                    </a>
                    <a href="{{ route('book.post.details',$post->slug) }}" class="font-[700] text-black block my-4">{{ $post->post_date }} </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- upload-page-button  -->
        <div class="mt-10 md:mt-[125px] lg:mr-[42px]"> 
            <h2 class="text-black font-700 md:text-[36px] leading-67"> সচিত্র বাংলাদেশ-এ বাছাইকৃত লেখা জমাদান </h2>
            <div class="mt-10 md:mt-[50px]">
                <h4 class="font-700 text-black text-sm md:text-[24px] leading-36 border-bottom-22"> 
                    <span class="text-[#8E8E93]"> সংখ্যা:  </span>
                    @php
                        echo date('F Y');
                    @endphp
                </h4>
                <label class="block mt-[22px]">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="w-10 h-10 md:w-[35px] md:h-[35px]" src="{{ asset('image/input-book.png') }}" alt="{{$pictorials->subsection_name}}">
                            <span class="ml-2 text-black font-700 text-sm md:text-[21px] leading-36">
                                বিষয়ভিত্তিকজ লেখা জমা দিতে 'জমা দিন' বাটনে ক্লিক করুন 
                            </span>
                        </div>
                        <a href="{{ route('user.file.upload') }}" class="py-[12px] px-[45px] text-[12px] md:text-[16px] hover-bg-pink bg-[#C7C7CC] text-black rounded-md"> জমা দিন </a>
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>

<!-- মাসিক নবারুণ -->
<div class="pt-10 px-4 lg:px-3 xl:px-0 md:pt-[115px] bg-gradient-blue-white">
    <div class="container mx-auto pb-5 md:pb-[115px]">
        <div class="flex justify-between items-center">
            <h2 class="font-700 text-[45px] leading-[67px] text-[#008B18]"> মাসিক নবারুণ </h2>
            <a href="{{route('book.subsection.posts',$menstruals->slug)}}" class="font-700 texxt-[19px] px-6 py-2 bg-green-10 leading-[30px] text-[#008B18] lg:mr-[42px]"> সব দেখুন </a>
        </div>
        <div class="editing-section mt-6 md:mt-[53px]">
            <div class="slider owl-carousel owl-theme book-editing-slider w-full grid grid-cols-12 gap-4">
                @foreach ($menstruals->posts as $post)
                    <div class="item lg:mr-[42px]">
                        <a href="{{ route('book.post.details',$post->slug) }}">
                            <img class="book-img" src="{{ asset($post->thumbnail) }}" alt="{{ $post->post_name }}">
                        </a>
                        <a href="{{ route('book.post.details',$post->slug) }}" class="font-[700] text-black block my-4 rounded-md hover-bg-pink">{{ $post->post_date }} </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- upload-page-button  -->
        <div class="mt-10 md:mt-[125px] lg:mr-[42px]"> 
            <h2 class="text-black font-700 md:text-[36px] leading-67"> মাসিক নবারুণ-এ বাছাইকৃত লেখা জমাদান </h2>
            <div class="mt-10 md:mt-[50px]">
                <h4 class="font-700 text-black text-sm md:text-[24px] leading-36 border-bottom-22"> 
                    <span class="text-[#8E8E93]"> সংখ্যা:  </span>
                    @php
                        echo date('F Y');
                    @endphp
                </h4>
                <label class="block mt-[22px]">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="w-10 h-10 md:w-[35px] md:h-[35px]" src="{{ asset('image/input-book.png') }}" alt="{{$pictorials->subsection_name}}">
                            <span class="ml-2 text-black font-700 text-sm md:text-[21px] leading-36">
                                বিষয়ভিত্তিকজ লেখা জমা দিতে 'জমা দিন' বাটনে ক্লিক করুন
                            </span>
                        </div>
                        <a href="{{ route('user.file.upload') }}" class="py-[12px] px-[45px] text-[12px] md:text-[16px] hover-bg-pink bg-[#C7C7CC] text-black rounded-md"> জমা দিন </a>
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>

<!-- বাংলাদেশ কোয়ার্টারলি -->
<div class="pt-10 px-4 lg:px-3 xl:px-0 md:pt-[190px] bg-white">
    <div class="container mx-auto pb-5 md:pb-[221px]">
        <div class="flex justify-between items-center">
            <h2 class="font-700 text-[45px] leading-[67px] text-[#EC5B00]"> {{$quarterlies->subsection_name  }} </h2>
            <a href="{{ route('book.subsection.posts',$quarterlies->slug) }}" class="font-700 texxt-[19px] px-6 py-2 bg-red-10 leading-[30px] text-[#EC5B00] lg:mr-[42px]"> সব দেখুন </a>
        </div>
        <div class="editing-section mt-6 md:mt-[53px]">
            <div class="slider owl-carousel owl-theme book-editing-slider w-full grid grid-cols-12 gap-4">
                @foreach ($quarterlies->posts as $post)
                <div class="item lg:mr-[42px]">
                    <a href="{{ route('book.post.details',$post->slug) }}">
                        <img class="book-img" src="{{ asset($post->thumbnail) }}" alt="{{ $post->post_name }}">
                    </a>
                    <a href="{{ route('book.post.details',$post->slug) }}" class="font-[700] text-black block my-4">{{ $post->post_date }} </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- upload-page-button  -->
        <div class="mt-10 md:mt-[125px] lg:mr-[42px]"> 
            <h2 class="text-black font-700 md:text-[36px] leading-67"> বাংলাদেশ কোয়ার্টারলিতে বাছাইকৃত লেখা জমাদান </h2>
            <div class="mt-10 md:mt-[50px]">
                <h4 class="font-700 text-black text-sm md:text-[24px] leading-36 border-bottom-22"> 
                    <span class="text-[#8E8E93]"> সংখ্যা:  </span>
                    @php
                        echo date('F Y');
                    @endphp
                </h4>
                <label class="block mt-[22px]">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="w-10 h-10 md:w-[35px] md:h-[35px]" src="{{ asset('image/input-book.png') }}" alt="{{$pictorials->subsection_name}}">
                            <span class="ml-2 text-black font-700 text-sm md:text-[21px] leading-36">
                                বিষয়ভিত্তিকজ লেখা জমা দিতে 'জমা দিন' বাটনে ক্লিক করুন 
                            </span>
                        </div>
                        <a href="{{ route('user.file.upload') }}" class="py-[12px] px-[45px] text-[12px] md:text-[16px] hover-bg-pink bg-[#C7C7CC] text-black rounded-md"> জমা দিন </a>
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>

<!-- অ্যাডহক প্রকাশনা-->
<div class="pt-10 px-4 lg:px-3 xl:px-0 md:pt-[115px] bg-gradient-semi-white">
    <div class="container mx-auto pb-5 md:pb-[115px]">
        <div class="flex justify-between items-center">
            <h2 class="font-700 text-[45px] leading-[67px] text-[#FF2D55]"> {{ $publications->subsection_name }} </h2>
            <a href="{{ route('book.subsection.posts',$publications->slug) }}" class="font-700 texxt-[19px] px-6 py-2 bg-red-10 leading-[30px] text-[#FF2D55] lg:mr-[42px]"> সব দেখুন </a>
        </div>
        <div class="editing-section mt-6 md:mt-[53px]">
            <div class="slider owl-carousel owl-theme book-editing-slider w-full grid grid-cols-12 gap-4">
                @foreach ($quarterlies->posts as $post)
                <div class="item lg:mr-[42px]">
                    <a href="{{ route('book.post.details',$post->slug) }}">
                        <img class="book-img" src="{{ asset($post->thumbnail) }}" alt="{{ $post->post_name }}">
                    </a>
                    <a href="{{ route('book.post.details',$post->slug) }}" class="font-[700] text-black block my-4">{{ $post->post_name }} </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection