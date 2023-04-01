@extends('backend.layout')

@section('content')

<div class="mt-10 md:mt-[58px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> যোগ করুন  </h2>
        <a href="{{ route('admin.bibliograpy.index') }}" class="btn-gradient">
            বিবলিওগ্রাফি
        </a>
    </div>
    <div class="md:w-[500px] mt-10 md:mt-[60px] py-10 md:py-[50px] px-4">
        <form id="fileUploadForm" action="{{ route('admin.bibliograpy.update',$bibliograpy->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            @include('backend.bibliograpy._form',['model'=> $bibliograpy, 'button_text' => 'যোগ করুন'])
        </form>
    </div>
</div>

@endsection
