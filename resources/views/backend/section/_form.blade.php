<div class="form-group flex flex-col">
    <div class="flex">
        <label for="phone"> সেকশন নাম </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('section_name') error @enderror" placeholder="চলচ্চিত্র"
    name="section_name" value="{{ old('section_name',$section->section_name) }}">

    @error('section_name')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone"> বর্ণনা  </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <textarea cols="30" rows="10"  class="outline-none mt-3 border-2 border-gray-300
    @error('section_description') @enderror" name="section_description">
        {{ old('section_description',$section->section_description) }}
    </textarea>
     
    
        
    </textarea>

    @error('section_description')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone"> সেকশন স্লাগ </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3  @error('section_slug') error @enderror" placeholder="চলচ্চিত্র-পিডিএফ"
    name="section_slug" value="{{ old('section_slug',$section->section_slug) }}">

    @error('section_slug')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="section_position"> সেকশন পসিশন </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('section_position') error @enderror" placeholder="1,2,3,4"
    name="section_position" value="{{ old('section_position',$section->section_position) }}">

    @error('section_position')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>


<div class="w-full form-group flex mt-10">
    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient"> {{ $button_text }} </button>
</div>