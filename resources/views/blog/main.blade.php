<!doctype html>

<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <title>BioTo-着陆页面即将到来响应模板</title>

    <meta name="description" content="A responsive coming soon template, un template HTML pour une page en cours de construction">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">


    <link rel="stylesheet" href="{{ asset('css/blog/normalize.css') }}">

    <link rel="stylesheet" href="{{ asset('css/blog/pageloader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/stylesheet2.css') }}">
    <link rel="stylesheet" href=" https://cdn.bootcss.com/ionicons/1.5.2/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('css/blog/foundation.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/jquery.fullPage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/vegas.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/blog/main.css?s=2') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/main_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog/style-font1.css') }}">
    <link rel="stylesheet" href="{{ asset('layer/theme/default/layer.css') }}">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="{{ asset('js/blog/modernizr-2.7.1.min.js') }}"></script>

</head>
<body id="menu" class="alt-bg">
<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<div class="page-loader" id="page-loader">
    <div><i class="ion ion-loading-d"></i><p>loading</p></div>
</div>


<header class="header-top">

    <div class="logo">
        <a href="#home">
            <img src="{{ asset('img/blog/logo_large.png') }}" alt="Logo Brand">
        </a>
    </div>
    <div class="menu clearfix">
        <a href="#about-us">关于</a>

        <a href="#contact">联系</a>
    </div>

    <div class="right" style="position: fixed;z-index: 20;top: 0;right: 0;height: 56px;">
        <div class="menu clearfix">
            <a href="/sign">登录</a>
            <a href="/signup">注册</a>
        </div>
    </div>
</header>

@section('body')
@show


<script src="{{ asset('js/blog/jquery-1.11.2.min.js') }}"></script>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

<script src="{{ asset('js/blog/all.js') }}"></script>

<script src="{{ asset('js/blog/jquery.downCount.js') }}"></script>

<script src="{{ asset('js/blog/form_script.js') }}"></script>

<script src="{{ asset('js/blog/main.js') }}"></script>
<script src="{{ asset('layer/layer.js') }}"></script>


@section('script')
@show

</body>
</html>
