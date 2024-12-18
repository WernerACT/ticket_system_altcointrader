@extends('emails.layouts.base')

@section('content')
    <div>
        <table>
            <tbody>
            <tr>
                <td style="padding: 10px 15px 0 15px;">
                    <p>Dear AltCoinTrader User,</p>

                    <p>
                        {!! preg_replace('/(#ACTLINEBREAK#){1,2}/', '<br><br>',
                            preg_replace('/(#ACTLINEBREAK#){3,}/', '<br><br>', $message)) !!}
                    </p>

                    <p>If applicable please respond to this email and we will gladly assist you further</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
