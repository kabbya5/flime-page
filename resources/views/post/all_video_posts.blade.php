@extends('layouts.app')
@section('content')
<div class="hero">
    <div class="flex flex-col-reverse justify-center items-center md:flex-row md:justify-between items-center">
       <img class="w-full h-full" src="{{ asset('image/Slide.png')}}" alt="">
    </div>
</div>

<!-- চলচ্চিত্র -->

<div class="flim pt-10 px-4 lg:px-3 xl:px-0 md:pt-[190px] bg-white">
    <div class="container mx-auto pb-5 md:pb-[221px]">
        <div class="flex justify-between items-center">
            <h2 class="font-700 text-[45px] leading-[67px] text-[#5856D6]"> চলচ্চিত্র </h2>
            <a href="{{route('video.subsection.posts',$flims->slug)}}" class="px-6 py-2 font-700 text-[19px] leading-[30px] text-[#5856D6] bg-blue-10"> সব দেখুন </a>
        </div>
        <div class="mt-6 md:mt-[53px] film">
            <div class="owl-carousel owl-theme slider flim-slider w-full grid grid-cols-12 gap-4">
                @foreach ($flims->posts as $post)

                    @if ($post->file_url)
                    <div class="item">  
                        <div class="video">
                            <video width="500px" height="500px" controls="controls"/>
                            
                            <source src="{{ asset($post->file_url) }}" type="video/mp4"> 
                        </div>                             
                                       
                        <p class="font-700 text-[19px] leading-[28px] text-black block my-4">{{ $post->post_name }} </p>
                    </div>
                    @else
                    <div class="item">
                        <iframe width="560" height="315" src="{{ $post->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <p class="font-700 text-[19px] leading-[28px] text-black block my-4">{{ $post->post_name }} </p>
                    </div>
                    @endif
                    
                @endforeach   
            </div>
        </div>
    </div>
</div>

<!-- ডকুমেন্টারি -->

<div class="documentary pt-10 px-4 lg:px-3 xl:px-0 md:pt-[110px] bg-[#FAEFF7]">
    <div class="container mx-auto pb-5 md:pb-[110px]">
        <div class="flex justify-between items-center">
            <h2 class="font-700 text-[45px] leading-[67px] text-[#E728AC]"> ডকুমেন্টারি </h2>
            <a href="allFlim.html" class="px-6 py-2 font-700 text-[19px] leading-[30px] text-[#E728AC] bg-red-10"> সব দেখুন </a>
        </div>
        <div class="mt-6 md:mt-[51px] film">
            <div class="owl-carousel owl-theme slider flim-slider w-full grid grid-cols-12 gap-4">
                @foreach ($documentaries->posts as $post)

                    @if ($post->file_url)
                    <div class="item">  
                        <div class="video">
                            <video width="500px" height="500px" controls="controls"/>
                            
                            <source src="{{ asset($post->file_url) }}" type="video/mp4"> 
                        </div>                             
                                       
                        <p class="font-700 text-[19px] leading-[28px] text-black block my-4">{{ $post->post_name }} </p>
                    </div>
                    @else
                    <div class="item">
                        <iframe width="560" height="315" src="{{ $post->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <p class="font-700 text-[19px] leading-[28px] text-black block my-4">{{ $post->post_name }} </p>
                    </div>
                    @endif
                    
                @endforeach   
            </div>
        </div>
    </div>

</div>

<!-- শর্ট ফিল্ম -->

<div class="short-flim pt-10 px-4 lg:px-3 xl:px-0 md:pt-[110px] bg-white">
    <div class="container mx-auto pb-5 md:pb-[221px]">
        <div class="flex justify-between items-center">
            <h2 class="font-700 text-[45px] leading-[67px] text-[#007AFF]"> শর্ট ফিল্ম </h2>
            <a href="" class="px-6 py-2 font-700 text-[19px] leading-[30px] text-[#007AFF] bg-dark-blue-10"> সব দেখুন </a>
        </div>
        <div class="mt-6 md:mt-[51px] film">
            <div class="owl-carousel owl-theme slider flim-slider w-full grid grid-cols-12 gap-4">
                @foreach ($short_flims->posts as $post)

                    @if ($post->file_url)
                    <div class="item">  
                        <div class="video">
                            <video width="500px" height="500px" controls="controls"/>
                            
                            <source src="{{ asset($post->file_url) }}" type="video/mp4"> 
                        </div>                             
                                       
                        <p class="font-700 text-[19px] leading-[28px] text-black block my-4">{{ $post->post_name }} </p>
                    </div>
                    @else
                    <div class="item">
                        <iframe width="560" height="315" src="{{ $post->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <p class="font-700 text-[19px] leading-[28px] text-black block my-4">{{ $post->post_name }} </p>
                    </div>
                    @endif
                    
                @endforeach   
            </div>
        </div>
    </div>

</div>

<!-- নিউজ -->

<div class="news pt-10 px-4 lg:px-3 xl:px-0 md:pt-[110px] bg-[##EAEDEB]">
    <div class="container mx-auto pb-5 md:pb-[110px]">
        <div class="flex justify-between items-center">
            <h2 class="font-700 text-[45px] leading-[67px] text-[#05831B]"> নিউজ </h2>
            <a href="" class="py-2 px-6 font-700 text-[19px] leading-[30px] text-[#05831B] bg-green-10"> সব দেখুন </a>
        </div>
        <div class="mt-6 md:mt-[51px] film">
            <div class="owl-carousel owl-theme slider flim-slider w-full grid grid-cols-12 gap-4">
                @foreach ($news->posts as $post)

                    @if ($post->file_url)
                    <div class="item">  
                        <div class="video">
                            <video width="500px" height="500px" controls="controls"/>
                            
                            <source src="{{ asset($post->file_url) }}" type="video/mp4"> 
                        </div>                             
                                       
                        <p class="font-700 text-[19px] leading-[28px] text-black block my-4">{{ $post->post_name }} </p>
                    </div>
                    @else
                    <div class="item">
                        <iframe width="560" height="315" src="{{ $post->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <p class="font-700 text-[19px] leading-[28px] text-black block my-4">{{ $post->post_name }} </p>
                    </div>
                    @endif
                    
                @endforeach   
            </div>
        </div>
    </div>

</div>

@endsection