@extends('layouts.app')
@section('content')
<style>
    a img {
        border: none;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    menu,
    nav,
    section,
    summary {
        display: block;
    }

    * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        outline: 0 none;
    }



    .opt img {
        max-width: 100%;
    }

    .opt img.float-left {
        float: left;
        margin: 0 20px 10px 0;
    }

    .opt img.float-right {
        float: right;
        margin: 0 0 10px 20px;
    }

    @media only screen and (max-width: 600px) {
        .product-detail {
            padding-top: 60px;
        }
        .b-option{
            margin-left:60px !important;
        }  
        .product-detail .left-col .big #banner-gallery .swipe-wrap > div {
            background: transparent no-repeat center center fixed;
            -moz-background-size: cover;
            -o-background-size: cover;
            -webkit-background-size: cover;
            background-size: cover;
            float: left;
            padding-bottom: 80%;
            width: 100%;
            position: relative;
        }  
    }
</style>
<!-- Demo page craeted by https://github.com/petr-goca -->
<section class="product-detail">  
    <div itemscope >   
        <div class="shadow">
            <div class="_cont detail-top">
                <div class="cols">
                    <div class="left-col">
                        <div class="thumbs">
                            @foreach($side as $sides)
                            <a class="thumb-image active" href="{{ URL::asset($sides->mime_type)}}?v=1446769025" data-index="0">
                                <span><img src="{{URL::asset($sides->mime_type)}}?v=1446769025" alt="{{$sides->name}}"></span>
                            </a>
                            @endforeach
                        </div>
                        <div class="big">
                            <span id="big-image" class="img" quickbeam="image" style="background-image: url('{{asset($product->mime_type)}}?v=1446769025')" data-src="//cdn.shopify.com/s/files/1/1047/6452/products/product_1024x1024.png?v=1446769025"></span>
                            <div id="banner-gallery" class="swipe">
                                <div class="swipe-wrap">      
                                    <div style="background-image: url('{{URL::asset($product->mime_type)}}?v=1446769025')"></div>                                  
                                </div>
                            </div>
                            <div class="detail-socials">
                                <div class="social-sharing" data-permalink="{{$product->name}}">
                                    <a target="_blank"  class="share-facebook" title="Share"></a>
                                    <a target="_blank"  class="share-twitter" title="Tweet"></a>
                                    <a target="_blank"  class="share-pinterest" title="Pin it"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        @if($message = Session::get('success'))
                        <br><br>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $message }}
                        </div>   
                        @endif
                        <h1 itemprop="name">{{$product->name}}</h1>
                        <div itemprop="offers" itemscope itemtype="">
                            <meta itemprop="priceCurrency" content="">
                            <link itemprop="availability" href="#">
                            <div class="price-shipping">
                                <div class="price" id="price-preview" quickbeam="price" quickbeam-price="800">
                                    R {{$product->price}}
                                </div>
                                <a>Free shipping</a>
                            </div>
                            <div class="swatches">
                                <div class="swatch clearfix" data-option-index="0">
                                    <div class="hader">Size</div>
                                    <div data-value="M" class="swatch-element plain m available">
                                        <input id="swatch-0-m" type="radio" name="option-0" value="M" checked  />
                                        <label for="swatch-0-m">
                                            M
                                            <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
                                        </label>
                                    </div>
                                    <div data-value="L" class="swatch-element plain l available">
                                        <input id="swatch-0-l" type="radio" name="option-0" value="L"  />
                                        <label for="swatch-0-l">
                                            L
                                            <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
                                        </label>
                                    </div>
                                    <div data-value="XL" class="swatch-element plain xl available">
                                        <input id="swatch-0-xl" type="radio" name="option-0" value="XL"  />
                                        <label for="swatch-0-xl">
                                            XL
                                            <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
                                        </label>
                                    </div>
                                    <div data-value="XXL" class="swatch-element plain xxl available">
                                        <input id="swatch-0-xxl" type="radio" name="option-0" value="XXL"  />
                                        <label for="swatch-0-xxl">
                                            XXL
                                            <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
                                        </label>
                                    </div>
                                </div>
                                <!--<div class="swatch clearfix" data-option-index="1">
                                    <div class="heder">Color</div>
                                    <div data-value="Blue" class="swatch-element color blue available">
                                        <div class="tooltip">Blue</div>
                                        <input quickbeam="color" id="swatch-1-blue" type="radio" name="option-1" value="Blue" checked  />
                                        <label for="swatch-1-blue" style="border-color: blue;">
                                            <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
                                            <span style="background-color: blue;"></span>
                                        </label>
                                    </div>
                                    <div data-value="Red" class="swatch-element color red available">
                                        <div class="tooltip">Red</div>
                                        <input quickbeam="color" id="swatch-1-red" type="radio" name="option-1" value="Red"  />
                                        <label for="swatch-1-red" style="border-color: red;">
                                            <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
                                            <span style="background-color: red;"></span>
                                        </label>
                                    </div>
                                    <div data-value="Yellow" class="swatch-element color yellow available">
                                        <div class="tooltip">Yellow</div>
                                        <input quickbeam="color" id="swatch-1-yellow" type="radio" name="option-1" value="Yellow"  />
                                        <label for="swatch-1-yellow" style="border-color: yellow;">
                                            <img class="crossed-out" src="//cdn.shopify.com/s/files/1/1047/6452/t/1/assets/soldout.png?10994296540668815886" />
                                            <span style="background-color: yellow;"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="guide">
                                    <a>Size guide</a>
                                </div>-->
                            </div>
                            <!-- <form method="post" enctype="multipart/form-data" id="AddToCartForm"> -->
                            <form id="AddToCartForm">
                                <select name="id" id="productSelect" quickbeam="product" class="product-single__variants">
                                    <option  selected="selected"  data-sku="" value="7924994501">
                                        M / Blue - $800.00 USD
                                    </option>
                                    <option  data-sku="" value="7924995077">
                                        M / Red - $850.00 USD
                                    </option>
                                    <option  data-sku="" value="7924994437">
                                        L / Blue - $850.00 USD
                                    </option>
                                    <option  data-sku="" value="7924994693">
                                        L / Yellow - $850.00 USD
                                    </option>
                                    <option  data-sku="" value="7924995013">
                                        L / Red - $850.00 USD
                                    </option>
                                    <option  data-sku="" value="7924994373">
                                        XL / Blue - $900.00 USD
                                    </option>
                                    <option  data-sku="" value="7924994629">
                                        XL / Yellow - $850.00 USD
                                    </option>
                                    <option  data-sku="" value="7924830021">
                                        XXL / Blue - $950.00 USD
                                    </option>
                                    <option  data-sku="" value="7924994885">
                                        XXL / Red - $850.00 USD
                                    </option>
                                </select>
                                <div class="btn-and-quantity-wrap">
                                    <div class="btn-and-quantity">
                                        <div class="row" style="margin-left:5px">
                                            <div class="b-option">
                                                <label>Quantity:</label>
                                                <input style="margin-left: 20px;margin-bottom:2px;width:50px" type="text" name="qty" value="1">
                                            </div>    
                                        </div> <br>
                                        <div class="row" style="margin-left:5px">
                                            <div class="b-option">
                                                <button class="btn btn-primary buy-now"> Buy It Now</button>
                                            </div>   
                                            <div class="bops" style="margin-left:10px">
                                                <input type="button" onclick="location.href ='{{route('cart.add',$product->id)}}'" class="btn btn-danger" value="Add to cart">
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </form>
                            <div class="tabs">
                                <div class="tab-labels">
                                    <span data-id="1" class="active">Info</span>
                                    <span data-id="2">Brand</span>
                                </div>
                                <div class="tab-slides">
                                    <div id="tab-slide-1" itemprop="description"  class="slide active">
                                        {{$product->description}} 
                                        <div><label>Delivery: Varies</label></div>
                                        <div>
                                            <label>Payments: 
                                                <i class="fa fa-cc-visa fa-lg" aria-hidden="true"></i>
                                                <i class="fa fa-cc-mastercard fa-lg" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                        <div><label>Returns: 30 day returns. Buyer pays for return shipping |</label></div>
                                    </div>
                                    <div id="tab-slide-2" class="slide">
                                        Tony Hunfinger
                                    </div>
                                </div>
                            </div>
                            <div class="social-sharing-btn-wrapper">
                                <span id="social_sharing_btn">Share</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <aside class="related">
            <div class="_cont">
                <h2>You might also like</h2>
                <div class="collection-list cols-4" id="collection-list" data-products-per-page="4">
                    @foreach($side as $likes)
                    <a class="product-box">
                        <span class="img">
                            <span style="background-image: url('{{asset($likes->mime_type)}}?v=1447530130')" class="i first"></span>
                            <span class="i second" style="background-image: url('{{asset($likes->mime_type)}}?v=1447530130')"></span>
                        </span>
                        <span class="text">
                            <strong>{{$likes->name}}</strong>
                            <span>
                                R {{$likes->price}}
                            </span>
                            <div class="variants">
                                <div class="variant">
                                    <div class="var m available">
                                        <div class="t">M</div>
                                    </div>
                                    <div class="var l available">
                                        <div class="t">L</div>
                                    </div>
                                    <div class="var xl available">
                                        <div class="t">XL</div>
                                    </div>
                                    <div class="var xxl available">
                                        <div class="t">XXL</div>
                                    </div>
                                </div>
                                <!--<div class="variant">
                                    <div class="var color blue available">
                                        <div class="c" style="background-color: blue;"></div>
                                    </div>
                                    <div class="var color red available">
                                        <div class="c" style="background-color: red;"></div>
                                    </div>
                                    <div class="var color yellow available">
                                        <div class="c" style="background-color: yellow;"></div>
                                    </div>
                                </div>-->
                            </div>
                        </span>
                    </a>
                    @endforeach          
                </div>
                <div class="more-products" id="more-products-wrap">
                    <span id="more-products" data-rows_per_page="1">More products</span>
                </div>
            </div>
        </aside>
    </div>

</section>

<!-- Quickbeam cart-->
<!-- Login Modal -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">       
                <h4 class="modal-title w-100"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group" style="margin-left:90px">
                    <img src="{{URL::asset($product->mime_type)}}" style="width:100px;height:100px" class="img-responsive" alt="Cinque Terre">
                </div>
                <div class="form-group">
                    <input style="color:white" type="button" onclick="location.href ='{{route('cart.add',$product->id)}}'" class="btn btn-primary form-control" value="Sign in to checkout">
                </div>
                <div class="form-group">
                    <input style="color:#0069D9" type="button" onclick="location.href ='{{route('cart.edit',$product->id)}}'" class="btn btn-default form-control" value="Checkout as a guest">
                </div>                
            </div>           
        </div>
        <!--End Modal content-->
    </div>
</div>   
<div id="quick-cart" quickbeam="cart">
    <a id="quick-cart-pay" quickbeam="cart-pay" class="cart-ico">
        <span>
            <strong class="quick-cart-text">Pay<br></strong>
            <span id="quick-cart-price">0</span>
            <span id="quick-cart-pay-total-count">0</span>
        </span>
    </a>
</div>

<!-- Quickbeam cart end -->
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//raw.githubusercontent.com/greenwoodents/quickbeam.js/master/dist/quickbeam.min.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js'></script>

@endsection
