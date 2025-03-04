@if ($errors->any())
    @php
        // Combine all errors into a single string
        $errorMessages = implode('<br>', $errors->all());
        toastr()->warning($errorMessages); // Pass all errors at once
    @endphp
@endif
