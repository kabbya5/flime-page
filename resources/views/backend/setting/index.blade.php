@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-[500] text-[30px] text-black leading-[20px]"> Setting </h2>
    </div>

    <div class="mt-[40px]">
        <div class="md:w-[700px] mt-10">
            <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class="form-group flex flex-col">
                    <div class="flex">
                        <label for="page_name"> পেজ নাম </label>
                        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                    </div>
                    
                    <input type="text" class="outline-none mt-3 @error('page_name') error @enderror" placeholder="পেজ নাম"
                    name="page_name" value="{{ old('page_name',$setting->page_name) }}">
                
                    @error('page_name')
                            <p class="mt-2 text-red-500">{{ $message }}</p>    
                    @enderror
                </div>

                <div class="form-group flex flex-col mt-10">
                    <div class="flex">
                        <label for="title"> নাববার টাইটেল </label>
                        <img class="ml-1 h-2" src="{{ asset('media/icon/mandatory.png') }}" alt="">
                    </div>
                    
                    <input type="text" class="outline-none mt-3 @error('title') error @enderror" placeholder="নাববার টাইটেল"
                    name="title" value="{{ old('title',$setting->title) }}">
                
                    @error('title')
                            <p class="mt-2 text-red-500">{{ $message }}</p>    
                    @enderror
                </div>

                <div class="form-group flex justify-between mt-10">
                    <div class="flex flex-col w-1/2">
                        <div class="form-group flex justify-between w-full mr-[10px]">
                            <div class="form-group flex flex-col w-full mr-[10px]">
                                <label for="" class="text-[14px]"> টাইটেল থাম্বনেইল আপলোড </label>
                
                                <label for="title_image" class="blcok w-[146px] h-[110px] mt-3 border-2 border-gray-300  flex items-center justify-center @error('thumbnail') error @enderror">
                                    <input type="file" name="title_image" id="title_image" class="hidden">
                                    <img class="image-upload-icon" src="{{ asset('media/icon/image-upload.png') }}" alt="">
                                </label>
                                
                                @error('title_image')
                                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>
                            <div class="form-group flex flex-col w-full mr-[10px]">
                                <label for="" class="text-[14px]"> লিংক থাম্বনেইল আপলোড </label>
                        
                                <label for="share_image" class="blcok w-[136px] h-[110px] border-2 mt-3 border-gray-300  flex items-center justify-center @error('video_file') error @enderror">
                                    <input type="file" id="share_image" name="share_image" class="hidden">
                                    <img src="{{ asset('media/icon/file-upload.png') }}" alt="">
                                </label>
                                
                                @error('share_image')
                                        <p class="mt-2 text-red-500">{{ $message }}</p>    
                                @enderror
                            </div>
                        </div> 
                    </div>
                    <div class="flex items-center justify-between w-1/2">
                        <div class="file-preview w-1/2 mr-2">
                            <div id="image-holder-title">
                                <img src="{{ asset($setting->title_image) }}" class="thumb-image w-[120px] h-[160px]">
                            </div>
                        </div>
                        <div class="file-preview w-1/2 ml-2">
                            <div id="image-holder-share">
                                <img src="{{ asset($setting->share_image) }}" class="thumb-image w-[120px] h-[160px]">
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="form-group flex flex-col mt-10">
                    <label for="phone">SEO content </label>
                   <textarea name="seo_content" cols="30" rows="10" class="outline-none mt-3 @error('seo_content') error @enderror
                   bg-transparent border-2 border-gray-300"
                   >
                    {{ old('seo_content',$setting->seo_content) }}
                   </textarea>
              
                    @error('seo_content')
                            <p class="mt-2 text-red-500">{{ $message }}</p>    
                    @enderror
                </div>

                <div class="form-group flex flex-col mt-10">
                    <label for="phone">SEO content </label>
                   <textarea name="seo_tag" cols="30" rows="10" class="outline-none mt-3 @error('seo_tag') error @enderror
                   bg-transparent border-2 border-gray-300"
                   >
                    {{ old('seo_tag',$setting->seo_tag) }}
                   </textarea>
              
                    @error('seo_tag')
                            <p class="mt-2 text-red-500">{{ $message }}</p>    
                    @enderror
                </div>

                <button type="submit" class="my-2 btn-gradient-pink mt-10"> যোগ করুন </button>
            </form>
        </div>
    </div>
   
</div>

@endsection

@section('script')
<script>
    // upload image preview  
    $("#title_image").on('change', function () {
    
        if (typeof (FileReader) != "undefined") {
    
            var image_holder = $("#image-holder-title");
            image_holder.empty();
    
            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image w-[120px] h-[160px]"
                }).appendTo(image_holder);
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });

    $("#share_image").on('change', function () { 
        if (typeof (FileReader) != "undefined") {
    
            var image_holder = $("#image-holder-share");
            image_holder.empty();
    
            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image w-[120px] h-[160px]"
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