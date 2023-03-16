@extends('test.layout')
@section('title')
    category
@endsection
@section('content')
    <div class="mt-4 d-flex justify-content-between align-items-center">
        <h4 class="text-capitalize"> all categories </h4>

        <a href="{{ route('categories.create') }}" class="text-decoration-none text-info text-capitalize"> Create Category </a>
    </div>

    <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Postion</th>
            <th scope="col">Category Images</th>
            <th scope="col"> Action </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories  as $key => $category )
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_position }}</td>
                <td>{{ $category->images->count() }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('categories.edit',$category->slug) }}" class="btn btn-success btn-sm"> Edit </a>
                        <form action="{{ route('categories.destroy',$category->slug) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="mx-2 btn btn-danger btn-sm"> Delete </button>
                        </form>
                        
                    </div>
                </td>
              </tr> 
            @endforeach
        </tbody>
      </table>
@endsection