<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="David Damanga | Online Store">
        <meta name="keywords" content="African wax print fabric, Men African wear, Women African wear, African Clothings">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles/bootstrap4/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles/social.css') }}">
        <link href="{{ asset('public/css/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/plugins/OwlCarousel2-2.2.1/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles/main_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles/options.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles/responsive.css') }}">
        <script src="{{ URL::asset('public/js/jquery-3.2.1.min.js') }}"></script> 
        
    </head>
    <body>
        <style>
        body {
        background-color: #fff;
        color: #666;
        font-family: 'Open Sans', sans-serif;
        font-size: 62.5%;
        margin: 0 auto;
    }    
        </style>
        <div class="super_container">
            <!-- Header -->
            @include('includes.header')
            <!-- End Header -->            
            @yield('content') 
            <!-- Modal -->
            <div id="cartModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class='col-12 modal-title text-center'>
                                Cart Items
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </h3>
                        </div>
                        <div class="modal-body cart-content">

                        </div>
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>-->
                            <button type="submit" class="btn btn-success btn-lg">BUY</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Footer -->
            @include('includes.footer')           
            <!-- End Footer -->
        </div>

        <script src="{{ URL::asset('public/js/popper.js') }}"></script>
        <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('public/js/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ URL::asset('public/js/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
        <script src="{{ URL::asset('public/js/plugins/easing/easing.js') }}"></script>
        <script src="{{ URL::asset('public/js/custom.js') }}"></script>

        <script>

$(document).ready(function () {
    $(document).on("click", ".buy-now", function (e) {
        e.preventDefault();
        $("#regModal").modal('hide');
        $("#loginModal").modal();
    });

    $(document).on("click", ".reg", function () {
        $("#loginModal").modal('hide');
        $("#regModal").modal();
    });

    $(".linkfeat").hover(
            function () {
                $(".textfeat").show(500);
            },
            function () {
                $(".textfeat").hide(500);
            }
    );

    $(document).on("click", ".car-item", function (e) {
        //e.preventDefault();
        //$("#cartModal").modal();
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
            url: "{{ url('/cart/item') }}",
            type: 'GET',
            //cache: false,
            datatype: 'html',
            beforeSend: function () {
                //something before send
            },
            success: function (data) {
                alert(data);
                $(".cart-content").html(data);
            },
            error: function (xhr, textStatus, thrownError) {
                alert(xhr + "\n" + textStatus + "\n" + thrownError);
            }
        });

    });

});
        </script>

        <script>

            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-136341171-1');
        </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('PLACES_API')}}&libraries=places&callback=initAutocomplete" async defer></script>
    </body>

</html>       