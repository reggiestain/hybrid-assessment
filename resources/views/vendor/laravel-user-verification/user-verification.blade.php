@extends('layouts.app')
@section('content')
<style>
@media only screen and (max-width: 1600px)
    {
        .p-top{
            margin-top: 200px;
        }
    }
    @media only screen and (max-width: 600px) {
        .p-top{
            margin-top: 100px;
        }
    }
</style>
<div class="container p-top">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('resend-verification.token') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


