@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[20px] text-black leading-[40px]"> {{ $media_header->title }} </h2>
        <div class="flex">
            <button id="add_header_button" class="btn-gray mr-4">
                হেডার যোগ করুন
            </button>  
            <button id="add_post_button" class="btn-gradient">
                যোগ করুন
            </button>
        </div>
    </div>

    <div class="mt-[85px]">
        <p class="font-[600] text-[16px] leading-[30px] text-[#8d8989]">
            {{ $media_header->short_text }}

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
                        @foreach ($inputs as $item)
                            <tr tabindex="0" class="panding focus:outline-non rounded mt-[3px]">
                                <td>
                                    @if($item->input_type == 'parent')
                                    <div class="form-group mt-5 md:mt-[24px]">
                                        <label for="" class="">{{ $item->input_name }}</label>
                                    </div>
                                    @else
                                    <div class="form-group mt-5 md:mt-[24px]">
                                        <label for="" class="">{{ $item->input_name }}</label>
                                        <label class="flex mt-3 md:w-[400px]" for="id-card">
                                            <span class="w-full ml-6 border-2 h-10"> </span>
                                            @if ($item->need_file == 'file')
                                            <span class="ml-2 py-2 px-6 bg-[#EBEBEB] text-[#C7C7CC]"> <i class="fa-solid fa-up-long"></i> </span>
                                            @endif
                                            
                                            <input type="file" id="id-card" class="hidden">
                                        </label>
                                    </div>
                                    @endif
                                    
                                    @foreach ($item->subMediaInput as $child_item)
                                    <div class="form-group mt-5 md:mt-[24px] ml-[20px]">
                                        <label for="" class="">{{ $child_item->input_name }}</label>
                                        <label class="flex mt-3 md:w-[380px]" for="id-card">
                                            <span class="w-full ml-6 border-2 h-10"> </span>
                                            @if ($child_item->need_file == 'file')
                                            <span class="ml-2 py-2 px-6 bg-[#EBEBEB] text-[#C7C7CC]"> <i class="fa-solid fa-up-long"></i> </span>
                                            @endif
                                            
                                            <input type="file" id="id-card" class="hidden">
                                        </label>
                                    </div>
                                    @endforeach
                                    
                                </td>
                                
                                <td class="text-left pr-10">
                                    <p class="font-[600] text-[14px] leading-[21px] text-black">{{ $item->input_position }} </p>
                                </td>
                                <td class="text-left">
                                    <p class="font-[600] text-[14px] leading-[21px] text-black capitalize">{{ $item->input_type}}</p>
                                </td>
                                <td class="text-right px-2">             
                                    <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                        <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                            <a href="{{ route('admin.media.inputs.edit',$item->slug) }}" class="btn text-[#2518FF] border-b flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/edit.png') }}" alt="" class="mr-[10px] h-[18px]"> edit
                                            </a>

                                            <form action="{{ route('admin.media.inputs.destroy',$item->slug) }}" method="POST">
                                                @csrf
                                                @method("DELETE")

                                                <button type="submit" onclick="return confirm('Locate the data you want to delete ?')" 
                                                    class="btn border-b text-[#565956] flex items-center capitalize font-[600] text-[18px] leading-7">
                                                    <img src="{{ asset('media/icon/delete.png') }}" alt="" class="mr-[10px] h-[18px]"> Delete
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </div>
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
        <form  action="{{ route('admin.media.inputs.store') }}" method="POST">
            @csrf   
            @include('backend.media_input._form',['button_text' => 'প্রকাশ করুন'])
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
                <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green capitalize"> create post </button>
            </div>
        </form>
    </div>
</div> 


@endsection
