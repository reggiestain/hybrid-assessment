@extends('layouts.app')
@section('content')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

<style>
    charset "utf-8";

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,600);

    html,
    html a {
        -webkit-font-smoothing: antialiased;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
    }

    
    form{
        display: inline !important;
        margin-left: 10px;
    }
    a {
        border: 0 none;
        outline: 0;
        text-decoration: none;
    }

    strong {
        font-weight: bold;
    }

    p {
        margin: 0.75rem 0 0;
    }

    h1 {
        font-size: 0.75rem;
        font-weight: normal;
        margin: 0;
        padding: 0;
    }

    input,
    button {
        border: 0 none;
        outline: 0 none;
    }

    button {
        background-color: #666;
        color: #fff;
    }

    button:hover,
    button:focus {
        background-color: #555;
    }

    img,
    .basket-module,
    .basket-labels,
    .basket-product {
        width: 100%;
    }

    input,
    button,
    .basket,
    .basket-module,
    .basket-labels,
    .item,
    .price,
    .quantity,
    .subtotal,
    .basket-product,
    .product-image,
    .product-details {
        float: left;
    }

    .price:before,
    .subtotal:before,
    .subtotal-value:before,
    .total-value:before,
    .promo-value:before {
        content: 'R ';
    }

    .hide {
        display: none;
    }

    main {
        clear: both;
        font-size: 0.75rem;
        margin: 0 auto;
        overflow: hidden;
        padding: 1rem 0;
        width: 960px;
    }

    .basket,
    aside {
        padding: 0 1rem;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .basket {
        width: 70%;
    }

    .basket-module {
        color: #111;
    }

    label {
        display: block;
        margin-bottom: 0.3125rem;
    }

    .promo-code-field {
        border: 1px solid #ccc;
        padding: 0.5rem;
        text-transform: uppercase;
        transition: all 0.2s linear;
        width: 48%;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -o-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .promo-code-field:hover,
    .promo-code-field:focus {
        border: 1px solid #999;
    }

    .promo-code-cta {
        border-radius: 4px;
        font-size: 0.625rem;
        margin-left: 0.625rem;
        padding: 0.6875rem 1.25rem 0.625rem;
    }

    .basket-labels {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        margin-top: 1.625rem;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    li {
        color: #111;
        display: inline-block;
        padding: 0.625rem 0;
    }

    li.price:before,
    li.subtotal:before {
        content: '';
    }

    .item {
        width: 55%;
    }

    .price,
    .quantity,
    .subtotal {
        width: 15%;
    }

    .subtotal {
        text-align: right;
    }

    .remove {
        bottom: 1.125rem;
        float: right;
        position: absolute;
        right: 0;
        text-align: right;
        width: 45%;
    }

    .remove button {
        background-color: transparent;
        color: #777;
        float: none;
        text-decoration: underline;
        text-transform: uppercase;
    }

    .item-heading {
        padding-left: 4.375rem;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .basket-product {
        border-bottom: 1px solid #ccc;
        padding: 1rem 0;
        position: relative;
    }

    .product-image {
        width: 35%;
    }

    .product-details {
        width: 65%;
    }

    .product-frame {
        border: 1px solid #aaa;
    }

    .product-details {
        padding: 0 1.5rem;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .quantity-field {
        background-color: #ccc;
        border: 1px solid #aaa;
        border-radius: 4px;
        font-size: 0.625rem;
        padding: 2px;
        width: 3.75rem;
    }

    aside {
        float: right;
        position: relative;
        width: 30%;
    }

    .summary {
        background-color: #eee;
        border: 1px solid #aaa;
        padding: 1rem;
        //position: fixed;
        width: 250px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .summary-total-items {
        color: #666;
        font-size: 0.875rem;
        text-align: center;
    }

    .summary-subtotal,
    .summary-total {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        clear: both;
        margin: 1rem 0;
        overflow: hidden;
        padding: 0.5rem 0;
    }

    .subtotal-title,
    .subtotal-value,
    .total-title,
    .total-value,
    .promo-title,
    .promo-value {
        color: #111;
        float: left;
        width: 50%;
    }

    .summary-promo {
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    .promo-title {
        float: left;
        width: 70%;
    }

    .promo-value {
        color: #8B0000;
        float: left;
        text-align: right;
        width: 30%;
    }

    .summary-delivery {
        padding-bottom: 3rem;
    }

    .subtotal-value,
    .total-value {
        text-align: right;
    }

    .total-title {
        font-weight: bold;
        text-transform: uppercase;
    }

    .summary-checkout {
        display: block;
    }

    .checkout-cta {
        display: block;
        float: none;
        font-size: 0.75rem;
        text-align: center;
        text-transform: uppercase;
        padding: 0.625rem 0;
        width: 100%;
    }

    .summary-delivery-selection {
        background-color: #ccc;
        border: 1px solid #aaa;
        border-radius: 4px;
        display: block;
        font-size: 0.625rem;
        height: 34px;
        width: 100%;
    }

    @media screen and (max-width: 640px) {
        aside,
        .basket,
        .summary,
        .item,
        .remove {
            width: 100%;
        }
        .basket-labels {
            display: none;
        }
        .basket-module {
            margin-bottom: 1rem;
        }
        .item {
            margin-bottom: 1rem;
        }
        .product-image {
            width: 40%;
        }
        .product-details {
            width: 60%;
        }
        .price,
        .subtotal {
            width: 33%;
        }
        .quantity {
            text-align: center;
            width: 34%;
        }
        .quantity-field {
            float: none;
        }
        .remove {
            bottom: 0;
            text-align: left;
            margin-top: 0.75rem;
            position: relative;
        }
        .remove button {
            padding: 0;
        }
        .summary {
            margin-top: 1.25rem;
            position: relative;
        }
    }

    @media screen and (min-width: 641px) and (max-width: 960px) {
        aside {
            padding: 0 1rem 0 0;
        }
        .summary {
            width: 28%;
        }
    }

    @media screen and (max-width: 960px) {
        main {
            width: 100%;
        }
        .product-details {
            padding: 0 1rem;
        }
    }

    @media only screen and (max-width: 1600px)
    {
        main{
            margin-top: 200px;
        } 
        #payfast{
            margin-left: 320px;
        }
    }
    @media only screen and (max-width: 600px) {

        main{
            margin-top: 80px !important;
        } 
        #payfast-pay-form button{
            margin-left: 30%;
        }
        #payfast{
            margin-left: 0px;
        }

    }
    .productbox {
        background-color:#ffffff;
        padding:10px;
        margin-bottom:10px;
        -webkit-box-shadow: 0 8px 6px -6px  #999;
        -moz-box-shadow: 0 8px 6px -6px  #999;
        box-shadow: 0 8px 6px -6px #999;
    }

    .producttitle {
        font-weight:bold;
        padding:5px 0 5px 0;
    }

    .productprice {
        border-top:1px solid #dadada;
        padding-top:5px;
    }

    .pricetext {
        font-weight:bold;
        font-size:1.4em;
    }
    .pac-container {
        z-index: 1051 !important;
    }
</style>

@if(Cart::count() == 0)
<main>
    @if (session()->has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{session()->get('success')}}
    </div>
    @endif
    <div class="col-lg-5 col-sm-12 col-xs-12" style="text-align: center!important"> 
        <h5>{{Cart::count()}} Item(s) in Shopping Cart</h5>
    </div>
</main>
@else               
<main> 
    @if (session()->has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{session()->get('success')}}
    </div>
    @endif
    <div class="basket">
        <div class="basket-module">
            <label for="promo-code">Enter a promotional code</label>
            <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
            <button class="promo-code-cta">Apply</button>
        </div>
        <div class="basket-labels">
            <ul>
                <li class="item item-heading">Item</li>
                <li class="price">Price</li>
                <li class="quantity">Quantity</li>
                <li class="subtotal">Subtotal</li>
            </ul>
        </div>
        @foreach ($cartItems as $item)

        <div class="basket-product">
            <div class="item">
                <div class="product-image">
                    <img src="{{$item->options->image}}" alt="Placholder Image 2" class="product-frame">
                </div>
                <div class="product-details">
                    <h1><strong><span class="item-quantity">4</span> {{$item->name}}</strong> </h1>
                    <p><strong>Size {{$item->options->size}}</strong></p>
                    <p>Product Code - 00{{$item->id}}</p>
                </div>
            </div>
            <div class="price">{{$item->price}}</div>
            <div class="quantity">          
                {!! Form::open(['route'=>['cart.update',$item->rowId],'method'=>'PUT']) !!}
                <input type="number" name="qty" value="{{$item->qty}}" min="1" class="quantity-field"> 
                <input type="submit" class="btn btn-default" style="font-size: 0.625rem;margin-top:5px;background:#55ACEE" value="Update">
                {!! Form::close() !!}

            </div>
            <div class="subtotal">{{$item->price * $item->qty}}</div>
            <div class="remove">
                {!! Form::open(['route'=>['cart.saveforlater',$item->rowId],'method'=>'POST']) !!}
                {{ csrf_field() }}
                <button type="submit">Save for Later</button>
                {!! Form::close() !!}
                {!! Form::open(['route'=>['cart.destroy',$item->rowId],'method'=>'DELETE']) !!}
                {{ csrf_field() }}
                <button type="submit" style="color:red">Remove</button>
                {!! Form::close() !!}
            </div>

        </div>
        @endforeach            
    </div>   
    <aside>
        <div class="summary">
            <div class="summary-total-items">
                @if(Cart::count() > 1)
                {{Cart::count()}} Items in your Bag
                @else
                {{Cart::count()}} Item in your Bag
                @endif
            </div>
            <div class="summary-subtotal">
                <div class="subtotal-title">Subtotal</div>
                <div class="subtotal-value final-value" id="basket-subtotal">{{Cart::subtotal()}}</div>
                <div class="summary-promo hide">
                    <div class="promo-title">Promotion</div>
                    <div class="promo-value final-value" id="basket-promo"></div>
                </div>
            </div>
            <div class="summary-delivery">
                <select name="delivery-collection" class="summary-delivery-selection">
                    <option value="0" selected="selected">Select Collection or Delivery</option>
                    <option value="collection">Collection</option>
                    <option value="first-class">Royal Mail 1st Class</option>
                    <option value="second-class">Royal Mail 2nd Class</option>
                    <option value="signed-for">Royal Mail Special Delivery</option>
                </select>
            </div>
            <div class="summary-total">
                <div class="total-title">Total</div>
                <div class="total-value final-value" id="basket-total">{{Cart::subtotal()}}</div>
            </div>
            <div class="summary-checkout">
                @if(Auth::user())
                <button class="btn btn-success checkout-cta s-checkout"><a href="#" style="color:#fff">Checkout</a></button>
                @else
                <button class="btn btn-success checkout-cta"><a href="{{route('login')}}" style="color:#fff">Sign in to Checkout</a></button><br>
                <button class="btn btn-default checkout-cta s-checkout"><a href="#" style="color:#fff">Checkout as Guest</a></button>
                @endif
            </div>
        </div>
    </aside>       
</main>
@endif
<main style="margin-top:0px !important">
    <div class="col-lg-5 col-sm-12 col-xs-12"> 
        <button type="button" class="btn btn-primary pull-left"><a href="{{route('home')}}" style="color:#fff">Continue Shopping</a></button>     
        <button type="button" class="btn btn-default pull-right"><a href="{{route('back')}}" style="color:#fff">Refresh <span class="fa fa-refresh"></a></span></button> 
    </div> 
</main>
@if(Cart::instance('saveForLater')->count() == 0)
<main style="margin-top:0px !important;text-align: center!important">
    <div class="col-lg-5 col-sm-12 col-xs-12" style=""> 
        <h5>You have no items save for later</h5>
    </div>
</main>
@else
<main style="margin-top:0px !important;text-align: center!important">
    <h5>{{Cart::instance('saveForLater')->count()}} Item(s) save for later</h5>
    <div class='row'> 
        @foreach (Cart::instance('saveForLater')->content() as $item)
        <div class="col-xs-2 col-md-3 col-sm-3 column productbox"  style="margin-left:30px !important;width:40%!important;height:40%!important">
            <a href="#"><img src="{{$item->options->image}}" class="img-responsive"></a><br><br>
            <h6 style="margin-left:5px"><a href=''><strong>{{$item->name}}</strong></a></h6>
            <div class="productprice">
                <div class="pull-right">
                    <div class="pricetext" style="margin-left:5px">R{{$item->price}}</div>        
                    {!! Form::open(['route'=>['saveforlater.destroy',$item->rowId],'method'=>'DELETE']) !!}               
                    <button type="submit" class="btn btn-link btn-sm" role="button">Remove</button>
                    {!! Form::close() !!}
                    {!! Form::open(['route'=>['saveForLater.switchToCart',$item->rowId],'method'=>'POST']) !!}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" role="button">Move to cart</button>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
        @endforeach
    </div>
</main>
@endif
<!-- Login Modal -->
<div id="payModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">       
                <h4 class="modal-title w-100">Please enter delivery address</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="check-form" role="form">
                {{ csrf_field() }}
                <div class="modal-body">               
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="delivery">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Firstname *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Enter your firstname" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname *</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Enter your lastname" required="required" data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Enter your email" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>                     
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Phone Number *</label>
                                        <input id="form_email" type="text" name="mobile" class="form-control" placeholder="Enter your phone number" required="required" data-error="Valid phone number is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">   
                                    <div id="locationField" class="form-group">
                                        <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" name="address" class="form-control" type="text"/>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row"> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Street Number</label>
                                        <input type="text" id="street_number" name="street_number" class="form-control" disabled="true">
                                        <div class="help-block with-errors"></div>
                                    </div>                                
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Street address</label>
                                        <input type="text" class="form-control" id="route" name="street_name" disabled="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" id="locality" name="city" disabled="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                      
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <input type="text" class="form-control" id="administrative_area_level_1" name="province" disabled="true"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Area Code</label>
                                        <input type="text" id="postal_code" name="post_code" class="form-control" disabled="true">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input id="country" type="text" name="country" class="form-control" disabled="true">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-cart" style="display:none">
                            <div class="items">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead style="font-size: 18px">
                                        <th>
                                            ITEM(s)
                                        </th>
                                        <th>
                                            QTY
                                        </th>
                                        <th>
                                            PRICE
                                        </th>
                                        </thead>
                                        @foreach ($cartItems as $item)
                                        <tr>                   
                                            <td>
                                                <ul>

                                                    <li style="display:list-item;font-size: 16px">{{$item->name}}</li>
                                                    <input type="hidden" name="items[]" value="{{$item->name}}" />
                                                </ul>
                                            </td>
                                            <td style="font-size: 16px">
                                                {{$item->qty}}
                                            </td>  
                                            <td style="font-size: 16px">
                                                R{{$item->price}}
                                            </td>                                                 
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <div style="text-align: center;">
                                        <h3>Order Total</h3>
                                        <h3><span style="color:green;">R {{Cart::instance('default')->subtotal()}}</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-send" style="margin-left:40%!important">Submit</button> 
                    </div>   
                </div>
            </form>
            <div  class="col-lg-10 col-sm-10 col-xs-10">
                <div id="payfast">
                    
                </div><br><br>
            </div>
            <!--End Modal content-->
        </div>
    </div>    
    <script>
        $(document).ready(function () {
            $(".s-checkout").click(function () {
                $("#payModal").modal();
            });
            $(document).on("submit", "#check-form", function (event) {
                //
                event.preventDefault();
                $("#payModal").modal();
                $('.shop-cart, .delivery').toggle(200);
                $(".w-100").text("Your Order Details");
                $(".modal-footer").hide();
                var data = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: "{{route('checkout.payment')}}",
                    data: data,
                    beforeSend: function () {
                        //launchpreloader();
                    },
                    complete: function () {
                        //stopPreloader();
                    },
                    success: function (result) {
                        if (result == 'false') {
                            alert('An error occured, please try again.');
                            location.reload();
                        } else {
                            $("#payfast").html(result);
                            //$("#payfast-pay-form button").css("width", "50%");
                            //$("#payfast").css("margin-left", "30px");
                            $("#payfast-pay-form button").addClass("btn btn-primary");
                        }
                    }
                });
            });
        });
        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search predictions to
            // geographical location types.
            var input = document.getElementById('autocomplete');
            var option = {
                types: ['geocode']
                        //types: ['(cities)'],
                        //componentRestrictions: {country: 'fr'}                            
            }
            autocomplete = new google.maps.places.Autocomplete(
                    input, option);
            // Avoid paying for data that you don't need by restricting the set of
            // place fields that are returned to just the address components.
            autocomplete.setFields(['address_component']);
            // When the user selects an address from the drop-down, populate the
            // address fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);

        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details,
            // and then fill-in the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });

            }
        }


    </script>  
    @endsection