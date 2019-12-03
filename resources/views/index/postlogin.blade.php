<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>易盾验证码-DEMO</title>
    <!-- 演示用js/css，非组件依赖 -->
    <link href='//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.css' rel='stylesheet'>
</head>
<body>
{{ csrf_field() }}
<form style="max-width: 320px; margin: 120px auto;" action="/postlogin" method="post" >
    <h2 class="form-signin-heading">易盾验证码</h2>
    <input type="text" class="form-control" name="username" placeholder="账号" />
    <input type="password" class="form-control" name="password" placeholder="密码" />
    <div style="margin: 10px auto;" id="captcha_div"></div> <!-- 验证码容器元素定义 -->
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit-btn">登录</button>
</form>
<script src="//cstaticdun.126.net/load.min.js"></script>
<script type="text/javascript" charset="UTF-8" async="" src="https://cstaticdun.126.net/plugins.min.js"></script>
<script> // 验证码组件初始化
    initNECaptcha({
        captchaId: 'b1f6ed6b53da4af2bb16fdcd59ba19c3', // <-- 这里填入在易盾官网申请的验证码id
        element: '#captcha_div',
        mode: 'float',
        width: '320px',
        onVerify: function(err, ret){
            if(!err){
                // ret['validate'] 获取二次校验数据
            }
        }
    }, function (instance) {
        console.log(instance);
        // 初始化成功后得到验证实例instance，可以调用实例的方法
    }, function (err) {
        console.log(err);
        // 初始化失败后触发该函数，err对象描述当前错误信息
    });
</script>
</body>
</html>