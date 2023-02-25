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

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group flex flex-col mt-[36px]">
                    <label for="" class="text-left"> ইমেইল </label>
                    <input type="text" name="email" class="outline-none mt-3 md:mt-[16px] @error('email') error @enderror">
                   
                    @error('email')
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
                    <button class="  lg:py-3 text-center text-white btn-gradient-pink"> {{ __('Reset Password') }} </button>  
                </div>
            </form>
        </div>
    </div>
    <div class="w-1/2 h-[618px]  hidden md:block lg:w-[487px]">
        <img src="{{ asset('media/auth/reset.png')}}" alt="">
    </div>
</div> 
@endsection

