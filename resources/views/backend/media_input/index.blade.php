@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[20px] text-black leading-[40px]"> {{ $media_header->title }} </h2>
    </div>

    <div class="mt-[85px]">
        <p class="font-[600] text-[16px] leading-[30px] text-[#8d8989]">
            {{ $media_header->short_text }}

        </p>
</div>




{{-- header-input  --}}
<div class="header-form w-ful">
    <div class="bg-white border w-[500px]  p-[47px]">
        <form action="{{ route('amdin.media.header.store') }}" method="POST">
            @csrf   
            <div class="form-group flex flex-col w-full">
                <label for="title"> টাইটেল </label>
                <input id="title" type="text" class="outline-none mt-3 @error('title') error @enderror" placeholder="নাম"
                value="{{ old('title',$media_header->title) }}" name="title">
                @error('title')
                    <p class="text-red-500">{{$message }}</p>
                @enderror
            </div>

            <div class="form-group flex flex-col mt-10">
                <label for="short_text">বর্ণনা</label>
            
                <textarea name="short_text" id="" cols="30" rows="7" class="mt-3 border-2 border-gray-200 focus:outline-none @error('short_text') error @enderror">
                    {{ old('short_text',$media_header->short_text) }}
                </textarea>
            
                @error('short_text')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div> 

            <div class="w-full form-group flex mt-10">
                <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green capitalize"> create  </button>
            </div>
        </form>
    </div>
</div> 


@endsection
