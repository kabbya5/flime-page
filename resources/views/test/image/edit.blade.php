@extends('test.layout')
@section('title')
    image
@endsection

@section('style')

@endsection
@section('content')
  <div class="mt-4 d-flex align-items-center justify-content-between">
     <h2> Update Image  </h2>
     <a href="{{ route('images.index') }}" class="text-decoration-none text-info text-capitalize"> all categories </a>
  </div>

  <div class="mt-5">
    <form action="{{ route('images.update',$image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        @include('test.image._form',['button_text' => 'Update image', 'model' => $image])
    </form>
  </div>
@endsection