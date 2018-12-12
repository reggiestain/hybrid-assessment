@extends('layouts.admin')
@section('content')
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Account Balance</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Balance Info</h6>
                </div>
                <div class="card-body p-0 pb-3">

                    <div class="row">
                        <div class="col-sm-12 col-md-8 offset-1" style="margin-top: 50px">   
                            @if(session()->has('success'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('success') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('account.balance') }}">
                                {{ csrf_field() }}
                                <div class="form-group"> 
                                    <label>Account Balance</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R</span>
                                        </div>
                                        <input type="text" name="balance" class="form-control" aria-label="Amount (to the nearest dollar)" 
                                               value="@if($balance == null) 0 @else {{$balance->balance}} @endif">
                                        <div class="input-group-append">
                                            <span class="input-group-text"></span>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group"> 
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>      
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <!-- End Default Light Table -->           
</div>
@endsection
