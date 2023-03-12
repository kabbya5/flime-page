@extends('layouts.app')
@section('content')
<!-- hero  -->
<div class="hero">
    <div class="flex flex-col-reverse justify-center  md:flex-row md:justify-between items-center">
       <img class="w-full h-full" src="{{ asset('image/Banner.png') }}" alt="">
    </div>

    <!-- book-details  -->
    <div class="post container mx-auto my-10 md:my-[182px]">
        <div class="flex flex-col md:flex-row justify-center items-center md:items-start">
            <div class="post-item">
                <div class="w-[363px] h-[503px]">
                    <img class="w-full h-full" src="{{ asset($post->thumbnail) }}" alt="">
                </div> 
                <a  href="{{ route('download.book', $post->slug) }}" class="mt-[17px] py-2 text-white text-[18px] font-700 flex items-center justify-center btn-gradient-pink">
                    <img src="{{ asset('media/icon/pdf.png') }}" alt="icon" class="mr-[23px] h-8"> ডাউনলোড
                </a>                  
               
            </div>
            <div class="post-details max-w-[640px] mt-6 md:mt-2 px-[19px]">
                <h2 class="text-black font-700 text-[32px] leading-[54px]"> {{ $post->post_name }} - {{ $post->post_date }}</h2>
                <p class="font-[500] text-[#8E8E93] text-[16px] leading-[24px] mt-[10px] mb-[22px]">
                   {{ $post->post_desciption }}
                </p>
                <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                    প্রধান সম্পাদকঃ
                   <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                    {{ $post->chief_editor }}
                    </span>
                </p>
                <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                    সিনিয়র সম্পাদকঃ
                   <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                    {{ $post->senior_editor }}
                    </span>
                </p>
                <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                    সম্পাদকঃ
                   <span class="font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                    {{ $post->editor }}
                    </span>
                </p>

                <p class="font-[700] text-black text-[16px] leading-[24px] mt-[10px] mb-[7px]">
                    সম্পাদকীয় সহযোগীঃ
                </p>

                @foreach ($post->editorial_name as $name)
                    <span class="mb-[7px] block font-[500] text-[#8E8E93] text-[16px] leading-[24px]">
                        {{ $name }}
                    </span>
                @endforeach
                
            </div>
        </div>
    </div>
</div>



@endsection