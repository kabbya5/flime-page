<div class="mb-3">
    <label class="form-label">Image Name </label>
    <input type="text" class="form-control @error('image_name') is-invalid @enderror" name="image_name" value="{{ old('image_name',$image->image_name) }}" placeholder="Image Name">
    @error('image_name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label"> Select category </label>
    <select type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ ($category->id === old('category_id',$image->category_id)) ? 'selected' : ' ' }}>{{ $category->category_name }}</option>
        @endforeach 
    <select>
    @error('category_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label"> Image </label>
    <input type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path">
    @error('image_path')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>



<input type="hidden" value="{{ $image->image_path }}" name="old_image">


<button type="submit" class="btn btn-primary">
    {{ $button_text }}
</button>