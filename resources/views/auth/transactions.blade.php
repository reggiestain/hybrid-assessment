@extends('layouts.admin')
@section('content')
<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Transactions Table</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Transactions</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0" id="trans">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0"># ID</th>
                          <th scope="col" class="border-0">Product</th>
                          <th scope="col" class="border-0">Category</th>
                          <th scope="col" class="border-0">Price</th>
                          <th scope="col" class="border-0">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($trans as $tran)
                        <tr>
                          <td>{{$tran->id}}</td>
                          <td>{{$tran->product->description}}</td>
                          <td>{{$tran->product->product_category->name}}</td>
                          <td>{{$tran->product->price}}</td>
                          <td>{{$tran->created_at}}</td>
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
