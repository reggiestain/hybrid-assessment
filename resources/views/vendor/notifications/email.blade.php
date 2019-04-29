@extends('layouts.email')
@section('content')
<td align="left" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
    <!-- section text ======-->

    <p style="line-height: 24px; margin-bottom:15px;">

        Hi {{ Auth::user()->firstname}},

    </p>
    <p style="line-height: 24px;margin-bottom:15px;">
        {{-- Intro Lines --}}
        @foreach ($introLines as $line)
        {{ $line }}

        @endforeach

        {{-- Action Button --}}
        @isset($actionText)
        <?php
        switch ($level) {
            case 'success':
            case 'error':
                $color = $level;
                break;
            default:
                $color = 'primary';
        }
        ?>
        @endisset
    </p>

</td>
@endsection
