@extends('layouts.app')
@section('content')
<div class="col-md-8 offset-2" style="margin-top: 200px">
    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
 
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Register</legend>
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }} 
        <div class="row">     
            <div class="col-md-6 form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" name="firstname" id="firstname">
                @if ($errors->has('firstname'))
                <span class="error text-danger">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif
            </div>
            <div class="col-md-6 form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" name="surname" id="surname">
                @if ($errors->has('surname'))
                <span class="error text-danger">
                    <strong>{{ $errors->first('surname') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="row">
        <div class="col-md-6 form-group">
            <label for="surname">Username:</label>
            <input type="text" class="form-control" name="username" id="username">
            @if ($errors->has('username'))
            <span class="error text-danger">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif
        </div>          
        <div class="col-md-6 form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email">
            @if ($errors->has('email'))
            <span class="error text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password">
            @if ($errors->has('password'))
            <span class="error text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="col-md-6 form-group">
            <label for="cpwd">Confirm Password:</label>
            <input type="password" class="form-control" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
            <span class="error text-danger">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success pull-right">Register</button>
        </div>
    </form>
    </fieldset>
</div>
@endsection
