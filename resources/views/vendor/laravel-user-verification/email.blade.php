@extends('layouts.email')
@section('content')
<td align="left" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
    <!-- section text ======-->

    <p style="line-height: 24px; margin-bottom:15px;">

       Hi {{ Auth::user()->firstname}},

    </p>
    <p style="line-height: 24px;margin-bottom:15px;">
        Click here to verify your account: <a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a>
    </p>

</td>
@endsection