<div class="form-group flex flex-col">
    <label for="phone"> সেকশন নাম </label>
    <input type="text" class="outline-none mt-3 @error('section_name') error @enderror" placeholder="চলচ্চিত্র"
    name="section_name" value="{{ old('section_name',$section->section_name) }}">

    @error('section_name')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <label for="phone"> সেকশন স্লাগ </label>
    <input type="text" class="outline-none mt-3  @error('section_slug') error @enderror" placeholder="চলচ্চিত্র-পিডিএফ"
    name="section_slug" value="{{ old('section_slug',$section->section_slug) }}">

    @error('section_slug')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <label for="section_position"> সেকশন পসিশন </label>
    <input type="text" class="outline-none mt-3 @error('section_position') error @enderror" placeholder="1,2,3,4"
    name="section_position" value="{{ old('section_position',$section->section_position) }}">

    @error('section_position')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>


<div class="w-full form-group flex mt-10">
    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient"> {{ $button_text }} </button>
</div>