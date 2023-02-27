@extends('backend.layout')

@section('content')

<div class="mt-10 md:mt-[58px]">
    <div class="flex items-center justify-between">
        <h2 class="font-700 text-[30px] text-black leading-[20px]"> যোগ করুন  </h2>
        <a href="{{ route('admin.media.registereds.index') }}" class="btn-gradient">
            সব  নিবন্ধিত পত্রিকা
        </a>
    </div>
    <div class="md:w-[500px] mt-10 md:mt-[60px] py-10 md:py-[50px] px-4">
        <form id="fileUploadForm" action="{{ route('admin.media.registereds.update',$registered->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            @include('backend.media_registration._form',['model'=> $registered, 'button_text' => 'যোগ করুন'])
        </form>
    </div>
</div>

@endsection

@section('script') 
<script type="text/javascript"  src="{{ asset('js/jquery-1.7.js') }}"></script>
<script type="text/javascript"  src="{{ asset('js/jquery_form.js') }}"></script>
<script>

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
                    alert('Successfully Updated!');
                    $('#progress').text('')
                    $('#width').css("width", 0, function() {
                    return $(this).attr("aria-valuenow", 0) + 0;
                    window.location.href = '/admin/admin/media/registereds';
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