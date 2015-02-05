<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body style="font-family: arial,sans-serif;">
        <table style="border: 1px solid #efefef; border-radius: 4px; box-shadow: 1px 1px 2px #222;" width="100%">
            <tr>
                <td width="120px;">
                    <img src="<?php echo asset("img/logo_mail.jpg") ?>" style="max-width: 100%;">
                </td>
                <td style=" vertical-align: bottom;">
                    <h3 style="margin-bottom: 0px;">Northernwind Digital Solution Co.,Ltd</h3>
                    <p style="margin: 6px 0px;">122/99 M.2 T.Donkaew A.Maerim Chiangmai Thailand 50180</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="padding: 15px 15px 0px;">
                        <?php echo $content; ?>
                        <p style="text-align: center; font-size: 12px;">DO NOT Reply this email, Please contact us via `northernwind.digital@gmail.com`</p>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
