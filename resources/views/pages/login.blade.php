@extends('layouts.app')
@section('content')
<style>

    p {
        color:#CCC;
    }

    .spacing {
        padding-top:7px;
        padding-bottom:7px;
    }
    .middlePage {
        width: 680px;
        height: 500px;
        position: absolute;
        top:0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    .logo {
        color:#CCC;
    } 
    
    @media screen and (max-width: 600px) {
    #log-con{
        margin-left: 5%;
        margin-right: 5%;
    }
    #log-soc{
        margin-left: 20px;
        margin-right: 20px;
    }
    .panel-info{
        margin-top: 120px !important;
    }
}
    
</style>

<div class="panel panel-info" style="">
    <div class="panel-heading" id="log-con">
        <h4 class="panel-title">Sign In</h4>
    </div>    
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-5 col-sm-5 col-xs-6" style="border-right:1px solid #ccc;height:160px;" id="log-con">
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('error') }}
                </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    <fieldset>
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input id="textinput" name="email" type="email" placeholder="Email" class="form-control input-md"> 
                        </div>
                        <div class="form-group">
                            <input id="textinput" name="password" type="password" placeholder="Password" class="form-control input-md">
                        </div>
                        <!--<div class="spacing"><a href="#"><small> Forgot Password?</small></a><br/></div>-->
                        <!--<div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"><small> Remember me</small></div>-->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-right">Login</button>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="col-md-4" id="log-soc">
                <a id="google-button" <a href="{{ url('/login/facebook') }}" class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i> Sign in with Facebook
                </a><br/>
                <a class="btn btn-block btn-social btn-twitter">
                    <span class="fa fa-twitter"></span> Sign in with Twitter
                </a><br/>
                <a id="google-button" class="btn btn-block btn-social btn-google">
                    <i class="fa fa-google"></i> Sign in with Google
                </a>
            </div>

        </div>

    </div>
</div>
@endsection
