@extends('emails.layouts.base')

@section('content')
    <div align="center">
        <table class="MsoNormalTable" style="width: 550.0pt;" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr>
                <td style="padding: 10px 15px 0 15px;">
                    <p>Dear AltCoinTrader User,</p>
                    <p>We have received an email sent to us that contains an unsupported attachment.</p>
                    <p>Please note that we only support the following attachments: JPG, JPEG, PNG and PDF.</p>
                    <p>The email you sent contained an attachment with the following extension: {{$fileType}}</p>
                    <p>If the information in the intended attachment is important for you to share with us, please send it again and ensure it is in the correct format.</p>
                    <p>We will attend to your ticket as soon as possible.</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
