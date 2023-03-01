@extends('backend.layout')

@section('content')

<div class="mt-10 md:mt-58">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> যোগ করুন  </h2>
        <a href="{{ route('admin.video.posts.index') }}" class="btn-gradient-pink">
            সব চলচ্চিত্র
        </a>
    </div>
    <div class="bg-white mt-10 md:mt-[100px] py-10 md:py-[50px] px-4 md:mx-auto shadow-lg border-1">
        <form id="fileUploadForm" action="{{ route('admin.video.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" class="md:w-[700px]">
            @csrf 
            @method('PUT')
            @include('backend.video_post._form',['model'=> $post, 'button_text' => 'এডিট করুন'])
        </form>
    </div>
</div>

@endsection

@section('script') 
<script type="text/javascript"  src="{{ asset('js/jquery-1.7.js') }}"></script>
<script type="text/javascript"  src="{{ asset('js/jquery_form.js') }}"></script>
<script>
$(document).ready(function(){
    $("#image-holder img").removeClass('hidden');
    $('#video').removeClass('hidden');
})


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

// file change 

$(document).on("change", "#file", function(evt) {
    $('#video').removeClass('hidden');
    var $source = $('#video_here');
    $source[0].src = URL.createObjectURL(this.files[0]);
    $source.parent()[0].load();
});

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