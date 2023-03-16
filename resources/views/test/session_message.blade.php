



<div id="alert-message" class="position-fixed top-0 end-0">
    @if (session('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    
</div>