<div class="form-group flex flex-col">
    <div class="flex">
        <label for="phone"> সাবসেকশন নাম </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('subsection_name') error @enderror" placeholder="চলচ্চিত্র"
    name="subsection_name" value="{{ old('subsection_name',$subsection->subsection_name) }}">

    @error('subsection_name')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone">সিলেটে সেকশন</label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    

    <select name="section_id" id="section" class="dropdown  py-3 px-4  border border-[#B0B0B0] focus:outline-none mt-3">
        <option value="" class="dropdown"> সিলেটে সেকশন </option>
        @foreach ($sections as $section)
        <option value="{{ $section->id }}" {{ ($section->id === old('section_id',$subsection->section_id)) ? 'selected' : ' '}} class="dropdown"> {{ $section->section_name }} </option>
        @endforeach
    </select>
    @error('section_id')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone"> সাবসেকশন স্লাগ </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('slug') error @enderror" placeholder="চলচ্চিত্র-পিডিএফ"
    name="slug" value="{{ old('slug',$subsection->slug) }}">

    @error('slug')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="subsection_position"> সাবসেকশন পসিশন </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('subsection_position') error @enderror" placeholder="1,2,3"
    name="subsection_position" value="{{ old('subsection_position',$subsection->subsection_position) }}">

    @error('subsection_position')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>


<div class="w-full form-group flex mt-10">
    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green"> {{ $button_text }} </button>
</div>