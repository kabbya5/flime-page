@extends('backend.layout')
@section('content')

<div class="pt-[72px] pb-[49px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]">প্রকাশনা</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn-gradient-pink">
            যোগ করুন
        </a>
    </div>

    {{--  data  --}}
    <div class="mt-[60px]">
        <div class="mt-[29px] data-table"> 
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gradient-red">
                        <tr>
                            <th align="left" class="py-[18px] px-3 font-700 text-white text-[13px] leading-[18px]"> নাম </th>
                            <th align="left" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> সেকশন    </th>
                            <th align="left" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> সাব সেকশন </th>
                            <th align="center" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> প্রকাশের তারিখ  </th>
                            <th align="left" class="py-[18px] px-2 font-700 text-white text-[13px] leading-[18px]"> অবস্থা</th>
                            <th align="center"></th>
                        </tr>
                    </thead>
                    <tbody id="data-wrapper">
                        @foreach ($posts as $post)
                            <tr tabindex="0" class="panding focus:outline-none border-t border-gray-200 rounded mt-[3px]">
                                <td>
                                    <div class="ml-3 flex items-center py-[24px]">
                                        <p class="font-700 text-[14px] leading-[21px] text-black">{{ $post->post_name }}</p>
                                    </div>
                                </td>
                                <td class="text-left px-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]"> {{ $post->section->section_name }}</p>
                                </td>
                                <td class="text-left px-2">
                                    <p class="font-[600] text-[14px] leading-[21px] text-[#8E8E93]">{{ $post->subsection->subsection_name }}</p>
                                </td>   
                                <td class="text-center px-2">
                                    <span class="panding font-[600] text-[14px] leading-[21px]] w-[82px] py-1"> {{ $post->post_date }} </span>
                                </td>
                                <td class="text-center px-2">
                                    <span class="panding font-[600] text-[14px] leading-[21px]] w-[82px]"> {!! $post->publicationLabel() !!} </span>
                                </td>
                                <td class="text-right px-2">             
                                    <div id="doropdown-toggoler" class="w-full pr-[22px] relative flex flex-col ">
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>
                                        <span class="mb-[5px] bg-[#D8D8D8] w-[4px] h-[4px]"> </span>

                                        <div class="shadow-lg dropdown-items absolute hidden left-[-160px] top-[-10px]">
                                            <a href="{{ route('admin.posts.edit',$post->slug) }}" class="btn text-[#2518FF] border-b flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/edit.png') }}" alt="" class="mr-[10px] h-[18px]"> edit
                                            </a>

                                            <a href="{{ route('admin.posts.duplicate',$post->slug) }}" class="btn border-1 text-[#565956] flex items-center capitalize font-[600] text-[18px] leading-7">
                                                <img src="{{ asset('media/icon/duplicate.png') }}" alt="" class="mr-[10px] h-[18px]"> duplicate
                                            </a>

                                            <form action="{{ route('admin.posts.destroy',$post->slug) }}" method="POST">
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
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="https://malsup.github.io/jquery.form.js"></script> 
<script>

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
        alert('dkslkd');
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