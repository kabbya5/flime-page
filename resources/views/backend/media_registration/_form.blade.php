<div class="form-group flex flex-col">
    <div class="flex justify-between items-center">
        <label for="phone"> বিষয় </label>
        <img class="ml-3 w-10 icon" src="{{ asset('media/icon/bottom-arrow.png') }}" alt="pdf-icon">
    </div>
    
    <input type="text" class="outline-none mt-3 " placeholder="প্রকাশিত ইংরেজি ভাষায় প্রকাশিত মিডিয়াভুক্ত দৈনিক"
    name="registered_name" value="{{ old('registered_name',$registered->registered_name) }}" required>
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex justify-between items-center">
        <label for="phone"> বর্ণনা </label>
        <img class="ml-3 w-10 icon" src="{{ asset('media/icon/bottom-arrow.png') }}" alt="pdf-icon">
    </div>
    
    <textarea name="description" id="" cols="30" rows="10"
    class="border-2 border-gray-300 p-2 bg-transparent mt-3 focus:outline-none" required>
        {{ old('description',$registered->description)}}
    </textarea>
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex justify-between items-center">
        <label for="phone"> প্রকাশের তারিখ</label>
        <img class="ml-3 w-10 icon" src="{{ asset('media/icon/bottom-arrow.png') }}" alt="pdf-icon">
    </div>
    
    <input type="text" class="outline-none mt-3" placeholder="১০-০২-২০২২"
    name="published_date" value="{{ old('published_date',$registered->published_date) }}" required>
</div>

<div class="form-group flex  flex-col mt-10">
    <div class="flex justify-between items-center w-80">
        <label for="" class="text-[14px]"> ফাইল আপলোড </label>
        <img class="ml-3 w-10 icon" src="{{ asset('media/icon/bottom-arrow.png') }}" alt="pdf-icon">
    </div>
    
    <div class="form-group flex  mr-[10px]">
        <label for="file" class="w-[136px] h-[110px] border-2 mt-3 border-gray-300 flex flex-col items-center">
            <input type="file" id="file" name="pdf" class="opacity-0 -mt-6">
            <img src="{{ asset('media/icon/file-upload.png') }}" alt="">
        </label>

        <a id="file-viewer" href="{{ asset($registered->pdf_url) }}" target="blank" class="blcok ml-10 w-[136px] h-[110px] border-2 mt-3 border-gray-300  flex items-center justify-center">
            <img src="{{ asset('media/icon/pdf-icon.png') }}" alt="">
        </a>
    </div>
</div>

<div id="progress" class="mb-1 mt-3 text-base font-medium pr-[100px]"> </div>
    <div class="w-full rounded-full h-2.5 mb-4">
    <div id="width" class="bg-orange-500 h-2.5 rounded-full mr-20" style="width:0%"></div>
</div>

<div class="errors">
                    
</div>

<input type="hidden" name="old_pdf" value="{{ $registered->pdf_url }}">


<div class="w-full form-group flex mt-10">
    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient"> {{ $button_text }} </button>
</div>