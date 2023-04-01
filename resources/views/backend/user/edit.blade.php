@extends('backend.layout')

@section('content')
<div class="mt-10 md:mt-58">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> যোগ করুন  </h2>
        <a href="{{ route('admin.users.index') }}" class="btn-gradient-green">
            সকল ইউজার
        </a>
    </div>

    <form action="{{route('admin.users.update',[$user->slug,$user->id]) }}" method="POST"
        class="profile container mx-auto">
        @csrf
        @method('PUT')
        
            
            <div class="w-full md:w-1/2 mt-[60px] pb-[88px]">
                <div class="w-full form-group flex flex-col mt-10">
                    <label for=""> নাম </label>
                    <input type="text" class="w-full outline-none mt-3 @error('name') border-red-500 @enderror" placeholder="আব্দুর রহিম"
                    name="name" value="{{ old('name',$user->name) }}">
        
                    @error('name')
                            <p class="mt-2 text-red-500 ">{{ $message }}</p>    
                    @enderror
                </div>

                <div class="form-group flex flex-col mt-10">
                <label for=""> ইমেইল </label>
                <input type="text" class="outline-none mt-3 @error('email') border-red-500 @enderror" placeholder="abdurahim_demo@gmail.com" disabled
                name="email" value="{{ old('email',$user->email) }}">

                @error('email')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div>
            <div class="form-group flex flex-col mt-10">
                <label for="phone"> মোবাইল নাম্বার </label>
                <input type="text" class="outline-none mt-3 @error('phone') border-red-500 @enderror" placeholder="০১২ ১২৩৪ ৫৬৭৮"
                name="phone" value="{{ old('phone',$user->phone) }}">

                @error('phone')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div>

            <div class="form-group flex flex-col mt-10">
                <label for="user_type"> সিলেটে ইউজার টাইপ </label>
            
                <select name="user_type" id="section" class="dropdown  py-3 px-4  border border-[#B0B0B0] focus:outline-none mt-3">
                    <option value="user" {{ ($user->user_type === old('user_type','user')) ? 'selected' : ' ' }}> User </option>
                    <option value="admin" {{ ($user->user_type === old('user_type','admin')) ? 'selected' : ' '}} class="dropdown"> Admin </option>       
                </select>
                @error('section_id')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div>

            <div class="flex mt-10">
                <button type="submit" class="font-700 py-2 px-8 text-[18px] leading-[27px] text-white btn-gradient-pink"> সেভ করুন </button>
            </div>
     </form>
</div>

@endsection