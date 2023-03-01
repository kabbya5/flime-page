<div class="form-group flex justify-between">
    <div class="form-group flex flex-col w-full">
        <label for="post_name"> পোস্টের নাম  </label>
        <input type="text" class="outline-none mt-3 @error('post_name') error @enderror" placeholder="বইয়ের নাম"
        name="post_name" value="{{ old('post_name',$post->post_name) }}">
    
        @error('post_name')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
</div>

<div class="form-group flex justify-between">
    <div class="form-group flex flex-col mt-10 w-full mr-[9px]">
        <label for="phone">সিলেটে সেকশন</label>
    
        <select name="section_id" id="section" class="dropdown py-2 px-4 w-full mt-3 border border-[#B0B0B0] focus:outline-none pr-4 @error('post_date') error @enderror">
            <option value="" disabled selected> সিলেটে সেকশন </option>
            @foreach ($sections as $section)
            <option value="{{ $section->id }}" {{ ($section->id === old('section_id',$post->section_id)) ? 'selected' : ' '}} class="dropdown"> {{ $section->section_name }} </option>
            @endforeach
        </select>
    
        @error('section_id')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
    
    <div class="form-group flex flex-col mt-10 w-full ml-[9px]">
        <label for="phone"> সিলেটে সাব সেকশন </label>
    
        <select name="subsection_id" id="subsection_id" class="dropdown py-2 px-4 w-full mt-3 border border-[#B0B0B0] focus:outline-none @error('post_date') error @enderror">
            @if ($post->subsettion_id)
            <option value="{{ $post->subsection_id }}"  selected> {{ $post->subsection->subsection_name }} </option> 
            @endif
        </select>
    
        @error('section_id')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>   
</div>

<div class="form-group flex flex-col mt-10">
    <label for="post_description">বর্ণনা</label>

    <textarea name="post_description" id="" cols="30" rows="7" class="mt-3 border-2 border-gray-200 focus:outline-none @error('post_description') error @enderror">
        {{ old('post_description',$post->post_description) }}
    </textarea>

    @error('post_description')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div> 

<div class="form-group flex justify-between mt-10">
    <div class="form-group flex flex-col w-full mr-[10px]">
        <label for="chief_editor"> প্রধান সম্পাদক </label>
        <input type="text" class="outline-none mt-3 @error('chief_editor') error @enderror" placeholder="প্রধান সম্পাদক"
        name="chief_editor" value="{{ old('chief_editor',$post->chief_editor) }}">
    
        @error('chief_editor')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
    
    <div class="form-group flex flex-col w-full  ml-[10px]">
        <label for="senior_editor"> সিনিয়র সম্পাদক </label>
        <input type="text" class="outline-none mt-3 @error('senior_editor') error @enderror" placeholder="সিনিয়র সম্পাদক"
        name="senior_editor" value="{{ old('senior_editor',$post->senior_editor) }}">
    
        @error('senior_editor')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div> 
</div>
<div class="form-group flex justify-between mt-10">
    <div class="form-group flex flex-col w-full mr-[10px]">
        <label for="editor"> সম্পাদক </label>
        <input type="text" class="outline-none mt-3 @error('editor') error @enderror" placeholder="সম্পাদক"
        name="editor" value="{{ old('editor',$post->editor) }}">
    
        @error('editor')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
    
    <div class="form-group flex flex-col w-full  ml-[10px]">
        <label for="post_date"> সংখ্যা  </label>
        <input type="text" class="outline-none mt-3 @error('post_date') error @enderror" placeholder="সংখ্যা "
        name="post_date" value="{{ old('post_date',$post->post_date) }}">
    
        @error('post_date')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div> 
</div>
        
<div class="form-group flex justify-between mt-10">
    
    <div class="form-group  flex flex-col w-full  ml-[10px]">
        
        <div class="flex justify-between">
            <label for="published_at"> অবস্থা </label>
        </div>
        <input type="date" class="outline-none mt-3 @error('published_at') error @enderror" placeholder="অবস্থা"
        name="published_at" value="{{ old('published_at',$post->published_at) }}">
    
        @error('published_at')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div> 
</div>

<div class="form-group flex flex-col pt-10">
    <label for="editorial_associate"> সম্পাদকীয় সহযোগী </label>
    <textarea name="editorial_associate" id="" cols="30" rows="7" class="mt-3 border-2 border-gray-300 focus:outline-none @error('editorial_associate ') error @enderror">
    {{ old('editorial_associate',$post->editorial_associate) }}

    </textarea>
            
    @error('editorial_associate')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex justify-between mt-10">
    <div class="flex flex-col w-1/2">
        <div class="form-group  flex w-full  ml-[10px]">
            <div class="form-group flex flex-col w-full mr-[10px]">
                <label for="" class="text-[14px]"> থাম্বনেইল আপলোড </label>

                <label for="thumbnail" class="blcok w-[146px] h-[110px] mt-3 border-2 border-gray-300  flex items-center justify-center @error('thumbnail') error @enderror">
                    <input type="file" name="thumbnail" id="thumbnail" class="hidden">
                    <img class="image-upload-icon" src="{{ asset('media/icon/image-upload.png') }}" alt="">
                </label>
                
            
                @error('thumbnail')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div>
            
            <div class="form-group flex flex-col w-full mr-[10px]">
                <label for="" class="text-[14px]"> ফাইল আপলোড </label>

                <label for="file" class="blcok w-[136px] h-[110px] border-2 mt-3 border-gray-300  flex items-center justify-center @error('pdf_file') error @enderror">
                    <input type="file" id="file" name="pdf_file" class="hidden">
                    <img src="{{ asset('media/icon/file-upload.png') }}" alt="">
                </label>
                
            
                @error('pdf_file')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
  
            </div>
        </div>      
        <div class="mt-3">
            <p id="file_name" class="text-[14px] font-[500] leading-[30px] text-black"> </p>    
            <div id="progress" class="mb-1 mt-1 text-base font-medium dark:text-white"> </div>
                <div class="w-full rounded-full h-2.5 mb-4 ">
                <div id="width" class="bg-orange-500 h-2.5 rounded-full" style="width: 0%"></div>
            </div>
        </div>
    </div> 
    <div class="flex w-1/2 mt-10">
        <div class="file-preview  mr-2">
            <a href="{{ asset($post->file_url) }}" id="image-holder" target="blank" class="hidden">
                <img src="{{ asset($post->thumbnail) }}" class="thumb-image w-[136px] h-[110px]">
            </a>
        </div>
    </div>        
</div>

<div class="errors">
    
</div>

<input type="hidden" name="post_type" value="PDF">
<input type="hidden" name="old_thumbnail" value="{{ $post->thumbnail }}">
<input type="hidden" name="old_file" value="{{ $post->file_url }}">

<div class="w-full form-group flex mt-10">
    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green capitalize"> create post </button>
</div>