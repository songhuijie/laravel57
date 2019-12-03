<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>验证码</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;color: rgb(113, 113, 113);font-size: 14px;font-family: arial, verdana, sans-serif;line-height: 1.666;overflow: auto;white-space: normal;word-wrap: break-word;letter-spacing: 0.5px;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" height="900" style="border-collapse: collapse;background-image: url('{{\App\Libraries\Lib_base::getLogoImg()}}');background-repeat:no-repeat;background-size: 100% auto;" >
                <tr><td style="font-size: 0; line-height: 0;" height="500">&nbsp;</td></tr>
                <tr>
                    <td style="padding: 6px 46px 40px 55px;" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-size: 20px;color: #808080">
                                    你的验证码是：
                                </td>
                            </tr>
                            <tr><td style="font-size: 0; line-height: 0;" height="26";>&nbsp;</td></tr>
                            <tr height="38">
                                <td>
                                    <b style="color: #666666;font-size: 66px;color: rgb(74, 74, 74); font-family: 'Avenir','Pinfang SC','微软雅黑'">{{$code}}</b>
                                </td>
                            </tr>
                            <tr><td style="font-size: 0; line-height: 0;" height="26">&nbsp;</td></tr>
                            <tr>
                                <td style="font-size: 20px;color: #808080">
                                    如果不是你，请忽略这个信息。可能有人错误地输入了你的用户名或电子邮件。
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>