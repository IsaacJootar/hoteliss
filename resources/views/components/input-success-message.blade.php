
<!-- Action status Message from session -->

@if (session()->has('status'))
    @php
    toastr()->success( session('status')) // pass default laravel messages to the toastr Librabry too
    @endphp

@endif
