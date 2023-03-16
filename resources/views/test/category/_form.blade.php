<div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name',$category->category_name) }}" placeholder="Category Name">
    @error('category_name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label"> Category Postion </label>
    <input type="text" class="form-control @error('category_position') is-invalid @enderror" name="category_position" value="{{ old('category_position',$category->category_position) }}" placeholder="Category Position">
    @error('category_position')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<button type="submit" class="btn btn-primary">
    {{ $button_text }}
</button>