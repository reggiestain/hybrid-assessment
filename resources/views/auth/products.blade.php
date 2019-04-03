@extends('layouts.admin')
@section('content')
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Products Table</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Products</h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    @if ($errors->has('price'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ $errors->first('price') }}</strong>
                    </div>
                    @endif
                    @if ($errors->has('discount'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ $errors->first('discount') }}</strong>
                    </span>
                    @endif
                    <table class="table mb-0" id="product">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0"># ID</th>
                                <th scope="col" class="border-0">Image</th>
                                <th scope="col" class="border-0">Name</th>                                
                                <th scope="col" class="border-0">Category</th>
                                <th scope="col" class="border-0">Price</th>
                                <th scope="col" class="border-0">Discount</th>
                                <th scope="col" class="border-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="{{$product->mime_type}}" style="width:50px;height:50px"/></td>
                                <td><span class="btn btn-danger">{{$product->name}}</span></td>
                                <td>{{$product->product_category->name}}</td>
                                <td>{{$product->price}} </td>
                                <td>{{$product->discount}}</td>
                                <td>
                                    @if(Auth::user()->user_group_id == 2)
                                    <a href="#" class="btn btn-primary p-check" data-toggle="tooltip" data-placement="top" title="Buy this product" id="{{ $product->id }}">
                                        <span class="fa fa-shopping-cart"></span></a>  
                                    @elseif(Auth::user()->user_group_id == 1)
                                    <a href="#" id="{{$product->id}}" class="btn btn-primary set-discount" data-toggle="tooltip" data-placement="top" title="Set product discount">
                                        <span class="fa fa-edit"></span></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->           
</div>
@endsection
