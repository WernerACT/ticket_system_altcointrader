@extends('emails.layouts.base')

@section('content')
    <div align="center">
        <table class="MsoNormalTable" style="width: 550.0pt;" border="0" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 10px 15px 0 15px;">
                        <p>Dear AltCoinTrader User,</p>
                        <p>{!! str_replace('#ACTLINEBREAK#', '<br>', $response) !!}</p>
                        @if (isset($links) && count($links) > 0)
                            <p>Here are some resources that might help:</p>
                            <ul>
                                @foreach ($links as $link)
                                    <li><a href="{{ $link['url'] }}" target="_blank">{{ $link['title'] }}</a></li>
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
