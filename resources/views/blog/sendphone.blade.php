<body onbeforeunload="onbeforeunload()">

<input type="button" value="点击发送验证码" />
<div style="color:red"><p>距离下次发送验证码还有：<span id="time"></span>s</p></div>
<script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
<script type="text/javascript">

    var time = 60 ,//倒计时秒数
            localstroage = window.localStorage ,//获取本地存储对象
            t = localstroage.getItem("remainderTime") ; //得到保存在本地存储中的remainderTime的值

    //浏览器刷新的时候触发的方法
    function onbeforeunload(){
        //如果开始时间不等于且不等于0，刷新的时候就把剩余倒计时的秒数保存到本地存储中，名字叫remainderTime
        if(time!=60&&time!=0){
            localstroage.setItem("remainderTime",time) ;
        }
    }
    //加载页面的时候，获取本地存储中的remainderTime值，有就说明刷新过，就把倒计时开始时间变为t
    if(t!=null){
        time = t ;
        $("#time").text(time) ;
        remainderTime();
    }

    function remainderTime(){
        timer = setInterval(function(){
            time -- ;
            $("#time").text(time) ;
            if(time==0){
                //当秒数为0的时间就移除本地存储中的remainderTime值
                localstroage.removeItem("remainderTime") ;
                //清空定时器
                clearInterval(timer) ;
                time = 60 ;
                $("input").attr("disabled",false) ;
            }

        },1000) ;
    }
    //倒计时
    $("input").click(function(){
        $(this).attr("disabled",true) ;
        if(time!=60){
            return ;
        }
        remainderTime() ;
    }) ;



</script>
</body>