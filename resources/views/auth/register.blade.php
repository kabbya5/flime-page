@extends('layouts.app')

@section('content')
<!-- Resister Account -->
<div class="container flex mx-auto md:px-5 mb-10 md:mb-[150px] md:pr-4">
    <!-- image  -->
    <div class="w-[487px] h-[920px] hidden md:block text-right">
        <img class="w-[487px] h-full block" src="image/Photo (4).png" alt="">
    </div>

    <form  method="POST" action="{{ route('register') }}"
         class="p-10 md:pl-20 md:w-[655px] bg-white">
        @csrf

        <h2 class="text-black font-700 leading-36 text-24"> আইডি খুলুন </h2>
        <div class="w-full form-group flex flex-col mt-10">
            <label for=""> নাম </label>
            <input type="text" class="w-full outline-none mt-3 @error('name') border-red-500 @enderror" placeholder="আব্দুর রহিম"
            name="name" value="{{ old('name') }}">

            @error('name')
                    <p class="mt-2 text-red-500 ">{{ $message }}</p>    
            @enderror
        </div>
        
        <div class="form-group flex flex-col mt-10">
            <label for=""> ইমেইল </label>
            <input type="text" class="outline-none mt-3 @error('email') border-red-500 @enderror" placeholder="abdurahim_demo@gmail.com"
            name="email" value="{{ old('email') }}">

            @error('email')
                    <p class="mt-2 text-red-500">{{ $message }}</p>    
            @enderror
        </div>
        <div class="form-group flex flex-col mt-10">
            <label for="phone"> মোবাইল নাম্বার </label>
            <input type="text" class="outline-none mt-3 @error('phone') border-red-500 @enderror" placeholder="০১২ ১২৩৪ ৫৬৭৮"
            name="phone" value="{{ old('phone') }}">

            @error('phone')
                    <p class="mt-2 text-red-500">{{ $message }}</p>    
            @enderror
        </div>
        <div class="form-group flex flex-col mt-10">
            <label for=""> পাসওয়ার্ড </label>
            <input type="password" class="outline-none mt-3 @error('password') border-red-500 @enderror" placeholder="পাসওয়ার্ড" 
            name="password" value="{{ old('password') }}">

            @error('password')
                    <p class="mt-2 text-red-500">{{ $message }}</p>    
            @enderror
        </div>
        <div class="form-group flex flex-col mt-10">
            <label for=""> পুনরায় পাসওয়ার্ড </label>
            <input type="password" class="outline-none mt-3" placeholder="পাসওয়ার্ড" name="password_confirmation">  

        </div>
        <div class="form-group flex flex-col mt-10">
            <button class="  lg:py-3 text-center text-white btn-gradient-pink"> আইডি খুলন </button>  
            <a href="{{ route('login') }}" class="mt-4 text-[16px] font-[500] text-gray-500"> অলরেডি অ্যাকাউন্ট আছে? <span class="text-black ml-2"> লগইন করুন </span> </a>
        </div>
    </div>
</div>
@endsection
