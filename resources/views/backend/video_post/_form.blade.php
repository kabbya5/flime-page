<div class="form-group flex justify-between">
    <div class="form-group flex flex-col w-full">
        <div class="flex">
            <label for="post_name"> পোস্টের নাম  </label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        
        <input type="text" class="outline-none mt-3 @error('post_name') error @enderror" placeholder="পোস্টের নাম"
        name="post_name" value="{{ old('post_name',$post->post_name) }}">
    
        @error('post_name')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
</div>

<div class="form-group flex justify-between">
    <div class="form-group flex flex-col mt-10 w-full mr-[9px]">
        
        <div class="flex">
            <label for="phone">সিলেটে সেকশন</label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        <select name="section_id" id="section" class="dropdown py-2 px-4 w-full mt-3 border border-[#B0B0B0] focus:outline-none pr-4 @error('cooperation') error @enderror">
            <option value="{{ $section->id }}"> {{ $section->section_name }}</option>
            
        </select>
    
        @error('section_id')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
    
    <div class="form-group flex flex-col mt-10 w-full">
        <div class="flex">
            <label for="phone">সিলেটে সাব সেকশন</label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        
    
        <select name="subsection_id" id="section" class="dropdown  py-2 px-4  border border-[#B0B0B0] focus:outline-none mt-3">
            <option value="" class="dropdown"> সিলেটে সেকশন </option>
            @foreach ($section->subsections as $subsection)
            <option value="{{ $subsection->id }}" {{ ($subsection->id === old('subsection_id',$post->subsection_id)) ? 'selected' : ' '}} class="dropdown"> {{ $subsection->subsection_name }} </option>
            @endforeach
        </select>
        @error('section_id')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>  
</div>

<div class="form-group  flex flex-col mt-10">
    
    <div class="flex">
        <label for="post_description">বর্ণনা</label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>

    <textarea name="post_description" id="" cols="30" rows="7" class="mt-3 px-3 border-2 border-gray-200 focus:outline-none @error('post_description') error @enderror">
        {{ old('post_description',$post->post_description) }}
    </textarea>

    @error('post_description')
            <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div> 

<div class="form-group flex justify-between mt-10">
    <div class="form-group flex flex-col w-full mr-[10px]">
        
        <div class="flex">
            <label for="director"> পরিচালক </label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        <input type="text" class="outline-none mt-3 @error('director') error @enderror" placeholder="পরিচালক"
        name="director" value="{{ old('director',$post->director) }}">
    
        @error('director')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
    
    <div class="form-group flex flex-col w-full  ml-[10px]">
        <div class="flex">
            <label for="producer"> প্রযোজক </label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        <input type="text" class="outline-none mt-3 @error('producer') error @enderror" placeholder="প্রযোজক"
        name="producer" value="{{ old('producer',$post->producer) }}">
    
        @error('producer')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div> 
</div>
<div class="form-group flex justify-between mt-10">
    <div class="form-group flex flex-col w-full mr-[10px]">
        <div class="flex">
            <label for="script_writer"> স্ক্রিপ্ট রাইটার </label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        <input type="text" class="outline-none mt-3 @error('script_writer') error @enderror" placeholder="স্ক্রিপ্ট রাইটার"
        name="script_writer" value="{{ old('script_writer',$post->script_writer) }}">
    
        @error('script_writer')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
    
    <div class="form-group flex flex-col w-full  ml-[10px]">
        <div class="flex">
            <label for="cooperation"> সার্বিক সহযোগিতায়  </label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        
        <input type="text" class="outline-none mt-3 @error('cooperation') error @enderror" placeholder="সার্বিক সহযোগিতায় "
        name="cooperation" value="{{ old('cooperation',$post->cooperation) }}">
    
        @error('cooperation')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div> 
</div>

<div class="form-group flex justify-between mt-10">
    <div class="form-group flex flex-col w-full mr-[10px]">
        <div class="flex">
            <label for="copyright"> কপিরাইট </label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        <input type="text" class="outline-none mt-3 @error('copyright') error @enderror" placeholder="কপিরাইট"
        name="copyright" value="{{ old('copyright',$post->copyright) }}">
    
        @error('copyright')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div>
    
    <div class="form-group flex flex-col w-full  ml-[10px]">
        <div class="flex">
            <label for="implementation"> বাস্তবায়নে  </label>
            <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
        </div>
        <input type="text" class="outline-none mt-3 @error('implementation') error @enderror" placeholder="বাস্তবায়নে"
        name="implementation" value="{{ old('implementation',$post->implementation) }}">
    
        @error('implementation')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div> 
</div>
 
<div class="form-group flex justify-between mt-10">
    
    <div class="form-group  flex flex-col w-1/2  mr-[10px]">
        <div class="flex justify-between">
            <label for="published_at"> অবস্থা </label>
            <label for="published_at"> {{ $post->status }} </label>
        </div>
        <input type="date" class="outline-none mt-3 @error('published_at') error @enderror" placeholder="অবস্থা"
        name="published_at" value="{{ old('published_at',$post->published_at) }}">
    
        @error('published_at')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div> 

    
    <div class="form-group flex flex-col w-1/2  ml-[10px]">
        <label for="video_link"> ভিডিও লিংক </label>
        <input type="text" class="outline-none mt-3 @error('video_link') error @enderror" placeholder="ভিডিও লিংক"
        name="video_link" value="{{ old('video_link',$post->video_link) }}">
    
        @error('video_link')
                <p class="mt-2 text-red-500">{{ $message }}</p>    
        @enderror
    </div> 
</div>


<div class="form-group flex justify-between mt-10">
    <div class="flex flex-col w-1/2">
        <div class="form-group flex justify-between w-full mr-[10px]">
            <div class="form-group flex flex-col w-full mr-[10px]">
               
                <div class="flex">
                    <label for="" class="text-[14px]"> ফাইল আপলোড </label>
                    <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                </div>
                <label for="file" class="blcok w-[136px] h-[110px] border-2 mt-3 border-gray-300  flex items-center justify-center @error('video_file') error @enderror">
                    <input type="file" id="file" name="video_file" class="hidden">
                    <img src="{{ asset('media/icon/file-upload.png') }}" alt="">
                </label>
                
                @error('video_file')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div>
        </div> 
    </div>
    <div class="flex justify-between w-1/2">
        <div id="video" class="hidden w-1/2 ml-2">
            @if ($post->file_url)
                <video class="w-full h-full" controls>
                    <source src="{{ asset($post->file_url) }}" id="video_here">
                    Your browser does not support HTML5 video.
                </video> 
            @else
            <div class="w-32 h-20">
                <iframe src="{{ $post->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            @endif
            
        </div>
    </div>    
</div>
<div id="progress" class="mb-1 mt-3 text-base font-medium pr-[100px]"> </div>
    <div class="w-full rounded-full h-2.5 mb-4">
    <div id="width" class="bg-orange-500 h-2.5 rounded-full mr-20" style="width:0%"></div>
</div>

<div class="errors">
                    
</div>

<input type="hidden" name="post_type" value="VIDEO">
<input type="hidden" name="old_video_file" value="{{ $post->file_url }}">

<div class="w-full form-group flex mt-10">
    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green capitalize"> {{ $button_text }} </button>
</div>