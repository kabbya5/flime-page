@extends('test.layout')
@section('title')
    category
@endsection

@section('style')

@endsection
@section('content')
  <div class="mt-4 d-flex align-items-center justify-content-between">
     <h2> Create Category  </h2>
     <a href="{{ route('categories.index') }}" class="text-decoration-none text-info text-capitalize"> all categories </a>
  </div>

  <div class="mt-5">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        @include('test.category._form',['button_text' => 'create category', 'model' => $category])

    </form>
  </div>
@endsection