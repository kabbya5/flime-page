<div class="form-group flex flex-col">
    <div class="flex">
        <label for="phone"> বইয়ের নাম </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('বইয়ের_নাম') error @enderror" placeholder="বইয়ের নাম"
    name="বইয়ের_নাম" value="{{ old('বইয়ের_নাম',$bibliograpy->বইয়ের_নাম) }}">

    @error('বইয়ের_নাম')
        <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone"> লেখকের নাম </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('লেখকের_নাম') error @enderror" placeholder="লেখকের নাম"
    name="লেখকের_নাম" value="{{ old('লেখকের_নাম',$bibliograpy->লেখকের_নাম) }}">

    @error('লেখকের_নাম')
        <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone"> প্রকাশকের_নাম_ও_ঠিকানা </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('প্রকাশকের_নাম_ও_ঠিকানা') error @enderror" placeholder="প্রকাশকের নাম_ও_ঠিকানা"
    name="প্রকাশকের_নাম_ও_ঠিকানা" value="{{ old('প্রকাশকের_নাম_ও_ঠিকানা',$bibliograpy->প্রকাশকের_নাম_ও_ঠিকানা) }}">

    @error('প্রকাশকের_নাম_ও_ঠিকানা')
        <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone"> প্রথম_প্রকাশ</label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('প্রথম_প্রকাশ') error @enderror" placeholder="প্রথম_প্রকাশ"
    name="প্রথম_প্রকাশ" value="{{ old('প্রথম_প্রকাশ',$bibliograpy->প্রথম_প্রকাশ) }}">

    @error('প্রথম_প্রকাশ')
        <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone"> জমাদানের_তারিখ </label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('জমাদানের_তারিখ') error @enderror" placeholder="জমাদানের_তারিখ"
    name="জমাদানের_তারিখ" value="{{ old('জমাদানের_তারিখ',$bibliograpy->জমাদানের_তারিখ) }}">

    @error('জমাদানের_তারিখ')
        <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="form-group flex flex-col mt-10">
    <div class="flex">
        <label for="phone"> পুস্তকের_ধরণ</label>
        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
    </div>
    
    <input type="text" class="outline-none mt-3 @error('পুস্তকের_ধরণ') error @enderror" placeholder="পুস্তকের_ধরণ"
    name="পুস্তকের_ধরণ" value="{{ old('পুস্তকের_ধরণ',$bibliograpy->পুস্তকের_ধরণ) }}">

    @error('পুস্তকের_ধরণ')
        <p class="mt-2 text-red-500">{{ $message }}</p>    
    @enderror
</div>

<div class="w-full form-group flex mt-10">
    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient"> {{ $button_text }} </button>
</div>