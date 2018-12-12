<style>
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
    color: #fe4c50;
}

.pricetext span{
font-size: 12px;
    margin-left: 10px;
    color: #b5aec4;
    text-decoration: line-through
}        
</style>
<div class="col-md-12 column productbox">
    <img src="{{$product->mime_type}}" class="img-responsive">
    <div class="producttitle">{{$product->name}}</div>
    <div class="productprice"><div class="pull-right">
    <a href="#" id="{{$product->id}}" class="btn btn-success buy" role="button">BUY</a>
    </div>
    <div class="pricetext">@if($product->price > 0)R {{App\Http\Controllers\Auth\ProductController::Discount($product->price,$product->discount)}} 
                                                       @else  @endif
                                @if($product->discount > 0) <span>R {{ $product->price }} </span> @else  @endif</div>            
    </div>
</div>