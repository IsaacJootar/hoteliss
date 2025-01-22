<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-wide " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="front-pages" data-style="light">

<head>
  <meta charset="utf-8') }}" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0') }}" />

  <title>Search Reservations</title>


  <meta name="description" content="Start your development with a Dashboard for Bootstrap 5') }}" />
  <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://1.envato.market/vuexy_admin">


  <!-- Favicon -->
  <link rel="icon" type="image/x-icon"
    href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">


  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />


  <!-- Core CSS -->

  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css" class="template-customizer-core-css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page.css') }}" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/rateyo/rateyo.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/%40form-validation/form-validation.css') }}" />

     <!-- flatpickr CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />

  <!-- Page CSS -->

  <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/wizard-ex-checkout.css') }}" />

  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('assets/js/front-config.js') }}"></script>
@php
    use Carbon\Carbon;
@endphp

</head>

<body>



  <script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>

  <!-- Search Navbar: Start -->
    <livewire:layout.search-navbar />
  <!-- Navbar: End -->

  <!-- Room Serach Sections:Start -->
    {{ $slot }}

  <!-- / Room Search Sections:End -->

  <!-- Footer: Start -->
    <livewire:layout.search-footer />
  <!-- Footer: End -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->


  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <!-- flatpickr date picker -->
  <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/rateyo/rateyo.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/%40form-validation/popular.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/%40form-validation/auto-focus.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('assets/js/front-main.js') }}"></script>


  <!-- Page JS -->

  <script src="{{ asset('assets/js/modal-add-new-address.js') }}"></script>
  <script src="{{ asset('assets/js/wizard-ex-checkout.js') }}"></script>


 <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <!-- Page JS for forms-pickers.js-->
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers2.js') }}"></script>




</body>

</html>

<!-- beautify ignore:end -->
