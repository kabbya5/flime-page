@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> বিবলিওগ্রাফি </h2>
        <a href="{{ route('admin.bibliograpy.create') }}" class="btn-gradient-pink">
            যোগ করুন
        </a>
    </div>
   

    <!-- data  -->
    <div class="mt-[60px]">
        <div class="mt-[29px] data-table"> 
            <div class="biliographi-table relative overflow-x-auto sm:rounded-lg mt-[41px]">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase">
                        <tr>
                            <th scope="col" class="pr-2">
                                ক্র.নং
                            </th>
                            <th scope="col" class="pr-2">
                                বইয়ের নাম
                            </th>
                            <th scope="col" class="pr-2">
                                লেখকের নাম
                            </th>
                            <th scope="col" class="pl-4 pr-2">
                                প্রকাশকের নাম ও ঠিকানা
                            </th>
                            <th scope="col" class="pr-2">
                                প্রথম প্রকাশ
                            </th>
                            <th scope="col" class="pr-2">
                                জমাদানের তারিখ
                            </th>
                            <th scope="col" class="text-left m-0">
                                পুস্তকের ধরণ 
                            </th>
                            <th align="left" class="py-[18px] pl-2 font-700 text-white text-[13px] leading-[18px]">  </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bibliograpies as $key => $bibliograpy)
                            <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                <td class="text-left pl-2">
                                    <p class="font-[600] text-[18px] leading-[21px] text-[#8E8E93]">{{ $key+1}} </p>
                                </td>
                                <td class="text-left pl-2">
                                    <div class="flex items-center py-[24px]">
                                        <p class="font-700 text-[14px] leading-[21px] text-[#8E8E93]"> {{$bibliograpy->বইয়ের_নাম}}</p>
                                    </div>
                                </td>
                                
                                <td class="text-left pl-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $bibliograpy->লেখকের_নাম}} </p>
                                </td>

                                <td class="text-left pl-2">
                                    <div class="flex items-center py-[24px] w-[240px] h-[20]">
                                         {{ $bibliograpy->প্রকাশকের_নাম_ও_ঠিকানা}}
                                    </div> 
                                </td>

                                <td class="text-left pl-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $bibliograpy->প্রথম_প্রকাশ}} </p>
                                </td>

                                <td class="text-left pl-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $bibliograpy->জমাদানের_তারিখ}} </p>
                                </td>

                                <td class="text-left pl-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $bibliograpy->পুস্তকের_ধরণ}} </p>
                                </td>
                                <td class="text-right px-2">             
                                    <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                        <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                            <a href="{{ route('admin.bibliograpy.edit',$bibliograpy->id) }}" class="btn text-[#2518FF] border-b flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/edit.png') }}" alt="" class="mr-[10px] h-[18px]"> edit
                                            </a>

                                            <form action="{{ route('admin.bibliograpy.destroy',$bibliograpy->id) }}" method="POST">
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
            <div class="mt-10">
                {!! $bibliograpies->links('pagination::tailwind')!!}
            </div>
        </div>
    </div>
</div>

@endsection