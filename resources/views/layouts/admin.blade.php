<?php 
use App\Http\Controllers\Auth\ProductController as Product;
?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>David Madanga Administrator</title>
        <meta name="description" content="African wax print fabric, Men African wear, Women African wear, African Clothings">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--<link rel="stylesheet" href="{{asset('public/fonts/font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
        <link rel="stylesheet" href="styles/extras.1.1.0.min.css">       
        <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('public/css/admin/shards-dashboards.1.1.0.min.css') }}">
        <link rel="stylesheet" href="{{asset('public/css/styles/datatable.css')}}">   
        <script async defer src="{{asset('public/js/buttons.js')}}"></script>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                <!-- Main Sidebar -->
                @include('includes.admin.sidebar')
                <!-- End Main Sidebar -->
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    @include('includes.admin.header')
                    <!-- / .main-navbar -->
                    @yield('content') 
                    @include('includes.admin.footer')
                </main>
            </div>
        </div>
        <!--Checkout Modal -->
        <div id="checkModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header text-center">                        
                        <h4 class="modal-title w-100"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="b-msg"></div>
                        <div class="p-content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Discount Modal -->
        <div id="discountModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form id="d-form" method="POST" action="{{ route('product.update') }}">
                <div class="modal-content">
                    <div class="modal-header text-center">                        
                        <h4 class="modal-title w-100">Update Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="d-msg"></div>
                        <div class="d-content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
               </form>
            </div>
        </div>
        <script src="{{ asset('public/js/jquery.3.3.1.js') }}"></script>
        <script src="{{ asset('public/js/popper.js') }}"></script>
        <script src="{{ asset('public/js/datatable.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>        
        <script src="{{ asset('public/js/shared.js') }}"></script>
        <script src="{{ asset('public/js/sharrre.js') }}"></script>

        <script src="{{ asset('public/js/admin/extras.1.1.0.min.js') }}"></script>        
        <script>
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    //datatable
    $('#product').DataTable();
    $('#trans').DataTable();
    //display product
    $(document).on('click', '.p-check', function (event) {
        event.preventDefault();
        $('#checkModal').modal();
        var id = $(this).attr('id');
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
            url: "/guest/product/" + id,
            type: "GET",
            success: function (results, textStatus, jqXHR) {
                $(".p-content").html(results.html);
            },
            error: function (jqXHR, textStatus, errorThrown) {
             alert(errorThrown);
            }
        });
    });
    //Set discount
    $(document).on('click', '.set-discount', function (event) {
        event.preventDefault();
        $('#discountModal').modal();
        var id = $(this).attr('id');
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
            url: "/admin/product/edit/" + id,
            type: "GET",
            success: function (results, textStatus, jqXHR) {
                $(".d-content").html(results.html);
            },
            error: function (jqXHR, textStatus, errorThrown) {
             alert(errorThrown);
            }
        });
    });
    //buy product
    $(document).on('click', '.buy', function (event) {
        event.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
            url: "/guest/buy/" + id,
            type: "GET",
            success: function (results, textStatus, jqXHR) {
                if (results == true) {
                    $(".b-msg").html('<div class="alert alert-success alert-dismissible">\n\
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n\
                                     <strong>Success!</strong> Thank you for buying from us.');
                    // redirect to google after 5 seconds
                    window.setTimeout(function () {
                        window.location.href = "{{ route('transactions') }}";
                    }, 5000);
                } else if (results == false) {
                    $(".b-msg").html('<div class="alert alert-danger alert-dismissible">\n\
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n\
                                     <strong>Warning!</strong> Product price is more than your account balance. Top up your account balance.');   
                    window.setTimeout(function () {
                        window.location.href = "{{ route('transactions') }}";
                    }, 5000);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });
});
        </script>
    </body>
</html>