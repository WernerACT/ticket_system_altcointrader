@extends('emails.layouts.base')

@section('content')
    <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 40px 40px 10px 40px; font-family: Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: .5px; font-weight: 100; color: #999999; line-height: 28px;">
            Dear AltCoinTrader User,
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 10px 40px 10px 40px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: .5px; font-weight: 100; color: #999999; line-height: 28px;">
            We have responded to your ticket with Reference ID: <strong>{{$ticket->reference}}</strong>.
            <br><br>
            {{ strip_tags($response) }}
            <br><br>
            @if (!empty($links))
                <p>Here are some resources that might help:</p>
                <ul>
                    @foreach ($links as $link)
                        <a href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                    @endforeach
                </ul>
            @endif
            <br><br>
            If you have any further questions, feel free to reply to this email.
        </td>
    </tr>
@endsection
