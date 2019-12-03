<script>
    var form = $("#form");
    var f = $("#file");
    var c = $("#current");
    var i = $('#portrait');
    var portraits = $('#portraits');
    var ferror = $('#ferror');
    f.on('change',function(){

        var formData = new FormData();
        formData.append("file", $("#file")[0].files[0]);
        var url = '/portrait';
        var data = formData;
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(data,response);
                if(response.code==0){
                    c.attr('src',form.data('url')+response.data.path);
                    portraits.val(response.data.path)
                }else{
                    ferror.text(response.message);
                    ferror.show();
                    ferror.delay(3000).hide(0);
                    console.log(response.status);
                }
            }
        });
    });


    $('#submit').click(function(){

        let url_verify = '{{route("verifySignUp")}}';
        $.ajax({
            url: url,
            type: 'post',
            data: form.serialize(),
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.code==0){
                    window.location.href = url_verify;
                }else{
                    layer.msg(response.msg);
                }
            }
        });
    });
</script>