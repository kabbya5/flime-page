@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> চলচ্চিত্র </h2>
        <a href="{{ route('admin.video.posts.create') }}" class="btn-gradient-pink">
            যোগ করুন
        </a>
    </div>

    {{-- <!-- data  --> --}}
    <div class="mt-[60px]">
        <div class="mt-[29px] data-table"> 
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gradient-red">
                        <tr>
                            <th align="left" class="py-[18px] px-3 font-700 text-white text-[13px] leading-[18px]"> নাম </th>
                            <th align="left" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> সেকশন    </th>
                            <th align="left" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> সাব সেকশন </th>
                            <th align="left" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> আইটেম টাইপ  </th>
                            <th align="left" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> প্রকাশের তারিখ  </th>
                            <th align="left" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> অবস্থা</th>
                            <th align="center"></th>
                        </tr>
                    </thead>
                    <tbody id="data-wrapper">
                        @foreach ($posts as $post)
                            <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                <td>
                                    <div class="ml-5 flex items-center py-[24px]">
                                        <p class="font-700 text-[14px] leading-[21px] text-black">{{ $post->post_name }}</p>
                                    </div>
                                </td>
                                <td class="text-left px-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]"> {{ $post->section->section_name }}</p>
                                </td>
                                <td class="text-left px-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">সচিত্র বাংলাদেশ</p>
                                </td>
                                <td class="text-center px-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $post->post_type }}</p>
                                </td>
                                <td class="text-center px-2">
                                    <span class="panding font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> {{ $post->published_at }} </span>
                                </td>
                                <td class="text-center px-2">
                                    <span class="panding font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> {{ $post->status }} </span>
                                </td>
                                <td class="text-right px-2">             
                                    <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                        <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                            <a href="{{ route('admin.video.posts.edit',[$post->slug,$post->id]) }}" class="btn text-[#2518FF] border-b flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/edit.png') }}" alt="" class="mr-[10px] h-[18px]"> edit
                                            </a>

                                            <a href="{{ route('admin.video.posts.duplicate',[$post->slug,$post->id]) }}" class="btn border-1 text-[#565956] flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/duplicate.png') }}" alt="" class="mr-[10px] h-[18px]"> duplicate
                                            </a>

                                            <form action="{{ route('admin.video.posts.destroy',$post->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")

                                                <button type="submit" onclick="return confirm('Locate the data you want to delete ?')" 
                                                    class="btn border-b text-[#565956] flex items-center capitalize font-[600] text-[18px] leading-7">
                                                    <img src="{{ asset('media/icon/delete.png') }}" alt="" class="mr-[10px] h-[18px]"> Delete
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <div class="my-20">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        </div>

    </div>


    {{-- form Modal --}}

    {{-- <div class="fixed hidden fixed-content form w-full bg-gray-800/80 z-50">
        <div class="bg-white border w-[800px] mx-auto p-[47px] relative">
            <button id="cancle-post-create-btn" class="absolute -top-4 -right-3 w-10 h-10 rounded-full bg-white
                        trasition duration-300 hover:text-white hover:bg-black shadow-md">
                <i class="fa-solid fa-xmark"> </i>
            </button>
            <form id="fileUploadForm" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    
                        <select name="section_id" id="section" class="dropdown py-2 px-4 w-full mt-3 border border-[#B0B0B0] focus:outline-none pr-4 @error('post_title') error @enderror">
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
                    
                        <select name="subsection_id" id="subsection_id" class="dropdown py-2 px-4 w-full mt-3 border border-[#B0B0B0] focus:outline-none @error('post_title') error @enderror">
                            <option value=""  selected> সাব সেকশন </option>
                            
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
                        <label for="post_title"> সংখ্যা  </label>
                        <input type="text" class="outline-none mt-3 @error('post_title') error @enderror" placeholder="সংখ্যা "
                        name="post_title" value="{{ old('post_title',$post->post_title) }}">
                    
                        @error('post_title')
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
    
                <div class="form-group flex justify-between mt-10">
                    <div class="form-group flex flex-col pr-[10px] w-1/2">
                        <label for="editorial_associate"> সম্পাদকীয় সহযোগী </label>
                        <textarea name="editorial_associate" id="" cols="30" rows="7" class="mt-3 border-2 border-gray-300 focus:outline-none @error('editorial_associate ') error @enderror">
                        {{ old('editorial_associate',$post->editorial_associate) }}

                        </textarea>
                                
                        @error('editorial_associate')
                                <p class="mt-2 text-red-500">{{ $message }}</p>    
                        @enderror
                    </div>
                    
                    <div class="flex flex-col w-1/2">
                        <div class="form-group  flex w-full  ml-[10px]">
                            <div class="form-group flex flex-col w-full mr-[10px]">
                                <label for="" class="text-[14px]"> থাম্বনেইল আপলোড </label>
    
                                <label for="thumbnail" class="blcok w-[146px] h-[110px] mt-3 border-2 border-gray-300  flex items-center justify-center @error('thumbnail') error @enderror">
                                    <input type="file" name="thumbnail" id="thumbnail" class="hidden">
                                    <img class="image-upload-icon" src="{{ asset('media/icon/image-upload.png') }}" alt="">
                                    <div id="image-holder"> </div>
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
                </div>

                <div class="errors">
                    
                </div>

                <input type="hidden" name="post_type" value="PDF">
    
                <div class="w-full form-group flex mt-10">
                    <button type="submit" class="w-full py-2 md:py-3 text-center btn-gradient-green capitalize"> create post </button>
                </div>
                
            </form>
        </div>
    </div>  --}}
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="https://malsup.github.io/jquery.form.js"></script> 
<script>

    // //auto load 
    // let ENDPOINT = "{{url('/')}}";
    // let page = 1;

    // loadMore(page);
    // $(window).scroll(function(){
    //     if($(window).scrollTop() == $(document).height() - $(window).height())
    //     {
    //         page++;
    //         loadMore(page);
    //     }
    // });

    // function loadMore(page){
    //     $.ajax({
    //         url: ENDPOINT + "/admin/posts?page=" + page,
    //         dataType:'html',
    //         type:'get',
    //         // beforSend:function(){
    //         //     $('.auto-load').show();
    //         // }
    //     })
    //     .done(function (response) {
    //         if(response.length == 0){
    //             // $('.atuo-load').html("We don't have more data to display:");
    //             return;
    //         }
    //         // $('.auto-load').hide();
    //         $('#data-wrapper').append(response);
    //     })
    //     .fail(function (jqXHR, ajaxOptions, thrownError) {
    //         console.log(thrownError);
    //     });
    // }

    $('#section').change(function(){
        let id = $(this).val();
        let url = "{{route('admin.posts.getsubsection' , ":id")}}";
        url = url.replace(':id', id);
        
        if(id){
            $.ajax({
                url:url,
                dataType:"json",
                type:'get',

                success: function (data) {
                    $.each(data, function (key, value) {
                        $('#subsection_id').append('<option value=" ' + value.id + '">' + value.subsection_name + '</option>');
                    })
                }

            })
        }
    })

    // upload image preview 

    $("#thumbnail").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $('.image-upload-icon').hide();
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image w-[60px] h-[45px]"
                }).appendTo(image_holder);


            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });

    $('#file').change(function(){
        var filename = $('#file').val().replace(/C:\\fakepath\\/i, '')
        $('#file_name').text(filename);
    })

    $(function () {
            $(document).ready(function () {
                $('#fileUploadForm')[0].reset();
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        $('.errors').text('');
                        var percentage = '0';
                        $('#progress-bar').show()
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('#progress').text(percentage+'%')
                        $('#width').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },

                    success:function(data){
                        $('#file_name').text(' ');
                            $('.form').toggleClass('show');
                            alert('File has uploaded');
                            $('#progress').text('')
                            $('#width').css("width", 0, function() {
                            return $(this).attr("aria-valuenow", 0) + 0;
                        })
                    },

                    error: function(xhr){
                        $('.errors').append(xhr.responseText);
                    }
                });
            });
        });
</script>

@endsection