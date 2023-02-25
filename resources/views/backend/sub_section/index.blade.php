@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> সেকশন </h2>
        <a href="{{ route('admin.subsections.create') }}" class="btn-gradient-green">
            যোগ করুন
        </a>
    </div>
   

    <!-- data  -->
    <div class="mt-[60px]">
        <div class="mt-[29px] data-table"> 
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gradient-green">
                        <tr>
                            <th align="left" class="py-[18px] px-5 font-700 text-white text-[13px] leading-[18px]"> সাব সেকশন </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> সেকশন স্লাগ </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]">সেকশন </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> প্রকাশের তারিখ  </th>
                            <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> অ্যাকশন </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subsections as $section)
                            <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                <td>
                                    <div class="mx-5 flex text-center  py-[24px]">
                                        <p class="font-700 text-[14px] leading-[21px] text-black">{{$section->subsection_name }}</p>
                                    </div>
                                </td>
                                
                                <td class="text-left pr-10">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $section->slug }} </p>
                                </td>
                                <td class="text-left">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $section->section->section_name }}</p>
                                </td>
                                <td class="text-left">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $section->created_date }}</p>
                                </td>
                                
                                <td class="text-right">             
                                    <div class="flex">
                                        <a href="{{ route('admin.subsections.edit',$section->slug) }}" class="ml-4">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
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