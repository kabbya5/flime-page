@extends('test.layout')
@section('title')
    image
@endsection

@section('style')

@endsection
@section('content')
  <div class="mt-4 d-flex align-items-center justify-content-between">
     <h2> Create Image  </h2>
     <a href="{{ route('images.index') }}" class="text-decoration-none text-info text-capitalize"> all categories </a>
  </div>

  <div class="mt-5">
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('test.image._form',['button_text' => 'create image', 'model' => $image])
    </form>
  </div>
@endsection