<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>AltCoinTrader Support</title>
</head>
<body style="font-size: 12pt; font-family: Arial, sans-serif; height: 100%; margin: 0; padding: 0;">
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td align="center" valign="middle">
            <table class="MsoNormalTable" style="width: 550.0pt; background: #ffffff;">
                <tbody>
                <tr style="background: #242B32 url(https://www.altcointrader.co.za/images/rads-rays-big.png);">
                    <td>
                        @include('emails.partials.header')
                    </td>
                </tr>
                <tr>
                    <td>
                        @yield('content')
                    </td>
                </tr>
                <tr>
                    <td>
                        @include('emails.partials.footer')
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
