<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $subject ?? 'Notificación MyFood' }}</title>
</head>

<body style="margin:0; padding:0; font-family: 'Century Gothic', sans-serif; background-color:#f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding: 2rem 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                    <tr>
                        <td
                            style="background-color:#40798c; color:white; padding:1rem; text-align:center; font-size:1.5rem; font-weight:bold;">
                            MyFood
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:2rem;">
                            <h2 style="color:#333; margin-bottom:1rem;">{{ $messageBody['title'] }}</h2>
                            <p style="color:#555; font-size:1rem; line-height:1.5;">{{ $messageBody['content'] }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="background-color:#f1f1f1; color:#777; padding:1rem; text-align:center; font-size:0.9rem;">
                            Gracias por usar <strong>MyFood</strong> 🍽️<br>
                            <a href="{{ url('/') }}" style="color:#40798c; text-decoration:none;">Visita nuestra web</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>