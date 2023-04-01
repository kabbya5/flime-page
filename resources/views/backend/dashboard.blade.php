@extends('backend.layout')

@section('content')
<div class="dashboard">
    <div class="">
        <div class="pt-[72px] pb-[49px]">
            <h2 class="font-700 text-[30px] text-black leading-[20px]"> ড্যাশবোর্ড </h2>
        
            <!-- data  -->
            <div class="mt-[103px]">
                <div class="header flex flex-wrap">
                    <a href="{{ route('admin.dashboard',auth()->user()->slug) }}" class="{{ (request()->segment(2) == 'dashboard') ? 'active' : '' }} py-3 px-4 text-[14px] text-[#6E6E75] bg-white font-[600] leading-[21px]"> সকল  </a>
                    <a href="{{ route('pictorial.bangladesh.file') }}" class="{{ (request()->is('admin/pictorial*')) ? 'active' : '' }} py-3 text-[14px] text-[#6E6E75] font-[600] leading-[21px]]"> সচিত্র বাংলাদেশ </a>
                    <a href="{{ route('menstrual.newborn.file') }}" class="{{ (request()->is('admin/menstrual*')) ? 'active' : '' }} py-3 text-[14px] text-[#6E6E75] font-[600] leading-[21px]]"> মাসিক নবারুণ  </a>
                    <a href="{{ route('bangladesh.quarterly.file') }}" class="{{ (request()->is('admin/bangladesh*')) ? 'active' : '' }} py-3  text-[14px] text-[#6E6E75] font-[600] leading-[21px]]"> বাংলাদেশ কোয়াটারলি  </a>
                    <a href="{{ route('media.file') }}" class="{{ (request()->is('admin/media*')) ? 'active' : '' }} py-3 text-[14px] text-[#6E6E75] font-[600] leading-[21px]]"> বিজ্ঞাপন ও নিরীক্ষা </a>
                </div>
                @if ($files->count() > 0)
                <div class="mt-[29px] data-table"> 
                    <div class="mt-7 overflow-x-auto">
                        <table class="whitespace-nowrap w-full">
                            <thead class="bg-pink-gradient ">
                                <tr>
                                    <th align="center" class="py-[18px]  font-700 text-white text-[13px] leading-[18px]"> নাম </th>
                                    <th align="left" class="py-[18px]  font-700 text-white text-[13px] leading-[18px]"> বিষয় </th>
                                    <th align="left" class="py-[18px]  font-700 text-white text-[13px] leading-[18px]"> সেকশন </th>
                                    <th align="left" class="py-[18px]  font-700 text-white text-[13px] leading-[18px]"> জমার তারিখ </th>
                                    <th align="center" class="py-[18px]  font-700 text-white text-[13px] leading-[18px]"> অবস্থা </th>
                                    <th align="center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                <tr tabindex="0" class="{{ $file->status }} focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                    <td class="">
                                        <div class="ml-5 flex items-center py-[24px]">
                                            <label class="input-checkbox" data-id="{{ $file->id }}">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            @if ($file->user->profile_image)
                                            <img class="mx-4 h-[40px] w-[40px] rounded-full" src="{{ asset($file->user->profile_image) }}" alt="{{ $file->user->slug }}">
                                            @else
                                            <img class="mx-4 h-[40px] w-[40px] rounded-full" src="{{ asset('media/icon/user.png') }}" alt="{{ $file->user->slug }}">
                                            @endif
                                           
                                            <p class="font-700  md:text-[12px] 2xl:text-[14px] leading-[21px] text-black">{{ str_limit($file->user->name,15,'...') }}</p>
                                        </div>
                                    </td>
                                    <td class="text-left pl-5">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]"> {{ $file->subject }} </p>
                                    </td>
                                    <td class="text-left pl-5"> 
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">  {{ $file->section }} </p>
                                    </td>
                                    <td class="text-left pl-5"> 
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]"> {{ $file->create_date }}</p>
                                    </td>
                                    <td class="text-center"> 
                                        <span class="{{ $file->status }} font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> {{ $file->status }} </span>
                                    </td>
                                    <td class="text-center pl-6">        
                                        <div id="doropdown-toggoler" class="pr-[22px] relative flex flex-col justify-center items-center">
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                            <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                                <button class="btn text-[#2518FF] capitalize btn-dropdown-toggoler relative">
                                                    <i class="fa-solid fa-pen mr-[10px]"></i> Edit
                                                    <div class="dropdown-items-btn absolute right-0 hidden">
                                                        <a href="{{ route('file.status.change',[$file->id,'none']) }}" class="btn text-[#565956]">
                                                            none
                                                        </a>
                                                        <a href="{{ route('file.status.change',[$file->id,'pending']) }}" class="btn text-[#5B62EB]">
                                                           pending
                                                        </a>
                                                        <a href="{{ route('file.status.change',[$file->id,'selected']) }}" class="btn text-orange-500">
                                                            Selected
                                                        </a>
                                                        <a href="{{ route('file.status.change',[$file->id,'accepted']) }}" class="btn text-[#00B035]">
                                                            Accepted
                                                        </a>
                                                        <a href="{{ route('file.status.change',[$file->id,'rejected']) }}" class="btn text-[#F71111]">
                                                            Rejected
                                                        </a>
                                                    </div>
                                                </button>
                                                <a href="{{ route('file.delete',$file->id) }}" class="btn text-red-800 flex">
                                                    <img src="image/icon.png" alt="" class="mr-[10px]"> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr> 
                                @endforeach
                                       
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-20">
                        {{ $files->links('pagination::tailwind') }}
                    </div>
                </div>
                @else
                   <div class="mt-10">
                        <p class="text-[#313131] text-xl font-[400] leading-7"> No Data Found </p>
                    </div> 
                @endif
                
            </div>
        </div>
    </div> 

    <!-- chek items details  -->
    <div class="mt-[47px] mx-auto md:px-[50px] bg-white">
        <div class="pt-[48px] pb-[150px]">
            <div id="result">

            </div>
                
        </div>
    </div> 
</div>
@endsection

@section('script')
<script>
    $(document).ready(function (){
        $('.input-checkbox').click(function(){
            $('tr').removeClass('selected-checkbox');
            if($('.input-checkbox input').is(':checked')){
                $(this).parents('tr').addClass('selected-checkbox');
            }else{
                $(this).parents('tr').removeClass('selected-checkbox');
            }
           
            let id = $(this).attr("data-id");

            $.ajax({
                type:'get',
                url:'/admin/file/detials/' + id,
                datatype:"html",

            })
            .done(function (response) {
                    if (response.length == 0) {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }

                    $('#result').empty();
                    
                    $("#result").append(response);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('Server error occured');
            });
        })
    })
</script>
@endsection