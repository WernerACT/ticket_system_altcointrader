@extends('emails.layouts.base')

@section('content')
    <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 40px 40px 10px 40px; font-family: Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: .5px; font-weight: 100; color: #999999; line-height: 28px;">
            Dear AltCoinTrader User,
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 10px 40px 10px 40px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: .5px; font-weight: 100; color: #999999; line-height: 28px;">
            Your ticket with Reference ID: <strong>{{$ticket->reference}}</strong> has been closed.
            <br><br>
            We hope that your issue has been resolved. If you have any further questions, please do not hesitate to contact us.
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 40px 40px 10px 40px; font-family: Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: .5px; font-weight: 100; color: #999999; line-height: 28px;">
            <b>Review Our Support</b>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="left" style="padding: 20px 40px 10px 40px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: .5px; color: #6c757d; line-height: 24px;">

            <p>Review your recent support experience from us and stand a chance to win R1000 in crypto.</p>
            <p>Every month we will randomly choose a lucky winner regardless of your review either <b>Happy</b> or <b>Sad</b>.</p>
            <p>Please note <a href="https://www.altcointrader.co.za/terms_and_conditions_support" target="_blank" style="color: #007bff; text-decoration: underline;">Terms and Conditions</a> apply.</p>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#ffffff" style="padding: 10px 40px 40px 40px;">
            <table cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                <tr>
                    <td align="center" style="padding: 0 10px;">
                        <a href="https://www.altcointrader.co.za/support/?ticket={{$ticket->reference}}&review=1&id={{$ticket->id}}" style="display: inline-block; background-color: #28a745; color: #ffffff; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; padding: 12px 24px; border-radius: 5px;">
                            Happy
                        </a>
                    </td>
                    <td align="center" style="padding: 0 10px;">
                        <a href="https://www.altcointrader.co.za/support/?ticket={{$ticket->reference}}&review=2&id={{$ticket->id}}" style="display: inline-block; background-color: #dc3545; color: #ffffff; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; padding: 12px 24px; border-radius: 5px;">
                            Sad
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
