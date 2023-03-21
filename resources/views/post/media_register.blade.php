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
<div class="container mx-auto my-10 md:m-[204px">
    <div class="w-full mx-2 md:w-[676px] md:mx-auto">
        <h2 class="font-700 text-[20px] md:text-[48px] leading-67 text-center text-black"> {{ $media->title }}</h2>
        <p class="text-[18px] mt-[17px] text-[#8D8989] font-[600] leading-[30px] text-center md:text-left"> 
            {{ $media->short_text }}
        </p>

        <div class="flex flex-col md:flex-row md:justify-between mt-[70px]">
            <a href="{{ route('all.media.news') }}" class="py-2 px-[70px] font-700 text-[18px]  leading-[27px rounded-md transition duration-300 text-[#4801FF] bg-blue-100 text-center">
                মোট নিবন্ধিত পত্রিকা
            </a>
            <a href="{{ route('media.form') }}" class="mt-5 md:mt-0 py-2 px-[32px] font-700 text-[18px] text-[#4E4E51] leading-[27px] bg-gray-200 rounded-md transition duration-300 hover:text-[#4801FF] hover:bg-blue-100 text-center">
                মিডিয়া তালিকাভুক্তির আবেদন
            </a>
        </div>
    </div>
<div>

<div class="container">
    <!-- PDF  -->
    <div class="pdf mt-10 md:mt-[110px] md:mb-[204px] px-2 md:px-8 xl:px-0">
        @foreach ($registers as $register)
        <div class="border-33">
            <h2 class="font-700 text-[20px] md:text-[25px] leading-36 text-[#545454]"> প্রকাশিত ইংরেজি ভাষায় প্রকাশিত মিডিয়াভুক্ত দৈনিক </h2>
            <a href={{asset($register->pdf_url) }} target="blank" class="flex items-center mt-[20px] w-full md:w-[530px]">
                <img class="w-[50px] h-[50px]" src="{{ asset('media/icon/pdf-icon.png') }}" alt="">
                <p class="ml-[22px] text-[15px] md:text-[18px] leading-[27px] font-[600] text-[#545454]"> 
                    {{ $register->description }}
                </p>
            </a>
        </div> 
        @endforeach
    </div>
</div>
@endsection