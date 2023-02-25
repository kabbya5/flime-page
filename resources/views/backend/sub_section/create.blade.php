@extends('backend.layout')

@section('content')

<div class="mt-10 md:mt-58">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> যোগ করুন  </h2>
        <a href="{{ route('admin.subsections.index') }}" class="btn-gradient-green">
            সব সাবসেকশন
        </a>
    </div>
    <div class="bg-white md:w-[500px] mt-10 md:mt-[100px] py-10 md:py-[50px] px-4 md:mx-auto shadow-lg border-1">
        
        <form action="{{ route('admin.subsections.store') }}" method="POST">
            @csrf 
            @include('backend.sub_section._form',['model'=> $subsection, 'button_text' => 'যোগ করুন'])
        </form>
        

    </div>

</div>

@endsection