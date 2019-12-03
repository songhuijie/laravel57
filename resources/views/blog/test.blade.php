<style>

    .file {
        position: relative;
        display: inline-block;
        background: #D0EEFF;
        border: 1px solid #99D3F5;
        border-radius: 4px;
        padding: 4px 12px;
        overflow: hidden;
        color: #1E88C7;
        text-decoration: none;
        text-indent: 0;
        line-height: 20px;
    }
    .file input {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 0;
    }
    .file:hover {
        background: #AADFFD;
        border-color: #78C3F3;
        color: #004974;
        text-decoration: none;
    }
</style>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<h2>创建模态框（Modal）</h2>
<!-- 按钮触发模态框 -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">开始演示模态框</button>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">模态框（Modal）标题</h4>
            </div>
            <div class="modal-body">在这里添加一些文本</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">提交更改</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<a href="javascript:;" class="file">选择文件
    <input type="file" name="" id="">
</a>

    <input type="text" name="" id="e" value="18080952663@sina.cn">
    <input type="button" name="" id="c">
<img src="" id="qurl">
<script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>

    $('#c').click(function(){
        var qurl = getQRCodeGoogleUrl('et.web.dev','LHESUDKME6SOAB56','ET',[]);
       console.log(qurl);
        $('#qurl').attr('src',qurl)
    });


    function getQRCodeGoogleUrl(name, secret, title  , params = []) {

        var width = (params['width'] == undefined) && params['width'] > 0 ? params['width']: 200;
        var height = (params['height'] == undefined) && params['height'] > 0 ? params['height']:200;
        var level = (params['level'] == undefined) && jQuery.inArray(params['level'],['L', 'M', 'Q', 'H']) !== -1 ? params['level'] : 'M';

        var urlencoded = encodeURIComponent('otpauth://totp/'+ name +'?secret='+secret);
        if ((title != undefined)) {
            urlencoded += encodeURIComponent('&issuer=' + encodeURIComponent(title));
        }

        return 'https://chart.googleapis.com/chart?chs=' + width + 'x' + height + '&chld=' + level + '|0&cht=qr&chl=' + urlencoded;

    }
</script>