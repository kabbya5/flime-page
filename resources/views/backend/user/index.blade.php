@extends('backend.layout')

@section('content')
<div class="user">
    <div class="">
        <div class="pt-[72px] pb-[49px]">
            <h2 class="font-700 text-[30px] text-black leading-[20px]"> সকল ইউজার </h2>
        
            <!-- data  -->
            <div class="mt-[60px]">
                <div class="mt-[29px] data-table"> 
                    <div class="mt-7 overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead class="bg-pink-gradient ">
                                <tr>
                                    <th align="center" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> নাম </th>
                                    <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> ইমেইল  </th>
                                    <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> মোবাইল নাম্বার   </th>
                                    <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> ইউসার টাইপ </th>
                                    <th align="center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                    <td>
                                        <div class="ml-5 flex items-center py-[24px]">
                                            @if ($user->profile_image)
                                                <img class="mx-4 h-[40px] w-[40px] rounded-full" src="{{ asset($user->profile_image) }}" alt="{{ $user->name }}">
                                            @else
                                                <img class="mx-4 h-[40px] w-[40px] rounded-full" src="{{ asset('media/icon/user.png') }}" alt="{{ $user->name }}">  
                                            @endif
                                            <p class="font-700 text-[14px] leading-[21px] text-black">{{ $user->name }}</p>
                                        </div>
                                    </td>
                                    <td class="text-left pr-10">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $user->email }} </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $user->phone }}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $user->user_type }}</p>
                                    </td>
                                    <td class="text-right px-2">             
                                        <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
    
                                            <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                                <a href="{{ route('admin.users.edit',[$user->slug,$user->id]) }}" class="btn text-[#2518FF] border-b flex items-center capitalize font-[600] text-[18px] leading-7">
                                                    <img src="{{ asset('media/icon/edit.png') }}" alt="" class="mr-[10px] h-[18px]"> edit
                                                </a>
    
                                                <form action="{{ route('user.delete',[$user->slug,$user->id]) }}" method="POST">
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

                <div class="mt-10">
                    {{ $users->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div> 

</div>

@endsection