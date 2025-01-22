<!-- Custom error Message from session -->

<div style="text-align: center" ><!-- handle custom  errors thrown by custom exceptions -without toasts Library for now -->
    @if (session()->has('error-message'))
        <div class="alert alert-outline-danger" role="alert">
            {{ session('error-message') }}

        </div>
    @endif
</div>

