@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> মোট নিবন্ধিত পত্রিকা</h2>
        <a href="{{ route('admin.media.registereds.create') }}" class="btn-gradient-pink">
            যোগ করুন
        </a>
    </div>
   

    <!-- data  -->
    <div class="mt-[60px]">
        <div class="mt-[29px] data-table"> 
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gradient-red">
                        <tr>
                            <th align="left" class="py-[18px] px-5 font-700 text-white text-[13px] leading-[18px]"> নাম </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> প্রকাশের তারিখ </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]">  </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registereds as $registered)
                            <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                <td>
                                    <div class="flex items-center py-[24px]">
                                        <img class="mx-4 h-[40px] w-[40px]" src="{{ asset('media/icon/pdf-icon.png') }}" alt="">
                                        <p class="font-700 text-[14px] leading-[21px] text-black"> {{$registered->registered_name}}</p>
                                    </div>
                                </td>
                                
                                <td class="text-left pr-10">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $registered->published_date }} </p>
                                </td>

                                <td class="text-right px-2">             
                                    <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                        <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                            <a href="{{ route('admin.media.registereds.edit',$registered->slug) }}" class="btn text-[#2518FF] border-b flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/edit.png') }}" alt="" class="mr-[10px] h-[18px]"> edit
                                            </a>
                                            <a href="{{ route('admin.media.registereds.duplicate',$registered->slug) }}" class="btn text-[#565956] border-b flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/duplicate.png') }}" alt="" class="mr-[10px] h-[18px]"> duplicate
                                            </a>

                                            <form action="{{ route('admin.media.registereds.destroy',$registered->slug) }}" method="POST">
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

@endsection