@extends('emails.layouts.base')

@section('content')
    <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 40px 40px 10px 40px; font-family: Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: .5px; font-weight: 100; color: #999999; line-height: 28px;">
            Dear AltCoinTrader User,
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 10px 40px 10px 40px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: .5px; font-weight: 100; color: #999999; line-height: 28px;">
            Your ticket with Reference ID: <strong>{{$ticket->reference}}</strong> has been created.
            <br><br>
            Subject: {{$ticket->title}}
            <br>
            Description: {{ strip_tags($ticket->description) }}
            <br><br>
            Status: In Progress
            <br><br>
            We will attend to your ticket as soon as possible.
        </td>
    </tr>
@endsection
