@extends('backend.layout')
@section('content')
<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> {{ $newspaper_clearenc->input_name }} </h2>
        <div class="flex">
            <a href="{{ route('admin.clearence.inputs.index') }}" class="btn-gradient">
                নিবন্ধন 
            </a>
        </div>
    </div>

    <div class="mt-[85px]">
        <form id="fileUploadForm" class="d-full md:w-[500px]" action="{{ route('admin.clearence.inputs.update',$newspaper_clearenc->slug) }}" method="POST">
            @csrf  
            @method('PUT'); 
            @include('backend.newspaper_clearence._form',['button_text' => 'Update Newspager Clearence'])
        </form>
    </div>
</div>
@endsection