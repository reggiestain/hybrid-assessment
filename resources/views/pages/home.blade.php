@extends('layouts.app')
@section('content')
<div class="main_slider" style="background-image:url(../public//images/slider_1.jpg)">
    <div class="container fill_height">
        <div class="row align-items-center fill_height">
            <div class="col">
                <div class="main_slider_content">
                    <h6>Spring / Summer Collection 2018</h6>
                    <h1>Get up to 0.50% Off Products</h1>
                    <div class="red_button shop_now_button"><a href="{{route('login')}}">shop now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->

<!-- New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Products</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        @foreach($categories as $cat)
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center 
                            @if($cat->name == 'all')active is-checked" data-filter="*" 
                            @else" data-filter=".{{$cat->id}}"@endif>{{$cat->name}}</li>                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    @foreach($products as $product)
                    <!-- Products-->
                    <div class="product-item {{$product->product_category_id}}">
                        <div class="product discount product_filter">
                        <div class="product_image">
                            <img src="{{ $product->mime_type }}" alt="">
                        </div>
                        <div class="favorite favorite_left"></div>
                        
                        <div class="product_info">
                            <h6 class="product_name"><a href="single.html">{{ $product->name }}</a></h6>
                            <div class="product_price">@if($product->price > 0)R {{ App\Http\Controllers\Auth\ProductController::Discount($product->price,$product->discount)}} 
                                                       @else  @endif
                                @if($product->price > App\Http\Controllers\Auth\ProductController::Discount($product->price,$product->discount)) <span>R {{ $product->price }} </span> @else  @endif</div>
                        </div>
                    </div>
                    <div class="red_button add_to_cart_button"><a href="{{route('login')}}">add to cart</a></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
