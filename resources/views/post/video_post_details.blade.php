@extends('layouts.app')
@section('style')
    .video-image{
        width:475px;
        height:289px;
    }
@endsection
@section('content')
<div class="hero">
    <div class="flex flex-col-reverse justify-center items-center md:flex-row md:justify-between items-center">
       <img class="w-full h-full" src="{{ asset('image/Slide.png')}}" alt="">
    </div>
</div>

{{-- video detials  --}}
<div class="post container mx-auto my-10 md:my-[182px]">
    <div class="flex flex-col md:flex-row justify-center items-center md:items-start">
        @if ($post->file_url)
        <div>
            <div class="post-item p-2">
                <video class="rounded-md"  width="475" height="300" controls="controls"/>
                
                <source class="rounded-md" src="{{ asset($post->file_url) }}" type="video/mp4"> 
            </div> 
            <a href="{{ route('download.post', $post->slug) }}" class="mt-[17px] py-2 text-white text-[18px] font-700 flex items-center justify-center btn-gradient-pink">
                ডাউনলোড
            </a> 
        </div>
        
        @else
        <div class="post-item p-2 w-[475px] h-[289px]"> 
            <div class="youtube relative" video-id={{ $post->video_link }}>
                <img src="{{ asset('/media/icon/play.png') }}" class="absolute">
                <img src="//i.ytimg.com/vi/{{ $post->video_link}}/hqdefault.jpg" class="video-image">
            </div>                   
        </div>   
        @endif
        
        <div class="post-details max-w-[459px] mt-6 md:mt-2 px-[19px]">
            <h2 class="text-black font-700 text-[36px] leading-[54px]"> {{ $post->post_name }} </h2>
            <p class="font-[500] text-[#8E8E93] text-[16px] leading-[24px] mt-[10px] mb-[22px]">
                {{ $post->post_desciption }}
            </p>
            <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                প্রযেজকঃ
               <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                {{ $post->director }}
                </span>
            </p>
            <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                পরিচালকঃ
               <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                {{ $post->producer }}
                </span>
            </p>
            <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                স্ক্রিপ্ট রাইটারঃ
               <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                {{ $post->script_writer}}
                </span>
            </p>

            <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                সার্বিক সহযোগিতায়ঃ
               <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                {{ $post->cooperation}}
                </span>
            </p>
            <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                কপিরাইটঃ
               <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                {{ $post->copyright}}
                </span>
            </p>
            <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                বাস্তবায়নেঃ 
               <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                {{ $post->implementation}}
                </span>
            </p>
        </div>
    </div>
</div>
@endsection