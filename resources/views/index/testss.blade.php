<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Paypal订单支付</title>
</head>
<body>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST"  name="form_starPay"> <!-- // Live https://www.paypal.com/cgi-bin/webscr -->
    <input type='hidden' name='cmd' value='_xclick'>  <!-- //告诉paypal该表单是立即购买 -->
    <input type='hidden' name='business' value='test-facilitator@test.com'> <!-- //卖家帐号 也就是收钱的帐号 -->
    <input type='hidden' name='item_name' value='支付订单:20180828080706000039'> <!-- //商品名称 item_number -->
    <input type='hidden' name='item_number' value='20180828080706000039'> <!-- //物品号 item_number -->
    <input type='hidden' name='amount' value='10'> <!-- .// 订单金额 -->
    <input type='hidden' name='currency_code' value='JPY'> <!-- .// 货币 -->
    <input type='hidden' name='return' value='http://pay.followerstagmanager.xyz/pay/test2'> <!-- .// 支付成功后网页跳转地址 -->
    <input type='hidden' name='notify_url' value='http://pay.followerstagmanager.xyz/pay/test'> <!-- .//支付成功后paypal后台发送订单通知地址 -->
    <input type='hidden' name='cancel_return' value='http://pay.followerstagmanager.xyz/pay/test2'> <!-- .//用户取消交易返回地址 -->
    <input type='hidden' name='invoice' value='20180828080706000039'> <!-- .//自定义订单号 -->
    <input type='hidden' name='charset' value='utf-8'> <!-- .// 字符集 -->
    <input type='hidden' name='no_shipping' value='1'> <!-- .// 不要求客户提供收货地址 -->
    <input type='hidden' name='no_note' value='1'> <!-- .// 付款说明 -->
    <input type='hidden' name='rm' value='2'> <!-- 不知道是什么 -->
    <input type="image" name="submit"   src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" />
</form>
正在跳转Paypal支付，请稍等。。。
<script>
    function sub(){
        document.form_starPay.submit();
    }
    onload(sub())
</script>
</body>
</html>
