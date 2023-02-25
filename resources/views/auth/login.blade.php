@extends('layouts.app')

@section('content')
<div class="container flex mx-auto md:px-5 md:mb-[140px]">
    <!-- login form  -->
    <div class="w-full md:w-1/2 pb-6 md:pb-0">
        <div class="login-form mt-10 px-4 md:mt-[57px] lg:px-[82px]">
            <h2 class="text-black font-700 leading-36 text-24"> লগইন করুন </h2>

            @if ($errors->any())
                <div class="my-10 font-medium text-md text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="blcok my-3">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-form text-center">
                @csrf 
                <div class="form-group flex flex-col mt-[36px]">
                    <label for="" class="text-left"> ইমেইল </label>
                    <input type="text" name="email" class="outline-none mt-3 md:mt-[16px]" placeholder="abdurahim_demo@gmail.com">
                </div>
                
                <div class="form-group flex flex-col mt-[36px]">
                    <label for="" class="text-left"> পাসওয়ার্ড </label>
                    <input type="password" name="password" class="outline-none mt-3 md:mt-[16px]" placeholder="পাসওয়ার্ড">
                </div>
                
                <div class="my-6 md:mt-18px flex justify-between">
                    <label for="remember-me" class="text-[16px] leading-[24px] text-black font-[500]">
                        <input type="checkbox" id="remember_me" name="remember" class="mr-[11px] w-[16px] h-[16px]">  পাসওয়ার্ড মনে রাখুন
                    </label>
                    <a href="{{ route('password.request') }}" class=" text-[16px] font-[500] text-gray-500"> পাসওয়ার্ড ভুলে গেছেন? </span> </a>
                </div>

                <div class="form-group flex flex-col md:mt-[41px]">
                    <button type="submit" class="py-2 lg:py-3 text-center text-white btn-gradient-pink"> লগইন করুন </a>  
                </div>
                
                <div class="form-group flex flex-col mt-6 md:mt-[17px]">
                    <a href="{{ route('register') }}" class="text-[16px] font-[500] text-gray-500"> অ্যাকাউন্ট নেই <span class="text-black ml-2"> অ্যাকাউন্ট খুলুন  </span> </a>
                </div>
            </form>
        </div>
    </div>
    <div class="w-1/2 h-[618px]  hidden md:block lg:w-[487px]"
    style="background-image: url({{ asset('media/auth/login-shape.png')}});">
        <p class="w-[320px] h-full mx-auto font-700 text-[35px] text-center leading-[52px] text-white flex items-center">
            চলচ্চিত্র ও প্রকাশনা
            অধিদপ্তরের
            ডিজিটাল সেবায়
            আপনাকে স্বাগতম
        </p>
    </div>
</div> 
@endsection
