<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     {{-- Fonts  --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- owl carousel --}}
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css')}}">


    {{-- Scripts --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        @yield('style')
    </style>
</head>
<body id="admin-layout" class="bg-[#F2F2F2]">
    <div class="header header-home h-full" style="background-image: url({{ asset('image/Header.png') }});">   
        <nav class="px-2 pb-1 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div class="flex flex-wrap items-center justify-between  md:justify-center lg:justify-between mx-auto">
                <a href="/" class="flex items-center px-4">
                    <img src="{{ asset('image/Capture.png')}}" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
                    <span class="self-center text-sm md:text-[24px] font-semibold whitespace-nowrap text-white"> চলচ্চিত্র ও প্রকাশনা অধিদপ্তর  </span>
                </a>
                <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only"> Open main menu </span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown"> 
                    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg md:flex-row md:items-center md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:">
                        
                        @if (Route::has('login'))
                            @auth
                                <li>
                                    <a href="login.html"  class="relative block py-1 pl-3 pr-4 text-white rounded hover:text-gray-100"> 
                                        <i class="fa-solid fa-bell fa-2x"></i>
                                        @if (auth()->user()->unreadNotifications->count())
                                        <span class="bg-[#FE0000] text-white w-[17px] h-[17px] rounded-full absolute flex items-center justify-center top-0 right-3"> {{ auth()->user()->unreadNotifications->count() }} </span> 
                                        @endif
                                    </a>
                                </li>

                                
                                <li id="doropdown" class="relative">
                                    <button class="block py-1 pl-3 pr-4"> 
                                        @if (auth()->user()->profile_image)
                                        <img class="w-[46px] height-[46px] rounded-full"  src="{{ asset(auth()->user()->profile_image) }}" alt="">
                                        @else
                                        <img class="w-[46px] height-[46px] rounded-full"  src="{{ asset('media/icon/user.png') }}" alt=""> 
                                        @endif
                                       
                                    </button>
                                    <div class="dropdown-items hidden user-account-btn flex flex-col">
                                        <a href="{{ route('home') }}" class="font-[600px] text-[14px] leading-[20.25px] text-[#857F7F] border-b py-[13px]"> এডিট প্রোফাইল </a>
                                        <a href="{{ route('admin.dashboard', auth()->user()->slug) }}" class="font-[600px] text-[14px] leading-[20.25px]  py-[13px] w-[191px] text-[#857F7F]"> ড্যাশবোর্ড  </a>
                                        
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="font-[600px] text-[14px] leading-[20.25px] text-white bg-[#FF3B30] py-2 w-[191px] text-center"> লগ আউট </button> 
                                        </form>
                                        
                                    </div>
                                </li>     
                            @endauth

                        @endif    
                    </ul>
                </div>
            </div>
        </nav>  
    </div>

    <main class="">
        <div class="flex">
            <div class="sidebar w-[350px] justify-center h-screen bg-gradient-blue sticky transition duration-300">
                <ul class="ml-6">
                    <li class="dashboard-items">
                        <a href="{{ route('admin.dashboard',auth()->user()->slug) }}" class="dashbord-link {{ (request()->segment(2) == 'dashboard') ? 'active' : '' }}">
                            <img class="img-white"  src="{{ asset('media/icon/home-white.png') }}" alt="home-icon">
                            <img src="{{ asset('media/icon/home.png') }}" alt="pdf-icon">
                            হোম
                        </a>
                    </li>

                    <li class="dashboard-items">
                        <a href="{{route('admin.sections.index')}}" class="dashbord-link {{ (request()->segment(2) == 'sections') ? 'active' : '' }}">
                            <img src="{{ asset('media/icon/section.png') }}" alt="home-icon"> 
                            <img class="img-white " src="{{ asset('media/icon/section-white.png') }}" alt="pdf-icon">
                            সেকশন
                        </a>
                    </li>

                    <li class="dashboard-items">
                        <a href="{{route('admin.subsections.index')}}" class="dashbord-link {{ (request()->segment(2) == 'subsections') ? 'active' : '' }}">
                            <img src="{{ asset('media/icon/sub-section.png') }}" alt="home-icon"> 
                            <img class="img-white " src="{{ asset('media/icon/sub-section-white.png') }}" alt="pdf-icon">
                            সাব সেকশন
                        </a>
                    </li>

                    <li class="dashboard-items">
                        <a href="{{route('admin.posts.index')}}" class="dashbord-link {{ (request()->segment(2) == 'posts') ? 'active' : '' }}">
                            <img class="" src="{{ asset('media/icon/pdf.png') }}" alt="pdf-icon">
                            <img class="img-white " src="{{ asset('media/icon/pdf-white.png') }}" alt="pdf-icon">
                            প্রকাশনা
                        </a>
                    </li>

                    <li class="dashboard-items">
                        <a href="{{route('admin.video.posts.index')}}" class="dashbord-link {{ (request()->segment(2) == 'video') ? 'active' : '' }}">
                            <img  src="{{ asset('media/icon/video.png') }}" alt="pdf-icon">
                            <img class="img-white" src="{{ asset('media/icon/video-white.png') }}" alt="pdf-icon">
                            চলচ্চিত্র
                        </a>
                    </li>

                    <li class="dashboard-items">
                        <a href="{{route('admin.users.index')}}" class="dashbord-link {{ (request()->segment(2) == 'users') ? 'active' : '' }}">
                            <img  src="{{ asset('media/icon/user.png') }}" alt="pdf-icon">
                            <img class="img-white" src="{{ asset('media/icon/user-white.png') }}" alt="pdf-icon">
                            ইউজার
                        </a>
                    </li>

                    <li class="dashboard-items">
                        <a href="{{route('admin.clearence.inputs.index')}}" class="dashbord-link {{ (request()->segment(2) == 'newspaper') ? 'active' : '' }}">
                            <img  src="{{ asset('media/icon/registration.png') }}" alt="pdf-icon">
                            <img class="img-white" src="{{ asset('media/icon/registration-white.png') }}" alt="pdf-icon">
                            নিবন্ধন
                        </a>
                    </li>
                    <li class="dashboard-items">
                        <button id="doropdown-toggoler" class="{{ (request()->segment(2) == 'media') ? 'text-white active' : '' }}">
                            <div class="dashbord-link">
                                <img  src="{{ asset('media/icon/media-registration.png') }}" alt="pdf-icon">
                                <img class="img-white" src="{{ asset('media/icon/media-registration-white.png') }}" alt="pdf-icon">
                                বিজ্ঞাপন
                                <img class="ml-3 w-10 icon" src="{{ asset('media/icon/bottom-arrow.png') }}" alt="pdf-icon">
                                <img class="img-white icon" src="{{ asset('media/icon/bottom-arrow-white.png') }}" alt="pdf-icon">
                            </div>
                            

                            <ul class="dropdown-items ml-[30px] hidden">

                                <li class="mt-[23px]">
                                    <a href="{{route('admin.media.registereds.index')}}" class="dashbord-link active">
                                        মোট নিবন্ধিত
                                    </a> 
                                </li>
                                <li class="mt-[23px]">
                                    <a href="{{route('admin.media.inputs.index')}}" class="dashbord-link active">
                                        আবেদন
                                    </a> 
                                </li>
                            </ul>
                        </button>
                    </li>
                    <li class="dashboard-items">
                        <a href="{{route('admin.setting.index')}}" class="dashbord-link {{ (request()->segment(2) == 'setting') ? 'active' : '' }}">
                            <img  src="{{ asset('media/icon/setting.png') }}" alt="pdf-icon">
                            <img class="img-white" src="{{ asset('media/icon/setting-white.png') }}" alt="pdf-icon">
                            Settings
                        </a>
                    </li>
                </ul>
            </div>

            {{-- content --}}

            <div class="content bg-white px-[40px] w-full mb-10 shadow-sm">
                @yield('content')
            </div>
            
        </div>
        
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
