
<!-- Errors Message from session -->
 @if ($errors->any())
    <br>
        @foreach ($errors->all() as $error)
                @php
                     toastr()->warning($error) // pass error(s) to the toastr Library
                @endphp


        @endforeach


@endif

