@extends('test.layout')
@section('title')
    Image
@endsection
@section('content')
<section class="portfolio overflow-hidden">
    <div class="container">
        <div class="row">
            <!-- Portfolio Section Heading -->
            <div class="portfolio__heading mt-5 d-flex align-items-center justify-content-between">
                <h1 class="portfolio__title fw-bold ">Our Portfolio</h1>
                <a href="{{ route('images.create') }}"> Create Image </a>
            </div>
            <!-- Portfolio Navigation Buttons List -->
            <div class="col-12">
                <ul class="portfolio__nav nav justify-content-center mb-4">
                    <li class="nav-item">
                        <a href="{{ route('images.index') }}" 
                            class=" portfolio__nav__btn position-relative bg-transparent border-0 
                            {{ (request()->segment(2) =='images') ? 'active' : '' }}
                           ">All</a>
                    </li>
                    @foreach ($categories as $category)
                    <li class="nav-item">
                        <a href="{{ route('category.image',$category->slug) }}" class="
                            {{ (request()->is('category/image/' .$category->slug)) ? 'active' : '' }} 
                            portfolio__nav__btn position-relative bg-transparent border-0" data-filter=".vehicle">{{ $category->category_name }}</a>
                    </li> 
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- Portfolio Cards Container -->
        <div class="row grid">
            @foreach ($images as $image)
            <div class="grid-item col-lg-4 col-sm-6 vehicle">
                <a href="{{ route('images.edit',$image->id) }}" class="portfolio__card position-relative d-inline-block w-100">
                    <img src="{{ asset($image->image_path) }}" alt="Random Image" class="w-100">
                </a>
            </div>   
            @endforeach
            
        </div>
    </div>
</section>

@endsection