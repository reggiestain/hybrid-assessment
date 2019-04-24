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
        <h5 class="panel-title">Sign Up</h5>
    </div>    
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-5 col-sm-5 col-xs-6" style="border-right:1px solid #ccc;" id="log-con">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $error }}
                </div>
                @endforeach
                <form class="form-horizontal" method="POST" action="{{ route('register.post') }}">
                    <fieldset>
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" placeholder="Firstname" name="firstname" id="firstname">
                            @if ($errors->has('firstname'))
                            <span class="error text-danger">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                            @endif 
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Surname" name="surname" id="surname">
                            @if ($errors->has('surname'))
                            <span class="error text-danger">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                            @endif
                        </div>   
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                            @if ($errors->has('email'))
                            <span class="error text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            @if ($errors->has('password'))
                            <span class="error text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                            <span class="error text-danger">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                            @captcha
                                        <!--<div class="spacing"><a href="#"><small> Forgot Password?</small></a><br/></div>-->
                                        <!--<div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"><small> Remember me</small></div>-->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" style="width:100%">Sign Up</button>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="col-md-4" id="log-soc">
                <a id="google-button" <a href="{{ url('/login/facebook') }}" class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i> Sign up with Facebook
                    </a><br/>
                    <a href="{{ url('/login/twitter') }}" class="btn btn-block btn-social btn-twitter">
                        <span class="fa fa-twitter"></span> Sign up with Twitter
                    </a><br/>
                    <a id="google-button" class="btn btn-block btn-social btn-google">
                        <i class="fa fa-google"></i> Sign up with Google
                    </a>
            </div>

        </div>

    </div>
</div>
@endsection
