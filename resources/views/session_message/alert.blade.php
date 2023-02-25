<div id="alert-message" class="fixed top-4 right-4">
    @if (session('message'))
    <div class="px-10 py-3 bg-green-800">
        <p class="text-white font-[600] text-[20px] leading-5"> {{ Session::get('message') }}</p>
    </div>
    @endif

    @if (session('edit'))
    <div class="px-10 py-3 bg-blue-800">
        <p class="text-white font-[600] text-[20px] leading-5"> {{ Session::get('edit') }}</p>
    </div>
    @endif

    @if (session('alert'))
    <div class="px-10 py-3 bg-red-800">
        <p class="text-white font-[600] text-[20px] leading-5"> {{ Session::get('alert') }}</p>
    </div>
    @endif
    
</div>