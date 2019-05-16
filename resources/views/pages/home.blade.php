@extends('layouts.app')
@section('content')
<!--<div class="main_slider" style="background-image:url(../public/images/slider_1.jpg)">
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
</div>-->
<style>

    .card{
        border: 1px solid #fff;
    } 
    @media only screen and (max-width: 1600px)
    {
        .product_image img{
            width:221px;
            height:276.26px;
        }
    }
    @media screen and (max-width: 600px) {
        .pr-1{
            display: none;  
        }
        .product_image img{
            width:290px;
            height:405.69px;
        }
    }
</style>
@if(!Auth::user())
<div class="main_slider">
    <div class="row">
        <div class="col-lg-6 col-xs-12 py-0 pl-3 pr-1 featcard">
            <div id="featured" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">			  
                        <div class="card bg-dark text-white">
                            <img class="card-img img-fluid" src="public/images/banner/banner-1.jpg" alt="">
                            <div class="card-img-overlay d-flex linkfeat">
                                <!-- <a href="#" class="align-self-end">
                                   <span class="badge">Ekspor</span> 
                                   <h4 class="card-title">Review GSP: Amerika Ingin Perdagangan Saling Menguntungkan</h4>
                                   <p class="textfeat" style="display: none;">makro.id – Duta Besar Amerika Serikat untuk Indonesia Joseph R. Donovan menegaskan, langkah pemerintah Amerika Serikat meninjau ulang pemberian Generalized System od Preferenes (GSP) akan menguntungkan kedua belah pihak.
                                   Menurut Donovan,</p>
                                 </a>-->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">			  
                        <div class="card bg-dark text-white">
                            <img class="card-img img-fluid" src="public/images/banner/banner-2.jpg" alt="">
                            <div class="card-img-overlay d-flex linkfeat">
                                <!-- <a href="http://makro.id/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar" class="align-self-end">
                                   <!--<span class="badge">Pertumbuhan Ekonomi</span> 
                                   <h4 class="card-title">DPR Setujui Penambahan Anggaran BP Batam Rp565 Miliar</h4>
                                   <p class="textfeat" style="display: none;">makro.id - Dewan Perwakilan Rakyat (DPR) menyetujui penambahan anggaran Badan Pengusahaan (BP) Batam Rp565 miliar. Dengan penambahan anggaran di tahun 2019 tersebut diharapkan dapat mendorong percepatan pembangunan Kota Batam.
               
               Anggota Komisi</p>
                                 </a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12 py-0 pl-3 pr-2 featcard">
            <div id="featured" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">			  
                        <div class="card bg-dark text-white">
                            <img class="card-img img-fluid" src="public/images/banner/banner-1.jpg" alt="">
                            <div class="card-img-overlay d-flex linkfeat">
                                <!-- <a href="#" class="align-self-end">
                                   <span class="badge">Ekspor</span> 
                                   <h4 class="card-title">Review GSP: Amerika Ingin Perdagangan Saling Menguntungkan</h4>
                                   <p class="textfeat" style="display: none;">makro.id – Duta Besar Amerika Serikat untuk Indonesia Joseph R. Donovan menegaskan, langkah pemerintah Amerika Serikat meninjau ulang pemberian Generalized System od Preferenes (GSP) akan menguntungkan kedua belah pihak.
                                   Menurut Donovan,</p>
                                 </a>-->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">			  
                        <div class="card bg-dark text-white">
                            <img class="card-img img-fluid" src="public/images/banner/banner-2.jpg" alt="">
                            <div class="card-img-overlay d-flex linkfeat">
                                <!-- <a href="http://makro.id/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar" class="align-self-end">
                                   <!--<span class="badge">Pertumbuhan Ekonomi</span> 
                                   <h4 class="card-title">DPR Setujui Penambahan Anggaran BP Batam Rp565 Miliar</h4>
                                   <p class="textfeat" style="display: none;">makro.id - Dewan Perwakilan Rakyat (DPR) menyetujui penambahan anggaran Badan Pengusahaan (BP) Batam Rp565 miliar. Dengan penambahan anggaran di tahun 2019 tersebut diharapkan dapat mendorong percepatan pembangunan Kota Batam.
               
               Anggota Komisi</p>
                                 </a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="col-sm-6 col-xs-12 py-0 px-1 d-none d-lg-block">
            <div class="row">
                <div class="col-sm-6 col-xs-12 pb-2 mg-1">
                    <div class="card bg-dark text-white">
                        <img class="card-img img-fluid" src="public/images/banner/banner-4.jpg" alt="">
                        <div class="card-img-overlay d-flex">
        <!-- <a href="http://makro.id/bi-atur-standarisasi-qr-code" class="align-self-end">
           <span class="badge">Finansial</span> 
           <h6 class="card-title">BI Atur Standarisasi QR Code</h6>
         </a>
    </div>
</div>
</div>
<div class="col-sm-6 col-xs-12 pb-2 mg-2">
<div class="card bg-dark text-white">
    <img class="card-img img-fluid" src="public/images/banner/banner-3.jpg" alt="">
    <div class="card-img-overlay d-flex">
        <!--<a href="http://makro.id/ptsp-bp-batam-masuk-10-terbaik-di-indonesia" class="align-self-end">
          <span class="badge">Industri</span> 
          <h6 class="card-title">PTSP BP Batam Masuk 10 Terbaik di Indonesia</h6>
        </a>
    </div>
</div>
</div>
<div class="col-sm-6 col-xs-12 pb-2 mg-3">
<div class="card bg-dark text-white">
    <img class="card-img img-fluid" src="public/images/banner/banner-4.jpg" alt="">
    <div class="card-img-overlay d-flex">
        <!--<a href="http://makro.id/review-gsp-amerika-ingin-perdagangan-saling-menguntungkan" class="align-self-end">
          <span class="badge">Ekspor</span> 
          <h6 class="card-title">Review GSP: Amerika Ingin Perdagangan Saling Menguntungkan</h6>
        </a>
    </div>
</div>
</div>
<div class="col-sm-6 col-xs-12 pb-2 mg-4">
<div class="card bg-dark text-white">
    <img class="card-img img-fluid" src="public/images/banner/banner-3.jpg" alt="">
    <div class="card-img-overlay d-flex">
        <!--<a href="http://makro.id/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar" class="align-self-end">
          <span class="badge">Pertumbuhan Ekonomi</span> 
          <h6 class="card-title">DPR Setujui Penambahan Anggaran BP Batam Rp565 Miliar</h6>
        </a>
    </div>
</div>
</div>
</div>
</div>-->
    </div> 
</div> 
<!-- Banner -->
@endif
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
                                <h6 class="product_name"><a href="{{route('options',$product->id)}}">{{ $product->name }}</a></h6>
                                <div class="product_price">@if($product->price > 0)R {{ App\Http\Controllers\Auth\ProductController::Discount($product->price,$product->discount)}} 
                                    @else  @endif
                                    @if($product->price > App\Http\Controllers\Auth\ProductController::Discount($product->price,$product->discount)) <span>R {{ $product->price }} </span> @else  @endif</div>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button">
                            <a href="{{route('options',$product->id)}}">More Options</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>
@endsection
