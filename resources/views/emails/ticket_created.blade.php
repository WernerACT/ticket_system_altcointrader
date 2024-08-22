@extends('emails.layouts.base')

@section('content')
    <div align="center">
        <table class="MsoNormalTable" style="width: 550.0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 10px 15px 10px 15px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: .5px; font-weight: 100; line-height: 21px;">
                        <p>Dear AltCoinTrader User,</p>

                        <p>Your ticket with Reference ID <strong>{{$ticket->reference}}</strong> has been created.</p>

                        <p><strong>Subject:</strong> {{$ticket->title}}</p>

                        <p><strong>Description:</strong> {{ strip_tags($ticket->description) }}</p>

                        <p><strong>Status:</strong> {{ $ticket->status->name }}</p>

                        <p>We will attend to your ticket as soon as possible.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
