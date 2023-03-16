@extends('layouts.app')
@section('content')
<div class="hero">
    <div class="flex flex-col-reverse justify-center items-center md:flex-row md:justify-between items-center">
       <img class="w-full h-full" src="{{ asset('image/Slide.png')}}" alt="">
    </div>
</div>


<div class="all-posts bg-[#F2F2F2] py-5 md:py-[196px]">
    <div class="container mx-auto px-3 md:px-4 xl:px-0">
        <h2 class="font-700 text-[45px] leading-67
        @if ($subsection->subsection_name == 'চলচ্চিত্র')
        text-[#5856D6]
        @elseif ($subsection->subsection_name == 'ডকুমেন্টারি')
        text-[#E728AC]
        @elseif ($subsection->subsection_name == 'শর্ট ফিল্ম')
        text-[#007AFF]
        @else
        text-[#05831B]
        @endif () 
         
         "> {{ $subsection->subsection_name }} </h2>
        <div class="grid grid-cols-12 gap-4">
            @foreach ($posts as $post)
                @if ($post->file_url)
                <div class="item col-span-6 md:col-span-4 p-2 mt-[35px]"> 
                    <div class="video">
                        <video class="rounded-md"  width="500px" height="500px" controls="controls"/>
                        
                        <source class="rounded-md" src="{{ asset($post->file_url) }}" type="video/mp4"> 
                    </div>                             
                                    
                    <a href="{{ route('video.posts.details',$post->slug) }}" class="font-700 text-[19px] leaidng-[18px] text-black block my-4">{{ $post->post_name }} </a>
                </div>
                @else
                <div class="item col-span-6 md:col-span-4 p-2 mt-[35px]">
                    <iframe class="rounded-md" width="560" height="315" src="https://www.youtube.com/embed/GTe7TEppmg0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <a href="{{ route('video.posts.details',$post->slug) }}" class="font-700 text-[19px] leaidng-[18px] text-black block my-4">{{ $post->post_name }} </a>
                </div>
                @endif
            @endforeach
        </div>
        <div class="mt-10 md:mt-20">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection