<div class="form-group flex flex-col w-full">
    <div class="flex">
        <label for="input_title">  ইনপুট শিরোনাম </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input id="input_title" type="text" class="outline-none mt-3 @error('input_title') error @enderror" placeholder="শিরোনাম"
    value="{{ old('input_title',$newspaper_clearenc->input_title) }}" name="input_title">
    @error('input_title')
        <p class="text-red-500">{{$message }}</p>
    @enderror
</div>

<div class="form-group flex flex-col w-full mt-10">
    
    <div class="flex">
        <label for="input_name"> ইনপুট নাম  </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    <input id="input_name" type="text" class="outline-none mt-3 @error('input_name') error @enderror" placeholder="ইনপুট_নাম "
    value="{{ old('input_name',$newspaper_clearenc->input_name) }}" name="input_name">
    @error('name')
        <p class="text-red-500">{{$message }}</p>
    @enderror
</div>

<div class="form-group flex flex-col w-full mt-6">
    
    <div class="flex">
        <label for="input_position"> পসিশন </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    <input id="input_position" type="text" class="outline-none mt-3 @error('input_position') error @enderror"  placeholder="1,2,3,4....." 
    value="{{ old('input_position',$newspaper_clearenc->input_position) }}" name="input_position">
    
    @error('input_position')
        <p class="text-red-500">{{$message }}</p>
    @enderror
</div>

<div class="form-group flex flex-col w-full mt-6 selected">
    <label for="need_file" class="flex input-checkbox items-center text-[9px] font-[600px] leading-[21px]"> 
        <input type="checkbox" value="file" id="need_file" name="need_file"
        {{  ($newspaper_clearenc->need_file == 'file' ? ' checked' : '') }}> 
        <span class="checkmark mt-2"></span> 
        <span class="text-[14px] -ml-2"> আপলোড বাটন </span>    
    </label>  
</div>

<div class="w-full form-group flex mt-10">
    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green capitalize"> {{ $button_text }} </button>
</div>