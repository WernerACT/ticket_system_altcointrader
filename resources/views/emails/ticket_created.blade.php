@extends('emails.layouts.base')

@section('content')
    <div>
        <table>
            <tbody>
                <tr>
                    <td style="padding: 10px 15px 0 15px;">
                        <p>Dear AltCoinTrader User,</p>

                        <p>Your ticket with ticket number <strong>{{$ticket->reference}}</strong> has been created.</p>

                        <table>
                            <tbody>
                            @if($ticket->title != 'ACT Web Ticket' || $ticket->title == '')
                                <tr>
                                    <td style="width: 20%"><b>Subject:</b></td>
                                    <td>{{$ticket->title}}</td>
                                </tr>
                            @endif
                                <tr>
                                    <td style="vertical-align: top; width: 20%"><b>Description:</b></td>
                                    <td style="vertical-align: top;">
                                        {!! preg_replace('/(#ACTLINEBREAK#){1,2}/', '<br>', preg_replace('/(#ACTLINEBREAK#){3,}/', '<br><br>', $ticket->description)) !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p>We will attend to your ticket as soon as possible.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
