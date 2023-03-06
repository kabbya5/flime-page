@extends('layouts.app')
@section('content')
<div class="hero">
    <div class="flex flex-col-reverse justify-center md:flex-row md:justify-between items-center">
       <img class="w-full h-full" src="{{ asset('image/Banner.png')}}" alt="">
    </div>
</div>

<div class="all-pdf mt-8 md:mt-[195px] pb-10 md:pb-[224px]">
    <div class="container mx-auto">
        <div class="ml-3 md:ml-4 lg:mx-2">
            <h2 class="font-700 text-[45px] leading-67 
                @if ($subsection->subsection_name == 'সচিত্র বাংলাদেশ')
                text-[#7028F7]
                @elseif ($subsection->subsection_name == 'মাসিক নবারুণ')
                text-[#008B18]
                @elseif ($subsection->subsection_name == 'বাংলাদেশ কোয়ার্টারলি')
                text-[#EC5B00]
                @else
                text-[#FF2D55]
                @endif ">
            {{ $subsection->subsection_name }} 
            </h2>
        
            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach ($posts as $post)
                <div class="mr-2 md:mr-4 lg:mr-[42px]">
                    <div class="book-div mt-4 md:mt-[65px]">
                        <a href="{{ route('book.post.details',$post->slug) }}">
                            <img class="w-full h-full"  src="{{ asset($post->thumbnail) }}" alt="{{ $post->post_name }}">
                        </a>
                        <a href="{{ route('book.post.details',$post->slug) }}" class="mt-[28px] block text-black text-center font-700 text-sm md:text-[20px] leading-[30px]"> {{ $post->post_date }} </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-20 mx-6">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>

</div>

@endsection