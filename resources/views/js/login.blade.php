<script>


    $('#submit').click(function(){
        var post_data = $('#form').serialize();
        let url = '{{route("sign")}}';
        let url_index = '{{route("index")}}';

        $.ajax({

            url:url,
            type: 'post',
            data: post_data,
            dataType:"JSON",
            success: function (response) {

                if(response.code == 0){
                    layer.msg('登录成功');
                    window.location.href = url_index;
                }else{
                    layer.msg(response.msg);
                }

            }
        });

    });
</script>