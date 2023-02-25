@extends('layouts.app')

@section('content')
<div class="container flex mx-auto md:px-5 md:mb-[140px]">
    <!-- login form  -->
    <div class="w-full md:w-1/2 pb-6 md:pb-0">
        <div class="login-form mt-10 px-4 md:mt-[57px] lg:px-[82px]">
            <h2 class="text-black font-700 leading-36 text-24"> রিসেট পাসওয়ার্ড </h2>
            @if (session('status'))
                <div class="bg-green-800 px-6 py-2 rounded-lg text-white my-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group flex flex-col mt-[36px]">
                    <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="mt-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group flex flex-col md:mt-[41px]">
                    <button type="submit" class="py-2 lg:py-3 text-center text-white btn-gradient-pink"> Send Password Reset Link </a>  
                </div>
            </form>
        </div>
    </div>
    <div class="w-1/2 h-[618px]  hidden md:block lg:w-[487px]">
        <img src="{{ asset('/media/auth/reset.png') }}" alt="">        
    </div>
</div> 
@endsection
