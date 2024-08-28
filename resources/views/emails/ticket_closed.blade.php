@extends('emails.layouts.base')

@section('content')

    <div align="center">
        <table class="MsoNormalTable" style="width: 550.0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td width="60%">
                    <table>
                        <tr>
                            <td bgcolor="#ffffff" align="left" style="padding: 10px 10px 10px 10px;">
                                <p>Dear AltCoinTrader User,</p>

                                <p>Your ticket with ticket number <strong>{{$ticket->reference}}</strong> has been closed.</p>

                                <p>We hope that your issue has been resolved. If you have any further questions, please do not hesitate to contact us.</p>
                                <p><b>How did we do?</b></p>
                                <p>Review your recent support experience from us and stand a chance to win R1000 in crypto.</p>
                                <p>Every month we will randomly choose a lucky winner regardless of your review either <b>Happy</b> or <b>Sad</b>.</p>
                                <p>T's and C's Apply.</p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="40%">
                    <table>
                        <tr>
                            <td align="center" bgcolor="#ffffff" style="padding: 10px 10px 10px 10px;">
                                <table cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                                    <tr>
                                        <td style="padding: 0 10px;">
                                            <a href="https://www.altcointrader.co.za/support/?ticket={{$ticket->reference}}&review=1&id={{$ticket->id}}" style="display: inline-block;">
                                                <img src="{{ asset('images/altcoin_review_score_happy.png') }}" alt="Happy" style="border: none; width: 100px; height: 100px;">
                                            </a>
                                        </td>
                                        <td style="padding: 0 10px;">
                                            <a href="https://www.altcointrader.co.za/support/?ticket={{$ticket->reference}}&review=2&id={{$ticket->id}}" style="display: inline-block;">
                                                <img src="{{ asset('images/altcoin_review_score_sad.png') }}" alt="Sad" style="border: none; width: 100px; height: 100px;">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
