@extends('layouts.app')
@section('content')
<div class="hero">
    <div class="flex flex-col-reverse justify-center items-center md:flex-row md:justify-between items-center">
       <img class="w-full h-full" src="{{ asset('image/Slide.png')}}" alt="">
    </div>
</div>


<div class="all-posts bg-[#F2F2F2] py-5 md:py-[196px]">
    <div class="container mx-auto px-3 md:px-4 xl:px-0">
        <h2 class="font-700 text-[45px] leading-67 text-[#E728AC]"> ডকুমেন্টারি </h2>
        <div class="grid grid-cols-12 gap-4">
            <div class="item col-span-6 md:col-span-4 p-2 mt-[35px]">
                <iframe class="rounded-md" width="560" height="315" src="https://www.youtube.com/embed/GTe7TEppmg0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <a href="postDetails.html" class="font-700 text-[19px] leaidng-[18px] text-black block my-4">বজ্রপাতের ভয় আর নয় </a>
            </div>
            <div class="item col-span-6 md:col-span-4 p-2 mt-[35px]"> 
                <div class="video">
                    <video class="rounded-md"  width="500px" height="500px" controls="controls"/>
                    
                    <source class="rounded-md" src="video/রুপালি পর্দায় সোনালি দিনের সুলতানা জামান  ২.mp4" type="video/mp4"> 
                </div>                             
                                
                <a href="postDetails.html" class="font-700 text-[19px] leaidng-[18px] text-black block my-4">বজ্রপাতের ভয় আর নয় </a>
            </div>
            <div class="item col-span-6 md:col-span-4 p-2 mt-[35px]">
                
                    <iframe class="rounded-md" width="560" height="315" src="https://www.youtube.com/embed/ajZnbopyiVc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <p class="font-700 text-[19px] leaidng-[18px] text-black block my-4">বজ্রপাতের ভয় আর নয় </p>
            </div>
            <div class="item col-span-6 md:col-span-4 p-2 mt-[35px]">
                
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/GTe7TEppmg0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <p class="font-700 text-[19px] leaidng-[18px] text-black block my-4">বজ্রপাতের ভয় আর নয় </p>

            </div>
            <div class="item col-span-6 md:col-span-4 p-2 mt-[35px]">
                
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/BIw2ZshGN20" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    <p class="font-700 text-[19px] leaidng-[18px] text-black block my-4">বজ্রপাতের ভয় আর নয় </p>

            </div>
            <div class="item col-span-6 md:col-span-4 p-2 mt-[35px]">                    
                <iframe width="560" height="315" src="https://www.youtube.com/embed/mJBVSgTErvk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <p class="font-700 text-[19px] leaidng-[18px] text-black block my-4">বজ্রপাতের ভয় আর নয় </p>

            </div>
        </div>
    </div>
</div>
@endsection