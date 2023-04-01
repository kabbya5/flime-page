@extends('layouts.app')

@section('style')
.header-home{
    height: 600px ;
}
@endsection

@section('hero_section')
<div class="hero w-full h-full">
    <div class="flex flex-col justify-center items-center h-full md:h-44  md:pt-[190px]">
        <h2 class="text-white text-[38px] md:text-[60px] font-[700] leading-[90px] h-f"> {{ $clearence->title }} </h2>
        <p class="text-[18px] mt-[17px] text-white font-[500] leading-[30px] text-center md:w-[750px] px-3 md:px-0"> 
            {{ $clearence->short_text }}
        </p>
    </div>
</div>
@endsection

@section('content')
<div class="container mx-auto my-10 md:mt-[104px]">
    <div class="w-full mx-2 md:w-[676px] md:mx-auto">
        <h2 class="font-700 text-[20px] md:text-[48px] leading-67 text-center text-black"> বিবলিওগ্রাফি </h2>
    </div>
<div>

<div class="container">
    <div class="pdf mt-10 md:mt-[110px] md:mb-[204px] px-2 md:px-8 xl:px-0">
        <div class="biliographi-table relative overflow-x-auto sm:rounded-lg mt-[41px]">
            <table class="w-fit text-sm text-left text-gray-500 mx-auto">
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
                        <th scope="col" class="text-left">
                            পুস্তকের ধরণ 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bibliograpy_posts as $key => $post)
                    <tr class="">
                        <th  class="pr-2 py-4 font-medium text-gray-900 whitespace-nowra" style="vertical-align:top;">
                            {{ $key + 1 }}
                        </th>
                        <td class="pr-2 py-4" style="vertical-align:top;" style="vertical-align:top;">
                           <p class="w-[120px]">  {{ $post->বইয়ের_নাম }} </p>
                        </td>
                        <td scope="row" class="pr-2 py-4" style="vertical-align:top;" style="vertical-align:top;">
                            <p class="w-[130px]">
                                {{ $post->লেখকের_নাম}}
                            </p> 
                        </td>
                        <td class="pl-4 pr-2 py-4" style="vertical-align:top;">
                            <p class="w-[230px]">
                                {{ $post->প্রকাশকের_নাম_ও_ঠিকানা }}
                            </p>        
                        </td>
                        
                        <td class="pr-2 py-4" style="vertical-align:top;">
                            <p class="w-[120px]"> {{ $post->প্রথম_প্রকাশ }}</p>
                        </td>

                        <td class="pr-2 py-4" style="vertical-align:top;">
                            <p class="w-[140px]">  {{ $post->জমাদানের_তারিখ }} </p>
                        </td>
                        <td class="py-4 text-left" style="vertical-align:top;">
                            <p class="w-[105px] xl:w-[110px]">  {{ $post->পুস্তকের_ধরণ }}</p>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
       <div class="mt-10">
            {!! $bibliograpy_posts->links('pagination::tailwind') !!}
       </div>
    </div>
</div>
@endsection