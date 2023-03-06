@extends('layouts.app')

@section('style')
form{
    background-color: transparent !important;
    border: none !important;
}
@endsection

@section('content')


<!-- hero  -->
<div class="hero">
    <div class="flex flex-col-reverse justify-center  md:flex-row md:justify-between items-center">
       <img class="w-full h-full" src="{{ asset('image/Banner.png') }}" alt="">
    </div>
</div>

<div class="my-[100px] px-2 md:px-4 lg:px-2">
    <div class="container mx-auto">
        <h2 class="px-4 mb-5 font-700 md:text-[22px] text-[#4801FF] leading-67"> সচিত্র বাংলাদেশ, মাসিক নবারুণ ও বাংলাদেশ কোয়ার্টারলিতে লেখা  জমা দিন </h2>
        <form method="post" action="{{ route('user.file.store') }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
            @csrf
            <div class="flex flex-wrap justify-center lg:flex-nowrap lg:justify-between">
                <select name="subsection_name" class="dropdown mb-5 py-2 px-4 w-[419px] bg-[#F2F2F2] border border-[#B0B0B0] focus:outline-none pr-4">
                   @foreach ($section->subsections as $item)
                   <option value="{{ $item->subsection_name }}" class=""> {{ $item->subsection_name }} </option>
                   @endforeach 
                </select>
                <input type="text" class="mb-5 ml-[19px] py-2 px-4 w-[419px] bg-[#F2F2F2] border border-[#B0B0B0] focus:outline-none"
                    placeholder="বিষয়" name="subject">
                <input type="text" class="mb-5 ml-[19px] py-2 px-4 bg-[#F2F2F2] border border-[#B0B0B0] focus:outline-none"
                    placeholder="সংখ্যা ২০২৩" name="date">
            </div>
        </form>
    </div>
</div>

    
@endsection

@section('script')
<script src="{{ asset('js/dropzone.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" type="text/css" />
<script type="text/javascript">
Dropzone.options.dropzone =
    {
    maxFilesize: 12,
    renameFile: function(file) {
        var dt = new Date();
        var time = dt.getTime();
        return time+file.name;
    },
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,",
    addRemoveLinks: true,
    timeout: 5000,
    success: function(file, response) 
    {
        alert('The file has been Successfully Upload');
    },
    error: function(file, response)
    {
        alert('please fill in this field');
    }
};
$(document).ready(function(){
    $('.dz-button').addClass("mt-[30px] flex flex-col items-center justify-center h-[200px] md:h-[346px]");
    $('.dz-button').empty();
    $('.dz-button').append(
        '<img class="w-[88px] h-[88px]" src="/image/bg-upload.png">' +
        '<P class="mt-[36px] text-[#454444] text-sm md:text-[21px] font-[500] leading-[31px]"> ক্লিক করুন অথবা আপনার ফাইলটি টেনে এখানে ছেড়ে দিন</P>'
    );
});

</script>
@endsection