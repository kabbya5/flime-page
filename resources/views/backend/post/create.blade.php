@extends('backend.layout')

@section('content')

<div class="mt-10 md:mt-[58px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> যোগ করুন  </h2>
        <a href="{{ route('admin.posts.index') }}" class="btn-gradient-pink">
            সব প্রকাশনা
        </a>
    </div>
    <div class="bg-white mt-10 md:mt-[58px] py-10 md:py-[50px] px-4 md:mx-auto shadow-lg border-1">
        <form id="fileUploadForm" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="md:w-[700px]">
            @csrf 
            @include('backend.post._form')
        </form>
    </div>
</div>
@endsection

@section('script') 
<script type="text/javascript"  src="{{ asset('js/jquery-1.7.js') }}"></script>
<script type="text/javascript"  src="{{ asset('js/jquery_form.js') }}"></script>
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
                $('#subsection_id').empty();
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
        image_holder.removeClass('hidden');
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "thumb-image w-[136px] h-[110px]"
            }).appendTo(image_holder);


        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        alert("This browser does not support FileReader.");
    }
});

// file change 

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