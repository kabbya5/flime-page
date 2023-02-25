@extends('backend.layout')

@section('content')
<div class="mx-4 dashboard">
    <div class="container mx-auto md:px-[50px] bg-white">
        <div class="pt-[72px] pb-[49px]">
            <h2 class="font-700 text-[30px] text-black leading-[20px]"> ড্যাশবোর্ড </h2>
        
            <!-- data  -->
            <div class="mt-[103px]">
                <div class="header bg-[#EFEFF4] inline flex-wrap">
                    <a href="" class="py-2 px-4 text-[14px] text-black bg-white font-[600] leading-[21px]]"> সচিত্র বাংলাদেশ  <span class="px-4 hidden"> | </span></a>
                    <a href="" class="py-2 pl-[22px] text-[14px] text-[#6E6E75] font-[600] leading-[21px]]"> সচিত্র বাংলাদেশ  <span class="pl-[22px]"> | </span></a>
                    <a href="" class="py-2 pl-[22px] text-[14px] text-[#6E6E75] font-[600] leading-[21px]]"> সচিত্র বাংলাদেশ  <span class="pl-[22px]"> | </span></a>
                    <a href="" class="py-2 pl-[22px] text-[14px] text-[#6E6E75] font-[600] leading-[21px]]"> সচিত্র বাংলাদেশ  <span class="pl-[22px]"> | </span></a>
                    <a href="" class="py-2 pl-[22px] text-[14px] text-[#6E6E75] font-[600] leading-[21px]]"> সচিত্র বাংলাদেশ  <span class="pl-[22px]"> | </span></a>
                </div>
                <div class="mt-[29px] data-table"> 
                    <div class="mt-7 overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead class="bg-pink-gradient ">
                                <tr>
                                    <th align="center" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> নাম </th>
                                    <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> বিষয় </th>
                                    <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> সেকশন </th>
                                    <th align="left" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> জমার তারিখ </th>
                                    <th align="center" class="py-[18px] font-700 text-white text-[13px] leading-[18px]"> অবস্থা </th>
                                    <th align="center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                    <td>
                                        <div class="ml-5 flex items-center py-[24px]">
                                            <label class="input-checkbox">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                            </label>
                                            <img class="mx-4 h-[40px] w-[40px] rounded-full" src="image/user.jpg" alt="">
                                            <p class="font-700 text-[14px] leading-[21px] text-black">হাছান জামিল</p>
                                        </div>
                                    </td>
                                    <td class="text-left pr-10">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">পদ্মা সেতু </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">সচিত্র বাংলাদেশ</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">১০-০২-২০২২</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="panding font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> panding </span>
                                    </td>
                                    <td class="text-right">             
                                        <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                            <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                                <button class="btn text-[#2518FF] capitalize btn-dropdown-toggoler relative">
                                                    <i class="fa-solid fa-pen mr-[10px]"></i> Edit
                                                    <div class="dropdown-items-btn absolute right-0 hidden">
                                                        <a class="btn text-[#565956]">
                                                            none
                                                        </a>
                                                        <a class="btn text-[#5B62EB]">
                                                           pending
                                                        </a>
                                                        <a class="btn text-[#00B035]">
                                                            Selected
                                                        </a>
                                                        <a class="btn text-[#F71111]">
                                                            Rejected
                                                        </a>
                                                    </div>
                                                </button>
                                                <a class="btn text-[#565956] text-red-800 flex">
                                                    <img src="image/icon.png" alt="" class="mr-[10px]"> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                    <td>
                                        <div class="ml-5 flex items-center py-[24px]">
                                            <label class="input-checkbox">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                              </label>
                                            <img class="mx-4 h-[40px] w-[40px] rounded-full" src="image/user.jpg" alt="">
                                            <p class="font-700 text-[14px] leading-[21px] text-black">হাছান জামিল</p>
                                        </div>
                                    </td>
                                    <td class="text-left pr-10">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">পদ্মা সেতু </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">সচিত্র বাংলাদেশ</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">১০-০২-২০২২</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="panding font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> panding </span>
                                    </td>
                                    <td class="text-right">             
                                        <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                            <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                                <button class="btn text-[#2518FF] capitalize btn-dropdown-toggoler relative">
                                                    <i class="fa-solid fa-pen mr-[10px]"></i> Edit
                                                    <div class="dropdown-items-btn absolute right-0 hidden">
                                                        <a class="btn text-[#565956]">
                                                            none
                                                        </a>
                                                        <a class="btn text-[#5B62EB]">
                                                           pending
                                                        </a>
                                                        <a class="btn text-[#00B035]">
                                                            Selected
                                                        </a>
                                                        <a class="btn text-[#F71111]">
                                                            Rejected
                                                        </a>
                                                    </div>
                                                </button>
                                                <a class="btn text-[#565956] text-red-800">
                                                    <i class="fa-solid fa-trash mr-[10px]"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                    <td>
                                        <div class="ml-5 flex items-center py-[24px]">
                                            <label class="input-checkbox">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                              </label>
                                            <img class="mx-4 h-[40px] w-[40px] rounded-full" src="image/user.jpg" alt="">
                                            <p class="font-700 text-[14px] leading-[21px] text-black">হাছান জামিল</p>
                                        </div>
                                    </td>
                                    <td class="text-left pr-10">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">পদ্মা সেতু </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">সচিত্র বাংলাদেশ</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">১০-০২-২০২২</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="panding font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> panding </span>
                                    </td>
                                    <td class="text-right">             
                                        <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                            <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                                <button class="btn text-[#2518FF] capitalize btn-dropdown-toggoler relative">
                                                    <i class="fa-solid fa-pen mr-[10px]"></i> Edit
                                                    <div class="dropdown-items-btn absolute right-0 hidden">
                                                        <a class="btn text-[#565956]">
                                                            none
                                                        </a>
                                                        <a class="btn text-[#5B62EB]">
                                                           pending
                                                        </a>
                                                        <a class="btn text-[#00B035]">
                                                            Selected
                                                        </a>
                                                        <a class="btn text-[#F71111]">
                                                            Rejected
                                                        </a>
                                                    </div>
                                                </button>
                                                <a class="btn text-[#565956] text-red-800">
                                                    <i class="fa-solid fa-trash mr-[10px]"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr tabindex="0" class="selected focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                    <td>
                                        <div class="ml-5 flex items-center py-[24px]">
                                            <label class="input-checkbox">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                              </label>
                                            <img class="mx-4 h-[40px] w-[40px] rounded-full" src="image/user.jpg" alt="">
                                            <p class="font-700 text-[14px] leading-[21px] text-black">হাছান জামিল</p>
                                        </div>
                                    </td>
                                    <td class="text-left pr-10">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">পদ্মা সেতু </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">সচিত্র বাংলাদেশ</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">১০-০২-২০২২</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="selected font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> selected </span>
                                    </td>
                                    <td class="text-right">             
                                        <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                            <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                                <button class="btn text-[#2518FF] capitalize btn-dropdown-toggoler relative">
                                                    <i class="fa-solid fa-pen mr-[10px]"></i> Edit
                                                    <div class="dropdown-items-btn absolute right-0 hidden">
                                                        <a class="btn text-[#565956]">
                                                            none
                                                        </a>
                                                        <a class="btn text-[#5B62EB]">
                                                           pending
                                                        </a>
                                                        <a class="btn text-[#00B035]">
                                                            Selected
                                                        </a>
                                                        <a class="btn text-[#F71111]">
                                                            Rejected
                                                        </a>
                                                    </div>
                                                </button>
                                                <a class="btn text-[#565956] text-red-800">
                                                    <i class="fa-solid fa-trash mr-[10px]"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr tabindex="0" class="rejected focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                    <td>
                                        <div class="ml-5 flex items-center py-[24px]">
                                            <label class="input-checkbox">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                              </label>
                                            <img class="mx-4 h-[40px] w-[40px] rounded-full" src="image/user.jpg" alt="">
                                            <p class="font-700 text-[14px] leading-[21px] text-black">হাছান জামিল</p>
                                        </div>
                                    </td>
                                    <td class="text-left pr-10">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">পদ্মা সেতু </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">সচিত্র বাংলাদেশ</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">১০-০২-২০২২</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="rejected font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> rejected </span>
                                    </td>
                                    <td class="text-right">             
                                        <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                            <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                                <button class="btn text-[#2518FF] capitalize btn-dropdown-toggoler relative">
                                                    <i class="fa-solid fa-pen mr-[10px]"></i> Edit
                                                    <div class="dropdown-items-btn absolute right-0 hidden">
                                                        <a class="btn text-[#565956]">
                                                            none
                                                        </a>
                                                        <a class="btn text-[#5B62EB]">
                                                           pending
                                                        </a>
                                                        <a class="btn text-[#00B035]">
                                                            Selected
                                                        </a>
                                                        <a class="btn text-[#F71111]">
                                                            Rejected
                                                        </a>
                                                    </div>
                                                </button>
                                                <a class="btn text-[#565956] text-red-800">
                                                    <i class="fa-solid fa-trash mr-[10px]"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr tabindex="0" class="none focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                    <td>
                                        <div class="ml-5 flex items-center py-[24px]">
                                            <label class="input-checkbox">
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                              </label>
                                            <img class="mx-4 h-[40px] w-[40px] rounded-full" src="image/user.jpg" alt="">
                                            <p class="font-700 text-[14px] leading-[21px] text-black">হাছান জামিল</p>
                                        </div>
                                    </td>
                                    <td class="text-left pr-10">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">পদ্মা সেতু </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">সচিত্র বাংলাদেশ</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">১০-০২-২০২২</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="none font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> none </span>
                                    </td>
                                    <td class="text-right">             
                                        <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                            <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                            <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                                <button class="btn text-[#2518FF] capitalize btn-dropdown-toggoler relative">
                                                    <i class="fa-solid fa-pen mr-[10px]"></i> Edit
                                                    <div class="dropdown-items-btn absolute right-0 hidden">
                                                        <a class="btn text-[#565956]">
                                                            none
                                                        </a>
                                                        <a class="btn text-[#5B62EB]">
                                                           pending
                                                        </a>
                                                        <a class="btn text-[#00B035]">
                                                            Selected
                                                        </a>
                                                        <a class="btn text-[#F71111]">
                                                            Rejected
                                                        </a>
                                                    </div>
                                                </button>
                                                <a class="btn text-[#565956] text-red-800">
                                                    <i class="fa-solid fa-trash mr-[10px]"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- chek items details  -->
    <div class="container mt-[47px] mx-auto md:px-[50px] bg-white">
        <div class="pt-[48px] pb-[150px]">
            <div class="">
                <div class="ml-5 flex flex-wrap justify-center md:justify-between items-center py-[24px]">
                    <div class="flex items-center">
                        <img class="mx-4 h-[40px] w-[40px] rounded-full" src="image/user.jpg" alt="">
                        <p class="font-700 text-[22px] leading-[21px] text-black">হাছান জামিল</p>
                    </div>
                    
                    <div class="flex">
                        <span class="font-700 text-[22px] text-[#8E8E93] leading-[33px]"> নিবন্ধন  > </span> 
                        <span class="font-700 text-[22px] text-black ml-4 leading-[33px]"> পত্রিকা নামের ছাড়পত্র</span>
                    </div>
                    <a href="login.html" id="border-and-radius-white-bg"  
                    class="block flex items-center font-700 text-[14px] leading-[21px]] text-black"> 
                       <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt=""> সব ডাউনলোড
                    </a>
                </div>
                <div class="mt-[29px] data-table">
                    <!-- all file   -->
                    <div class="mt-7 overflow-x-auto">
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]"> ১। শিক্ষাসনদ (সবগুলো) </p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]"> ২। ব্যাংক আর্থিক স্বচ্ছলতা সনদপত্র</p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]"> ৩। ব্যাংকের ৬ মাসের এস্টেটমেন্ট </p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]"> ৪। আয়কর প্রত্যয়নপত্র </p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]"> ৫। নাগরিক সনদপত্র (কমিশনার বা সিটি কর্পোরেশন) </p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]">৬। ন্যাশনাল আইডি কার্ড (সত্যায়িত কপি) </p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]">৭। সাংবাদিকতার অভিজ্ঞতার সনদপত্র </p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]">৮। প্রেসের সাথে চুক্তিপত্র </p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]">৯। ছাপাখানার ঘোষণাপত্রের সত্যায়িত কপি </p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]">১০। লোকাল এমপি’র প্রত্যয়নপত্র যদি থাকে</p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                        <div class="flex items-center justify-between border-33">
                            <p class="font-[600] text-[18px] leading-[27px]">১১। বাড়ী ভাড়া চুক্তিপত্র</p>
                            <img class="mr-[15px] w-[20px] h-[20px]" src="image/download_icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection