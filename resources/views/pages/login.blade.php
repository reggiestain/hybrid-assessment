@extends('layouts.app')
@section('content')
<div class="col-md-8 offset-2" style="margin-top: 200px;margin-bottom: 50px">
    @if(session()->has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('error') }}
    </div>
    @endif
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Sign In</legend>
        <form  method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right">Login</button>
            </div>
        </form> 
    </fieldset>
</div>  
@endsection
