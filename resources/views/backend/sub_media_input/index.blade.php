@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> সাব আবেদন  </h2>
        <div class="flex">
            <button id="add_post_button" class="btn-gradient">
                যোগ করুন
            </button>
        </div>
    </div>
   
    <!-- data  -->
    <div class="mt-[60px]">
        <div class="mt-[29px] data-table"> 
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gradient-red">
                        <tr>
                            <th align="left" class="py-[18px] px-5 font-700 text-white text-[13px] leading-[18px]"> ইনপুট নাম </th>
                            <th align="left" class="py-[18px] px-5 font-700 text-white text-[13px] leading-[18px]"> আবেদন নাম </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> ইনপুট নাম পসিশন </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> ইনপুট টাইপ </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]">  </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subinputs as $item)
                            <tr tabindex="0" class="panding focus:outline-non rounded mt-[3px]">
                                <td>
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
                                </td>
                                <td class="text-left pr-10">
                                    <p class="font-[600] text-[14px] leading-[21px] text-black">{{ str_limit($item->mediaInput->input_name,20) }} </p>
                                </td>
                                
                                <td class="text-left pr-10">
                                    <p class="font-[600] text-[14px] leading-[21px] text-black">{{ $item->input_position }} </p>
                                </td>
                                <td class="text-left">
                                    <p class="font-[600] text-[14px] leading-[21px] text-black capitalize">{{ $item->need_file }}</p>
                                </td>
                                <td class="text-right px-2">             
                                    <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                        <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                            <a href="{{ route('admin.submedia.inputs.edit',$item->id) }}" class="btn text-[#2518FF] border-b flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/edit.png') }}" alt="" class="mr-[10px] h-[18px]"> edit
                                            </a>

                                            <form action="{{ route('admin.submedia.inputs.destroy',$item->id) }}" method="POST">
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
        <form  action="{{ route('admin.submedia.inputs.store') }}" method="POST">
            @csrf   
            @include('backend.sub_media_input._form',['button_text' => 'প্রকাশ করুন'])
        </form>
    </div>
</div> 


@endsection
