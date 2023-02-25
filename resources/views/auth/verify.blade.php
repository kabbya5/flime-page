@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex">
        <div class="w-full md:w-[650px] pb-6 md:pb-0">
            <div class="login-form mt-10 px-4 md:mt-[57px] lg:px-[82px]">
                @if (session('resent'))
                    <div class="text-orange-500 font-700 leading-36 text-24 mb-8" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="text-orange-500 font-700 leading-36 text-24 mb-8" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <h2 class="text-black font-700 leading-36 text-24">ই-মেইল  চেক করুন</h2>

                <p class="text-[#8E8E93] font-[600] text-[16px] leading-[26px] mt-[16px]">
                    আপনার ই-মেইল এ OTP প্রেরণ করা হয়েছে।সর্বোচ্চ ৫ (পাঁচ) মিনিটের মধ্যে OTP পেয়ে যাবেন। অনুগ্রহপূর্বক অপেক্ষা করুন। 
                </p>
                
        
                <form method="POST" action="{{ route('email-verification-code') }}" class="login-form text-center">
                    @csrf 
                    <div class="form-group flex flex-col mt-[36px] text-left">
                        <label for="opt-code" class="font-700 text-[16px] text-black leading-[24px]"> অটিপি কোড বসান </label>
                        <input type="text" name="otp-code" class="outline-none mt-3 md:mt-[16px] @error('otp-code') border-red-500 @enderror" placeholder="7973" value="{{ old('opt-code') }}">
                        @error('otp-code')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group flex flex-col md:mt-[41px]">
                        <button type="submit" class="py-2 lg:py-3 text-center text-white btn-gradient-pink"> সেন্ড করুন </a>  
                    </div>
                </form>

                {{-- resend form  --}}
                <form class="" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="block  w-full mt-6 capitalize py-2 lg:py-3 text-center text-white btn-gradient-green">{{ __('পুনরায় কোড পাঠান') }}</button>.
                </form>
            </div>
        </div>
        <div class="ml-10 h-[618px]  hidden md:block lg:w-[487px]">
            <img src="{{ asset('midia/auth/email-verifiy.jpg') }}" alt="">
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
