@extends('emails.layouts.base')

@section('content')
    <div align="center">

        <table class="MsoNormalTable" style="width: 550.0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 10px 15px 10px 15px; font-family: Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: .5px; font-weight: 100;  line-height: 21px;">
                    <p>Dear AltCoinTrader User,</p>
                    <p>{!! str_replace('#ACTLINEBREAK#', '<br>', $response) !!}</p>
                    @if (!empty($links))
                        <p>Here are some resources that might help:</p>
                        <ul>
                            @foreach ($links as $link)
                                <a href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                            @endforeach
                        </ul>
                    @endif
                    <p>If you have any further questions, feel free to reply to this email.</p>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection
