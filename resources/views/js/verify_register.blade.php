<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/hmac-sha256.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var form = $("#form");

    let api_key = 'oYj0v2Wvjs7kloBpfyifZGlW2xPPkiSkjl1zuaagldp52JbaYcrXoxMGOt0Imsqi';
    let api_secret = 'Ks0wAVWp5LFtroQtxRTp8IBZb2LCXxUUunCrxSeRgRNOi7qjFMzf8vWMeJD5OsuI';

    $('#submit').click(function(){
        console.log(1)
        var sing ='POST1539936324912EV1Thttps://dev-api.et.exchange/v1/common/verifycode?lang=en-uscode=880111&email=847450261%40qq.com&status=2';
        sing = window.btoa('POST1539936324912EV1Thttps://dev-api.et.exchange/v1/common/verifycode?lang=en-uscode=880111&email=847450261%40qq.com&status=2');
        console.log(sing);
        sing = CryptoJS.HmacSHA256(sing,api_secret).toString();
        console.log(sing);
        sing = window.btoa(sing);
        console.log(sing);
        console.log(1)
        var timestamp = new Date().getTime();

        {{--let url_verify = '{{route("verifySignUp")}}';--}}
        let url= 'https://dev-api.et.exchange/v1/common/verifycode?lang=en-us';

        var signature = makeSign('POST',timestamp,url,form.serialize(),api_secret);
        //headers: {"ET-API-KEY": api_key,"ET-TIMESTAMP": timestamp,"ET-SIGNATURE":signature}

        axios({
            url:url,
            method: 'post',
            data: form.serialize(),
            headers:{
                'ET-API-KEY':api_key,
                'ET-TIMESTAMP':timestamp,
                'ET-SIGNATURE':signature,
            }
        }
        );




       $.ajax({
           url: url,
           type: 'post',
           data: form.serialize(),
           beforeSend: function(request) {
               request.setRequestHeader("ET-API-KEY", api_key);
               request.setRequestHeader("ET-TIMESTAMP", timestamp);
               request.setRequestHeader("ET-SIGNATURE", signature);
           },

           success: function (response) {
               console.log(response)
           }
       });
    });

    $('#send').click(function(){
        var timestamp = new Date().getTime();
        console.log(timestamp)
        let url= 'https://dev-api.et.exchange/v1/common/verifycode?lang=en-us';

        var signature = makeSign('POST',timestamp,url,form.serialize(),api_secret);

        axios({
                    url:url,
                    method: 'post',
                    data: form.serialize(),
                    headers:{
                        'ET-API-KEY':api_key,
                        'ET-TIMESTAMP':timestamp,
                        'ET-SIGNATURE':signature,
                    }
                }
        );

    });



    function makeSign(method,timestamps,url,post_data,api_secret){

        var check_sign = '';
        //post_data 需要排序
        var string =   method + timestamps + 'EV1T' + url + post_data;
         string = 'POST1539936324912EV1Thttps://dev-api.et.exchange/v1/common/verifycode?lang=en-uscode=880111&email=847450261@qq.com&status=2';
        console.log(string);
        var str = window.btoa(CryptoJS.HmacSHA256(window.btoa(string),api_secret).toString());
        console.log(str);
        return str;
    }
</script>
