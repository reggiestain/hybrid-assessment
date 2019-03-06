<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Colo Shop Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles/bootstrap4/bootstrap.min.css') }}">
        <link href="{{ asset('public/css/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/plugins/OwlCarousel2-2.2.1/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles/main_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles/responsive.css') }}">
    </head>
    <body>
        <div class="super_container">
            <!-- Header -->
            @include('includes.header')
            <!-- End Header -->            
            @yield('content') 
            <!-- Footer -->
            @include('includes.footer')           
            <!-- End Footer -->
        </div>
        <script src="{{ ('public/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ ('public/js/popper.js') }}"></script>
        <script src="{{ ('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ ('public/js/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ ('public/js/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
        <script src="{{ ('public/js/plugins/easing/easing.js') }}"></script>
        <script src="{{ ('public/js/custom.js') }}"></script>
        <script>
$(document).ready(function () {
    $(document).on("click", ".login", function () {
        $("#regModal").modal('hide');
        $("#loginModal").modal();
    });

    $(document).on("click", ".reg", function () {
        $("#loginModal").modal('hide');
        $("#regModal").modal();
    });
});
        </script>
    </body>

</html>       