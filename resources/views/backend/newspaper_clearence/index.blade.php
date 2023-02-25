@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> {{ $clearences_header->title }} </h2>
        <div class="flex">
            <button id="add_header_button" class="btn-gradient-pink mr-4">
                হেডার যোগ করুন
            </button>  
            <button id="add_post_button" class="btn-gradient">
                যোগ করুন
            </button>
        </div>
    </div>

    <div class="mt-[85px]">
        <p class="font-[600] text-[18px] leading-[30px] text-[#8d8989]">
            {{ $clearences_header->short_text }}

        </p>
    </div>
   
    <!-- data  -->
    <div class="mt-[60px]">
        <div class="mt-[29px] data-table"> 
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gradient-red">
                        <tr>
                            <th align="left" class="py-[18px] px-5 font-700 text-white text-[13px] leading-[18px]"> ইনপুট নাম </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> ইনপুট নাম পসিশন </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> ইনপুট টাইপ </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]">  </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newspaper_clearences as $clearence)
                            <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                <td>
                                    <div class="mx-5 flex text-center  py-[24px]">
                                        <p class="font-700 text-[14px] leading-[21px] text-black">{{$clearence->input_name }}</p>
                                    </div>
                                </td>
                                
                                <td class="text-left pr-10">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $clearence->input_position }} </p>
                                </td>
                                <td class="text-left">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $clearence->need_file }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- form Modal --}}

<div class="fixed hidden fixed-content form w-full bg-gray-800/80 z-50">
    <div class="bg-white border w-[500px] mx-auto p-[47px] relative">
        <button id="cancle-post-create-btn" class="absolute -top-4 -right-3 w-10 h-10 rounded-full bg-white
                    trasition duration-300 hover:text-white hover:bg-black shadow-md">
            X
        </button>
        <form id="fileUploadForm" action="{{ route('admin.clearence.inputs.store') }}" method="POST">
            @csrf   
            <div class="form-group flex flex-col w-full">
                <label for="input_name">  নাম  </label>
                <input id="input_name" type="text" class="outline-none mt-3 @error('input_name') error @enderror" placeholder="নাম"
                value="{{ old('input_name',$newspaper_clearenc->input_name) }}" name="input_name">
                @error('input_name')
                    <p class="text-red-500">{{$message }}</p>
                @enderror
            </div>

            <div class="form-group flex flex-col w-full mt-6">
                <label for="input_position"> নাম  পসিশন </label>
                <input id="input_position" type="text" class="outline-none mt-3 @error('input_position') error @enderror"  placeholder="1,2,3,4....." 
                value="{{ old('input_position',$newspaper_clearenc->input_postion) }}" name="input_position">
                
                @error('input_position')
                    <p class="text-red-500">{{$message }}</p>
                @enderror
            </div>

            <div class="form-group flex flex-col w-full mt-6 selected">
                <label for="need_file" class="flex input-checkbox items-center text-[9px] font-[600px] leading-[21px]"> 
                    <input type="checkbox" value="file" id="need_file" name="need_file"
                    {{ $newspaper_clearenc->need_file == 'file'  ? 'selected' : ' ' }}> 
                    <span class="checkmark mt-2"></span> 
                    <span class="text-[14px] -ml-2"> আপলোড বাটন </span>    
                </label>  
            </div>
 
            <div class="errors">
                
            </div>

            <div class="w-full form-group flex mt-10">
                <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green capitalize"> create post </button>
            </div>
        </form>
    </div>
</div> 

{{-- header-input  --}}
<div class="fixed hidden fixed-content header-form w-full bg-gray-800/80 z-50">
    <div class="bg-white border w-[500px] mx-auto p-[47px] relative">
        <button id="cancle-header-create-btn" class="absolute -top-4 -right-3 w-10 h-10 rounded-full bg-white
                trasition duration-300 hover:text-white hover:bg-black shadow-md">
            X
        </button>
        <form id="fileUploadForm" action="{{ route('amdin.clearence.header.store') }}" method="POST">
            @csrf   
            <div class="form-group flex flex-col w-full">
                <label for="title"> টাইটেল </label>
                <input id="title" type="text" class="outline-none mt-3 @error('title') error @enderror" placeholder="নাম"
                value="{{ old('title',$clearences_header->title) }}" name="title">
                @error('title')
                    <p class="text-red-500">{{$message }}</p>
                @enderror
            </div>

            <div class="form-group flex flex-col mt-10">
                <label for="short_text">বর্ণনা</label>
            
                <textarea name="short_text" id="" cols="30" rows="7" class="mt-3 border-2 border-gray-200 focus:outline-none @error('short_text') error @enderror">
                    {{ old('short_text',$clearences_header->short_text) }}
                </textarea>
            
                @error('short_text')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div> 

            <div class="w-full form-group flex mt-10">
                <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green capitalize"> create post </button>
            </div>
        </form>
    </div>
</div> 


@endsection
