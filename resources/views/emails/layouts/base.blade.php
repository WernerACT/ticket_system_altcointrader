<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style='font-size: 10pt; font-family: Open Sans, Verdana, Geneva, sans-serif'>
<div class="WordSection1">
    <table class="MsoNormalTable" style="width: 100.0%; background: #FFF;" border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
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
</div>
</body>
</html>
