<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
<form action="/testss" method="post" id="brainTree">
    <input type="hidden" name="plan_id" value="one_day">
</form>
<div id="dropin-container"></div>
<button id="submit-button">Purchase</button>

<script src="https://js.braintreegateway.com/web/dropin/1.16.0/js/dropin.min.js"></script>
<script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
<script>
    var submitButton = document.querySelector('#submit-button');

    braintree.dropin.create({
        authorization: 'eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiIxZDQwMDMwZjY1NTlmNmQwNTkwNzg1MTM3YmNmNWU4ODFhYjgyYzcyM2U4NWI5MWM2OWFiZDFjNTczYTc5ZjIxfGNyZWF0ZWRfYXQ9MjAxOS0wMy0wOFQwMzoxMzo0Ny4xNjI2NTgxODYrMDAwMFx1MDAyNm1lcmNoYW50X2lkPWg0dDc5cXRtdGMzbTl6anhcdTAwMjZwdWJsaWNfa2V5PXpxZGh4eWJ2Y3Z0eW5ydGciLCJjb25maWdVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvaDR0NzlxdG10YzNtOXpqeC9jbGllbnRfYXBpL3YxL2NvbmZpZ3VyYXRpb24iLCJncmFwaFFMIjp7InVybCI6Imh0dHBzOi8vcGF5bWVudHMuc2FuZGJveC5icmFpbnRyZWUtYXBpLmNvbS9ncmFwaHFsIiwiZGF0ZSI6IjIwMTgtMDUtMDgifSwiY2hhbGxlbmdlcyI6W10sImVudmlyb25tZW50Ijoic2FuZGJveCIsImNsaWVudEFwaVVybCI6Imh0dHBzOi8vYXBpLnNhbmRib3guYnJhaW50cmVlZ2F0ZXdheS5jb206NDQzL21lcmNoYW50cy9oNHQ3OXF0bXRjM205emp4L2NsaWVudF9hcGkiLCJhc3NldHNVcmwiOiJodHRwczovL2Fzc2V0cy5icmFpbnRyZWVnYXRld2F5LmNvbSIsImF1dGhVcmwiOiJodHRwczovL2F1dGgudmVubW8uc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbSIsImFuYWx5dGljcyI6eyJ1cmwiOiJodHRwczovL29yaWdpbi1hbmFseXRpY3Mtc2FuZC5zYW5kYm94LmJyYWludHJlZS1hcGkuY29tL2g0dDc5cXRtdGMzbTl6angifSwidGhyZWVEU2VjdXJlRW5hYmxlZCI6dHJ1ZSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImRpc3BsYXlOYW1lIjoiamllIiwiY2xpZW50SWQiOm51bGwsInByaXZhY3lVcmwiOiJodHRwOi8vZXhhbXBsZS5jb20vcHAiLCJ1c2VyQWdyZWVtZW50VXJsIjoiaHR0cDovL2V4YW1wbGUuY29tL3RvcyIsImJhc2VVcmwiOiJodHRwczovL2Fzc2V0cy5icmFpbnRyZWVnYXRld2F5LmNvbSIsImFzc2V0c1VybCI6Imh0dHBzOi8vY2hlY2tvdXQucGF5cGFsLmNvbSIsImRpcmVjdEJhc2VVcmwiOm51bGwsImFsbG93SHR0cCI6dHJ1ZSwiZW52aXJvbm1lbnROb05ldHdvcmsiOnRydWUsImVudmlyb25tZW50Ijoib2ZmbGluZSIsInVudmV0dGVkTWVyY2hhbnQiOmZhbHNlLCJicmFpbnRyZWVDbGllbnRJZCI6Im1hc3RlcmNsaWVudDMiLCJiaWxsaW5nQWdyZWVtZW50c0VuYWJsZWQiOnRydWUsIm1lcmNoYW50QWNjb3VudElkIjoiamllIiwiY3VycmVuY3lJc29Db2RlIjoiVVNEIn0sIm1lcmNoYW50SWQiOiJoNHQ3OXF0bXRjM205emp4IiwidmVubW8iOiJvZmYifQ==',
        selector: '#dropin-container'
    }, function (err, dropinInstance) {
        if (err) {
            // Handle any errors that might've occurred when creating Drop-in
            console.error(err);
            return;
        }
        submitButton.addEventListener('click', function () {
            dropinInstance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    // Handle errors in requesting payment method
                } else{
                    var form = $("#brainTree");
                    form.append($('<input type="hidden" name="paymentMethodNonce" />').val(payload.nonce));
                    form.get(0).submit();
                }


                // Send payload.nonce to your server
            });
        });
    });
</script>
</body>
</html>
