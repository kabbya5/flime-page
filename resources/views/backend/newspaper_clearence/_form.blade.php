<div class="form-group flex flex-col w-full">
    <label for="input_name">  নাম  </label>
    <input id="input_name" type="text" class="outline-none mt-3 @error('input_name') error @enderror" placeholder="নাম"
    value="{{ old('input_name',$newspaper_clearenc->input_name) }}" name="input_name">
    @error('input_name')
        <p class="text-red-500">{{$message }}</p>
    @enderror
</div>

<div class="form-group flex flex-col w-full mt-6">
    <label for="input_position"> নাম  পসিশন </label>
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