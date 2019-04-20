@extends('layouts.app')
@section('content')
<style>
    charset "utf-8";

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,600);

    html,
    html a {
        -webkit-font-smoothing: antialiased;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
    }

    body {
        background-color: #fff;
        color: #666;
        font-family: 'Open Sans', sans-serif;
        font-size: 62.5%;
        margin: 0 auto;
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
    }
    @media only screen and (max-width: 600px) {

        main{
            margin-top: 80px !important;
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
</style>

@if(Cart::count() == 0)
<main>
    @if (session()->has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{session()->get('success')}}
    </div>
@endif
    <div class="col-lg-5 col-sm-12 col-xs-12"> 
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
                    <p><strong>Navy, Size 18</strong></p>
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
                <button type="submit">Remove</button>
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
                <button class="btn btn-success checkout-cta"><a href="{{route('checkout')}}" style="color:#fff">Go to Secure Checkout</a></button>
            </div>
        </div>

    </aside>       
</main>
@endif
<main style="margin-top:0px !important">
    <div class="col-lg-5 col-sm-12 col-xs-12"> 
        <button type="button" class="btn btn-primary pull-left"><a href="{{route('home')}}" style="color:#fff">Continue Shopping</a></button>     
        <button type="button" class="btn btn-default pull-right"><a href="{{route('back')}}" style="color:#fff">Back <span class="fa fa-arrow-right"></a></span></button> 
    </div> 
</main>
@if(Cart::instance('saveForLater')->count() == 0)
<main style="margin-top:0px !important">
    <div class="col-lg-5 col-sm-12 col-xs-12"> 
        <h5>You have no items save for later</h5>
    </div>
</main>
@else
<main style="margin-top:0px !important">
    <h5>{{Cart::instance('saveForLater')->count()}} Item(s) save for later</h5>
    <div class='row'> 
        @foreach (Cart::instance('saveForLater')->content() as $item)
        <div class="col-md-3 column productbox">
            <a href="{{route('options',$item->id)}}"><img src="{{$item->options->image}}" class="img-responsive"></a><br><br>
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
<script>
    /* Set values + misc */
    var promoCode;
    var promoPrice;
    var fadeTime = 300;

    /* Assign actions */
    $('.quantity input').change(function () {
        updateQuantity(this);
    });

    $('.remove button').click(function () {
        removeItem(this);
    });

    $(document).ready(function () {
        updateSumItems();
    });

    $('.promo-code-cta').click(function () {

        promoCode = $('#promo-code').val();

        if (promoCode == '10off' || promoCode == '10OFF') {
            //If promoPrice has no value, set it as 10 for the 10OFF promocode
            if (!promoPrice) {
                promoPrice = 10;
            } else if (promoCode) {
                promoPrice = promoPrice * 1;
            }
        } else if (promoCode != '') {
            alert("Invalid Promo Code");
            promoPrice = 0;
        }
        //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
        if (promoPrice) {
            $('.summary-promo').removeClass('hide');
            $('.promo-value').text(promoPrice.toFixed(2));
            recalculateCart(true);
        }
    });

    /* Recalculate cart */
    function recalculateCart(onlyTotal) {
        var subtotal = 0;

        /* Sum up row totals */
        $('.basket-product').each(function () {
            subtotal += parseFloat($(this).children('.subtotal').text());
        });

        /* Calculate totals */
        var total = subtotal;

        //If there is a valid promoCode, and subtotal < 10 subtract from total
        var promoPrice = parseFloat($('.promo-value').text());
        if (promoPrice) {
            if (subtotal >= 10) {
                total -= promoPrice;
            } else {
                alert('Order must be more than £10 for Promo code to apply.');
                $('.summary-promo').addClass('hide');
            }
        }

        /*If switch for update only total, update only total display*/
        if (onlyTotal) {
            /* Update total display */
            $('.total-value').fadeOut(fadeTime, function () {
                $('#basket-total').html(total.toFixed(2));
                $('.total-value').fadeIn(fadeTime);
            });
        } else {
            /* Update summary display. */
            $('.final-value').fadeOut(fadeTime, function () {
                $('#basket-subtotal').html(subtotal.toFixed(2));
                $('#basket-total').html(total.toFixed(2));
                if (total == 0) {
                    $('.checkout-cta').fadeOut(fadeTime);
                } else {
                    $('.checkout-cta').fadeIn(fadeTime);
                }
                $('.final-value').fadeIn(fadeTime);
            });
        }
    }

    /* Update quantity */
    function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children('.price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;

        /* Update line price display and recalc cart totals */
        productRow.children('.subtotal').each(function () {
            $(this).fadeOut(fadeTime, function () {
                $(this).text(linePrice.toFixed(2));
                recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });

        productRow.find('.item-quantity').text(quantity);
        updateSumItems();
    }

    function updateSumItems() {
        var sumItems = 0;
        $('.quantity input').each(function () {
            sumItems += parseInt($(this).val());
        });
        $('.total-items').text(sumItems);
    }

    /* Remove item from cart */
    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function () {
            productRow.remove();
            recalculateCart();
            updateSumItems();
        });
    }

    Resources
</script>
@endsection