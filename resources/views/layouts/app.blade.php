<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{  $setting->page_name }}</title>
    <link rel="shortcut icon" href="{{ asset($setting->title_image)}}" type="image/x-icon">
    <meta name="description" content="{{ $setting->seo_content }}">
    <meta name="verify-v1" content="{{ $setting->title }}">
    <meta name="robots" content="{{ $setting->seo_tag }}">
    <meta property="og:image" content="{{ asset($setting->share_image) }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="400">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     {{-- Fonts  --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- owl carousel --}}
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css')}}">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    {{-- Scripts --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        
        @yield('style')
    </style>
</head>
<body class="bg-[#F2F2F2]">
    {{-- page loder --}}
    <div class="page-loader flex items-cente justify-center">
        <div id="overlayer"></div>
        <span class="loader">
            <span class="loader-inner"></span>
        </span>
    </div>
    
    <div class="header header-home h-full" style="background-image: url({{ asset('image/Header.png') }});">   
        <nav class="px-2 pb-1 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div class="container flex flex-wrap items-center justify-between  md:justify-center lg:justify-between mx-auto">
                <a href="/" class="flex items-center px-4">
                    <img src="{{ asset($setting->title_image)}}" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
                    <span class="self-center text-sm md:text-[24px] font-semibold whitespace-nowrap text-white"> {{ $setting->title }} </span>
                </a>
                <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only"> Open main menu </span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown"> 
                    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg md:flex-row md:items-center md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:">
                        @foreach ($sections as $section)
                        <li id="dropdownNavbarLink">
                            <a class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto">
                                {{ $section->section_name }}
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>

                            {{-- Dropdown menu --}}
                            
                            <div id="dropdownNavbar" class="z-10  font-normal md:bg-white md:-ml-8">
                                <ul class="text-sm text-white">
                                    @foreach ($section->subsections as $subsection)
                                    <li>
                                        <a href="#" class="block text-black">{{ $subsection->subsection_name }}</a>
                                    </li> 
                                    @endforeach   
                                </ul>
                            </div>
                        </li>
                        @endforeach

                        @if (Route::has('login'))
                            @auth
                                <li>
                                    <a href="login.html"  class="relative block py-1 pl-3 pr-4 text-white rounded hover:text-gray-100"> 
                                        <i class="fa-solid fa-bell fa-2x"></i>
                                        <span class="bg-[#FE0000] text-white w-[17px] h-[17px] rounded-full absolute flex items-center justify-center top-0 right-3"> 2 </span>
                                    </a>
                                </li>

                                
                                <li id="doropdown" class="relative">
                                    <button class="block py-1 pl-3 pr-4"> 
                                        @if(auth()->user()->profile_image)
                                        <img class="w-[46px] height-[46px] rounded-full"  src="{{ asset(auth()->user()->profile_image) }}" alt="">
                                        @else
                                        <img class="w-[46px] height-[46px] rounded-full"  src="{{ asset('media/icon/user.png') }}" alt="">
                                        @endif
                                        
                                    </button>
                                    <div class="dropdown-items hidden user-account-btn flex flex-col">
                                        <a href="{{ route('home') }}" class="font-[600px] text-[14px] leading-[20.25px] text-[#857F7F] border-b py-[13px]"> এডিট প্রোফাইল </a>
                                        @if(auth()->user()->user_type=='user')
                                        <a href="{{ route('home') }}" class="font-[600px] text-[14px] leading-[20.25px] text-[#857F7F] border-b py-[13px]"> ড্যাশবোর্ড </a>
                                        <a href="{{ route('home') }}" class="font-[600px] text-[14px] leading-[20.25px] text-[#857F7F] py-[13px]"> ডিলিট </a>
                                        @else
                                        <a href="{{ route('admin.dashboard', auth()->user()->slug) }}" class="font-[600px] text-[14px] leading-[20.25px]  py-[13px] w-[191px] text-[#857F7F]"> ড্যাশবোর্ড  </a>
                                        @endif  
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="font-[600px] text-[14px] leading-[20.25px] text-white bg-[#FF3B30] py-2 w-[191px] text-center"> লগ আউট </button> 
                                        </form>
                                        
                                    </div>
                                </li>      
                            @else
                            <li>
                                <a id="border-and-radius" href="{{route('login') }}" class="block py-1 pl-3 pr-4 text-white hover:bg-white md:hover:bg-white md:border-0 md:hover:text-black md:p-0
                                    transition duration-300"> 
                                    লগইন করুন 
                                </a>
                            </li>

                            @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" id="border-and-radius" class="block register-btn py-1 pl-3 pr-4 bg-white text-black rounded hover:bg-gray-100  md:border-0 md:hover:text-blue-700 md:p-0
                                    "> 
                                    আইডি খুলুন
                                </a>
                            </li>
                            @endif
                            @endauth

                        @endif    
                    </ul>
                </div>
            </div>
        </nav>  

        @yield('hero_section')
    </div>

    

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
    @include('session_message.alert')


<script type="text/javascript" src="{{ asset('js/jquery-3.6.3.js') }}"></script>
<script type="text/javascript"  src="{{ asset('js/axios.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
<script type="text/javascript"  type="text/js" src="{{ asset('js/custom.js') }}"></script>

@yield('script')
</body>
</html>
