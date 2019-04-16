@extends('layouts.app')
@section('content')
<style>
    .guest li.active{border-bottom:3px solid silver}
    .guest li {margin-left: 10px}
    .item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
    .menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
    .btn-success{width:100%;border-radius:0;}
    .section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
    .title-price{margin-top:30px;margin-bottom:0;color:black}
    .title-attr{margin-top:0;margin-bottom:0;color:black;}
    .btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
    .btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
    div.section > div {width:100%;display:inline-flex;}
    div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
    .attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
    .attr.active,.attr2.active{ border:1px solid orange;}

    @media (max-width: 426px) {
        .container {margin-top:0px !important;}
        .container > .row{padding:0 !important;}
        .container > .row > .col-xs-12.col-sm-5{
            padding-right:0 ;    
        }
        .container > .row > .col-xs-12.col-sm-9 > div > p{
            padding-left:0 !important;
            padding-right:0 !important;
        }
        .container > .row > .col-xs-12.col-sm-9 > div > ul{
            padding-left:10px !important;

        }            
        .section{width:104%;}
        .menu-items{padding-left:0;}
    }    
</style>
<div class="container" style="margin-top: 180px">
    <div class="row">
        <div class="col-md-4 item-photo">
            <img style="max-width:100%;" src="{{URL::asset($product->mime_type)}}" alt="product image"/>
        </div>
        <div class="col-md-8" style="border:0px solid gray">
            <!-- Datos del vendedor y titulo del producto -->
            <br>
            <h4>{{$product->name}}</h4>    
            <h5 ><a href="#" style="color:#FE4C50">Enter shipping address</a> · <small style="color:#337ab7"></small></h5>

            <!-- Detalles especificos del producto -->
            <div class="section" style="padding-bottom:20px;">
                <h6 class="title-attr"><small>QUANTITY</small></h6>                    
                <div>
                    <div class="btn-minus"><span class="fa fa-minus"></span></div>
                    <input value="1" />
                    <div class="btn-plus"><span class="fa fa-plus"></span></div>
                </div>
            </div>                
            <div class="section" style="padding-bottom:5px;">
                <h6 class="title-price"><small>Subtotal (1 item)</small></h6>
                <h3 style="margin-top:0px;">R {{$product->price}}</h3>
            </div> 
            <div class="section" style="padding-bottom:5px;">
                <h5 class="title-price">Order total</h5>
                <h3 style="margin-top:0px;">R {{$product->price}}</h3>
            </div> 
            <!-- Botones de compra -->
            <div class="section" style="padding-bottom:20px;">
                <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Confirm and Pay</button>
                <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span></a></h6>
            </div>                                        
        </div>                              

        <div class="col-md-12">
            <ul class="menu-items guest">
                <li class="active">Info</li>
                <!--<li>Garantía</li>
                <li>Vendedor</li>
                <li>Envío</li>-->
            </ul>
            <div style="width:100%;border-top:1px solid silver">
                <p style="padding:15px;">
                    <small>
                        Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung. With 16 GB of memory and a 4G connection, this phone stores precious photos and video and lets you upload them to a cloud or social network at blinding-fast speed. With a 17-hour operating life from one charge, this phone allows you keep in touch even on the go. 

                        With its built-in photo editor, the Galaxy S4 allows you to edit photos with the touch of a finger, eliminating extraneous background items. Usable with most carriers, this smartphone is the perfect companion for work or entertainment.
                    </small>
                </p>
               <!-- <small>
                    <ul>
                        <li>Super AMOLED capacitive touchscreen display with 16M colors</li>
                        <li>Available on GSM, AT T, T-Mobile and other carriers</li>
                        <li>Compatible with GSM 850 / 900 / 1800; HSDPA 850 / 1900 / 2100 LTE; 700 MHz Class 17 / 1700 / 2100 networks</li>
                        <li>MicroUSB and USB connectivity</li>
                        <li>Interfaces with Wi-Fi 802.11 a/b/g/n/ac, dual band and Bluetooth</li>
                        <li>Wi-Fi hotspot to keep other devices online when a connection is not available</li>
                        <li>SMS, MMS, email, Push Mail, IM and RSS messaging</li>
                        <li>Front-facing camera features autofocus, an LED flash, dual video call capability and a sharp 4128 x 3096 pixel picture</li>
                        <li>Features 16 GB memory and 2 GB RAM</li>
                        <li>Upgradeable Jelly Bean v4.2.2 to Jelly Bean v4.3 Android OS</li>
                        <li>17 hours of talk time, 350 hours standby time on one charge</li>
                        <li>Available in white or black</li>
                        <li>Model I337</li>
                        <li>Package includes phone, charger, battery and user manual</li>
                        <li>Phone is 5.38 inches high x 2.75 inches wide x 0.13 inches deep and weighs a mere 4.59 oz </li>
                    </ul>  
                </small>-->
            </div>
        </div>		
    </div>
</div>
<script>
    $(document).ready(function () {
        //-- Click on detail
        $("ul.menu-items > li").on("click", function () {
            $("ul.menu-items > li").removeClass("active");
            $(this).addClass("active");
        })

        $(".attr,.attr2").on("click", function () {
            var clase = $(this).attr("class");

            $("." + clase).removeClass("active");
            $(this).addClass("active");
        })

        //-- Click on QUANTITY
        $(".btn-minus").on("click", function () {
            var now = $(".section > div > input").val();
            if ($.isNumeric(now)) {
                if (parseInt(now) - 1 > 0) {
                    now--;
                }
                $(".section > div > input").val(now);
            } else {
                $(".section > div > input").val("1");
            }
        })
        $(".btn-plus").on("click", function () {
            var now = $(".section > div > input").val();
            if ($.isNumeric(now)) {
                $(".section > div > input").val(parseInt(now) + 1);
            } else {
                $(".section > div > input").val("1");
            }
        })
    })

</script>
@endsection