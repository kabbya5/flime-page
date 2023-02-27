@extends('backend.layout')
@section('content')
<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[22px] text-black leading-[50px]"> {{ $input->input_name }} </h2>
        <div class="flex">
            <a href="{{ route('admin.submedia.inputs.index') }}" class="btn-gradient">
                নিবন্ধন 
            </a>
        </div>
    </div>

    <div class="mt-[85px]">
        <form class="d-full md:w-[500px]" action="{{ route('admin.submedia.inputs.update',$input->id) }}" method="POST">
            @csrf  
            @method('PUT'); 
            @include('backend.media_input._form',['button_text' => 'প্রকাশ করুন'])
        </form>
    </div>
</div>
@endsection