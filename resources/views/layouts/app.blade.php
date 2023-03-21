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
    @include('layouts.page_loader')
    
    <div class="header header-home h-full" style="background-image: url({{ asset('image/Header.png') }});">   
        <nav class="px-2 pb-1 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div class="container flex flex-wrap items-center justify-between  md:justify-center lg:justify-between mx-auto">
                <a href="/" class="flex items-center px-4">
                    <img src="{{ asset($setting->title_image)}}" class="h-6 mr-3 sm:h-10" alt="{{ $setting->title }}" />
                    <span class="self-center text-sm md:text-[24px] font-semibold whitespace-nowrap text-white"> {{ $setting->title }} </span>
                </a>
                <button id="navbar-toggler" type="button" class="inline-flex items-center p-2 ml-3  text-gray-400 text-xl rounded-lg md:hidden hover:bg-gray-100">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown"> 
                    <ul class="flex flex-col p-4 mt-4 rounded-lg md:flex-row md:items-center md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                        @foreach ($sections as $section)
                        <li id="dropdownNavbarLink" class="dropdownNavbarLink">
                            <a class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-white rounded md:hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto">
                                {{ $section->section_name }}
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>

                            {{-- Dropdown menu --}}
                            <div id="dropdownNavbar" class="dropdownNavbar z-10 hidden font-normal md:bg-white md:-ml-8">
                                <ul class="text-sm text-white md:bg-white">
                                    @if($section->section_position === 1)
                                        @foreach ($section->subsections as $subsection)
                                            <li class="">
                                                <a href="{{ route('video.subsection.posts',$subsection->slug) }}" class="block text-black">{{ $subsection->subsection_name }}</a>
                                            </li> 
                                    @endforeach  
                                    @elseif ($section->section_position === 2)
                                        @foreach ($section->subsections as $subsection)
                                            <li>
                                                <a href="{{ route('book.subsection.posts',$subsection->slug) }}" class="block text-black">{{ $subsection->subsection_name }}</a>
                                            </li> 
                                        @endforeach 

                                        <li>
                                                <a href="{{ route('user.file.upload') }}" class="block text-black"> লেখা জমা দিন </a>
                                        </li>
                                    @else
                                    <li>
                                        <a href="{{ route('new.clearence.form') }}" class="block text-black"> পত্রিকা নামের ছাড়পত্র </a>
                                    </li> 
                                        @foreach ($section->subsections as $subsection)
                                            @if($subsection->subsection_position === 1)
                                                <li>
                                                    <a href="{{ route('all.media.news') }}" class="block text-black">{{ $subsection->subsection_name }}</a>
                                                </li> 
                                            @else
                                                <li>
                                                    <a href="{{ route('media.form') }}" class="block text-black">{{ $subsection->subsection_name }}</a>
                                                </li> 
                                            @endif
                                            
                                        @endforeach 
                                    @endif
                                    
                                </ul>
                            </div>
                        </li>
                        @endforeach

                        @if (Route::has('login'))
                            @auth
                                @if (auth()->user()->user_type == 'admin')
                                <li class="relative cursor-pointer">
                                    <a href="{{ route('admin.dashboard', auth()->user()->slug) }}" class="relative block py-1 pl-3 pr-4 text-white rounded hover:text-gray-100"> 
                                        <i class="fa-solid fa-bell fa-2x"></i>
                                        @if (auth()->user()->unreadNotifications->count())
                                        <span class="bg-[#FE0000] text-white w-[17px] h-[17px] rounded-full absolute flex items-center justify-center top-0 right-3"> {{ auth()->user()->unreadNotifications->count() }} </span> 
                                        @endif
                                    </a>
                                </li>

                                @else

                                <li id="notification-toggoller" class="relative cursor-pointer">
                                    <a class="relative block py-1 pl-3 pr-4 text-white rounded hover:text-gray-100"> 
                                        <i class="fa-solid fa-bell fa-2x"></i>
                                        @if (auth()->user()->unreadNotifications->count())
                                        <span class="bg-[#FE0000] text-white w-[17px] h-[17px] rounded-full absolute flex items-center justify-center top-0 right-3"> {{ auth()->user()->unreadNotifications->count() }} </span> 
                                        @endif
                                    </a>

                                    @if (auth()->user()->unreadNotifications->count() > 0)
                                        <div id="notification" class="hidden mt-10 absolute w-80 md:bg-white shadow-md right-[100%] pb-3 px-6">
                                            @foreach (auth()->user()->unreadNotifications as $notification)
                                                <div class="pt-4 border-b-2 border-gray-300">
                                                    <p class="block text-white md:text-[#454545] text-[18px] font-[500] leading-[29px] mb-1"> Your file has been {{ $notification->data['status']}} </p>
                                                    <p class="block text-white md:text-[#454545] text-[18px] font-[500] leading-[29px] mb-1"> Section name: {{ $notification->data['section'] }} </p> 
                                                    <p class="block text-white md:text-[#454545] text-[18px] font-[500] leading-[29px] mb-1"> Subject : {{ $notification->data['subject'] }} </p> 
                                                    <p class="block text-white md:text-[#454545] text-[18px] font-[500] leading-[29px] mb-1"> Data: {{ $notification->data['date'] }} </p>        
                                                </div> 
                                            @endforeach
                                        </div>
                                    @else
                                        <div id="notification" class="hidden mt-10 absolute w-80 md:bg-white shadow-md right-[100%] pb-3 px-6">
                                            
                                            <div class="pt-4 border-b-2 border-gray-300">
                                                <p class="block text-white md:text-[#454545] text-[18px] font-[500] leading-[29px] mb-4"> Notification not found </p>          
                                            </div> 
                                        </div>
                                    @endif
                                    
                                </li>   
                                @endif
                                        
                                <li id="doropdown" class="relative">
                                    <button class="block py-1 pl-3 pr-4"> 
                                        @if(auth()->user()->profile_image)
                                        <img class="w-[46px] height-[46px] rounded-full"  src="{{ asset(auth()->user()->profile_image) }}" alt="">
                                        @else
                                        <img class="w-[46px] height-[46px] rounded-full"  src="{{ asset('media/icon/user.png') }}" alt="">
                                        @endif
                                    </button>
                                    <div class="hidden dropdown-items user-account-btn flex flex-col">
                                        <a href="{{ route('home') }}" class="font-[600px] text-[14px] leading-[20.25px] text-[#857F7F] border-b py-[13px]"> এডিট প্রোফাইল </a>
                                        @if(auth()->user()->user_type=='user')
                                        <a href="{{ route('user.delete',auth()->user()->slug) }}" class="font-[600px] text-[14px] leading-[20.25px] text-[#857F7F] py-[13px]"> ডিলিট </a>
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

<script>
    $(document).ready(function(){
        $('#notification-toggoller').click(function(){
            $('#notification').toggleClass('show');

            $.ajax({
                url:'/user/notification/read/',
                type:"GET",
            });
        });
    });
</script>
</body>
</html>
