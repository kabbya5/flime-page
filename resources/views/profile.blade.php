@extends('layouts.app')

@section('content')
<!-- profile  -->
<div class="md:mx-10">
    <div class="flex  lg:flex-row lg:justify-between">
        <form action="{{route('user.profile.update') }}" method="POST" enctype="multipart/form-data"
            class="profile pt-[64px] container mx-auto bg-white px-4 md:px-[81px]">
            @csrf
            @method('PUT')
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="img-div relative w-[152px] h-[152px] rounded-full overflow-hidden">
                        <div id="user-image">
                            @if ($user->profile_image)
                            <img class="w-full h-full rounded-full" src="{{ asset($user->profile_image)}}" alt="">
                            @else
                            <img class="w-full h-full rounded-full" src="{{ asset('media/icon/user.png')}}" alt="">
                            @endif
                            
                        </div>
                        <label for="image" class="imageEditDiv absolute top-[55%] right-[13px] bg-white w-[50px] h-[50px] p-2 flex items-center justify-center">
                            <img src="{{ asset('media/icon/img-edit.png') }}" alt="">
                            <input type="file" class="hidden" id="image" name="profile_image">
                        </label>
                    </div>
                    <p class="ml-[31px] font-700 text-[30px] leading-[45px] text-black">{{ $user->name }} </p>   
                </div>
            </div>
            
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

            <input type="hidden" name="old_image" value="{{ $user->profile_image }}">

            <div class="flex mt-10">
                <button type="submit" class="font-700 py-2 px-8 text-[18px] leading-[27px] text-white btn-gradient-pink"> সেভ করুন </button>
            </div>
        </form>

        <form class="mt-20" action="{{ route('user.password.update')}}" method="POST">
            @csrf
            @method('PUT')
            <p class="font-700 text-[18px] leading-[45px] text-black"> পাসওয়ার্ড পরিবর্তন করুন  </p> 

            <div class="form-group flex flex-col mt-10">
                <label for=""> কারেন্ট পাসওয়ার্ড </label>
                <input type="password" class="outline-none mt-3 @error('current_password') border-red-500 @enderror" placeholder="পাসওয়ার্ড" 
                name="current_password" value="{{ old('password') }}">
    
                @error('current_password')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div>  
            <div class="form-group flex flex-col mt-10">
                <label for=""> পাসওয়ার্ড </label>
                <input type="password" class="outline-none mt-3 @error('password') border-red-500 @enderror" placeholder="পাসওয়ার্ড" 
                name="password" value="{{ old('password') }}">
    
                @error('password')
                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                @enderror
            </div>
            <div class="form-group flex flex-col mt-10">
                <label for=""> পুনরায় পাসওয়ার্ড </label>
                <input type="password" class="outline-none mt-3" placeholder="পাসওয়ার্ড" name="password_confirmation">  
            </div>
            
            <div class="form-group flex flex-col mt-10">
                <button class="  lg:py-3 text-center text-white btn-gradient-pink"> পাসওয়ার্ড পরিবর্তন করুন </button>  
            </div>
        </form>
    </div>
    
</div>
@endsection

@section('script')
<script>
$("#image").on('change', function () {

if (typeof (FileReader) != "undefined") {

    var image_holder = $("#user-image");
    image_holder.empty();

    var reader = new FileReader();
    reader.onload = function (e) {
        $("<img />", {
            "src": e.target.result,
            "class": "w-full h-full rounded-full"
        }).appendTo(image_holder);


    }
    image_holder.show();
    reader.readAsDataURL($(this)[0].files[0]);
} else {
    alert("This browser does not support FileReader.");
}
});
</script>
@endsection
