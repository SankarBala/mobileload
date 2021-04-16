<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="{{ asset('frontend/images/favicon.png') }}" rel="icon" />
    <title> @yield('title') </title>
    <meta name="description" content="Quickai - Recharge & Bill Payment, Booking HTML5 Template">
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/vendor/owl.carousel/assets/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/stylesheet.css') }}" />
    @stack('style')
</head>

<body>

    <!-- Preloader -->
    {{-- <div id="preloader">
        <div data-loader="dual-ring"></div>
    </div> --}}
    <!-- Preloader End -->

    <!-- Document Wrapper -->
    <div id="main-wrapper">

        <!-- Header -->
        <x-header />
        <!-- Header end -->

        <!-- Content -->
        @yield('content')
        <!-- Content end -->

        <!-- Footer -->
        <x-footer />
        <!-- Footer end -->

    </div>
    <!-- Document Wrapper end -->

    <!-- Back to Top -->
    <a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i
            class="fa fa-chevron-up"></i></a>
    <!-- Back to Top End -->

    <!-- Modals -->
    <x-modal.login />
    <x-modal.register />
    <x-modal.forgot-password />
    <x-modal.otp />
    <x-modal.view-plan />
    <!-- Modals end -->

    <!-- Script -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/theme.js') }}"></script>
    @stack('script')
</body>

</html>
