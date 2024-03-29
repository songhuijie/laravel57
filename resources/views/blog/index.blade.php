@extends('blog.main')

@section('body')
<nav class="quick-link count-6 nav-left">
    <ul id="qmenu">
        <li data-menuanchor="home">
            <a href="#home" class=""><i class="icon ion ion-home"></i>
            </a>
            <span class="title">首页</span>
        </li>
        <li data-menuanchor="when">
            <a href="#when" class=""><i class="icon ion ion-android-alarm"></i>
            </a>
            <span class="title">时间</span>
        </li>
        <li data-menuanchor="register">
            <a href="#register"><i class="icon ion ion-compose"></i>
            </a>
            <span class="title">保持联系</span>
        </li>
        <li data-menuanchor="about-us">
            <a href="#about-us"><i class="icon ion ion-android-information"></i>
            </a>
            <span class="title">关于我们</span>
        </li>
        <li data-menuanchor="contact">
            <a href="#contact"><i class="icon ion ion-android-call"></i>
            </a>
            <span class="title">联系</span>
        </li>
        <li data-menuanchor="contact">
            <a href="#contact/message"><i class="icon ion ion-email"></i>
            </a>
            <span class="title">联系我们</span>
        </li>
    </ul>
</nav>


<div class="page-cover" id="home">

        <div class="cover-bg pos-abs full-size bg-img" data-image-src="{{ asset('img/blog/bg-slide6.jpg') }}"></div>

    <div class="cover-bg pos-abs full-size slide-show">
        <i class='img' data-src='{{ asset('img/blog/bg-slide6.jpg') }}'></i>
        <i class='img' data-src='{{ asset('img/blog/bg-slide7.jpg') }}'></i>
        <i class='img' data-src='{{ asset('img/blog/bg-slide8.jpg') }}'></i>
        <i class='img' data-src='{{ asset('img/blog/bg-slide9.jpg') }}'></i>
    </div>

    <div class="cover-bg pos-abs full-size bg-color" data-bgcolor="rgba(51, 2, 48, 0.12)"></div>
</div>


<main class="page-main" id="mainpage">

    <div class="section page-home page page-cent" id="s-home">

        <div class="logo-container">
            <img class="h-logo" src="{{ asset('img/blog/logo_only.png') }}" alt="Logo">
        </div>

        <section class="content">
            <header class="header">
                <div class="h-left">
                    <h2>My <strong>BLOG</strong></h2>
                </div>
                <div class="h-right">
                    <h3>游泳 <br>健身</h3>
                    <h4 class="subhead"><a href="#when">了解一下</a></h4>
                </div>
            </header>
        </section>

        <footer class="p-footer p-scrolldown">
            <a href="#when">
                <div class="arrow-d">
                    <div class="before">联系 </div>
                    <div class="after">我们</div>
                    <div class="circle"></div>
                </div>
            </a>
        </footer>
    </div>


    <div class="section page-when page page-cent" id="s-when">
        <section class="content">
            <div class="clock clock-countdown">
                <div class="site-config" data-date="{{date('Y-m-d H:i:s')}}" data-date-timezone="+0"></div>
                <header class="header">
                    Coming <strong>soon</strong>
                </header>
                <div class="elem-left">
                    <div class="digit hours">00</div>
                    <div class="text">hrs</div>
                </div>
                <div class="elem-center">

                    <span class="text top"><img class="img" alt="Logo" src="{{ asset('img/blog/logo_large.png') }}"></span>
                    <div class="digit days">000</div>
                    <div class="text">days</div>
                </div>
                <div class=" elem-right">
                    <div class="digit minutes">00</div>
                    <div class="text">min</div>
                </div>

                <div class="second">
                    <input class="knob container" id="second-knob" data-width="400" data-height="400" data-displayInput=false data-fgColor="#fff" data-bgColor="rgba(255,255,255,0)" data-thickness=".07" value="0" data-displayPrevious=true data-max="6000" />
                </div>
            </div>
        </section>
        <footer class="p-footer p-scrolldown">
            <a href="#register">
                <div class="arrow-d">
                    <div class="before">Stay&nbsp;in</div>
                    <div class="after">Touch</div>
                    <div class="circle"></div>
                </div>
            </a>
        </footer>
    </div>


    <div class="section page-register page page-cent " id="s-register">
        <section class="content">
            <header class="p-title">
                <h3>注册 <i class="ion ion-compose"></i></h3>
            </header>
            <div>
                <form id="mail-subscription" class="form magic send_email_form" method="get" action="ajaxserver/serverfile.php">
                    <p class="invite center">请写下你的电子邮箱与我们联系</p>
                    <div class="fields clearfix">
                        <div class="input">
                            <label for="reg-email">邮箱 </label>
                            <input id="reg-email" class="email_f" name="email" type="email" required placeholder="your@email.address" data-validation-type="email"></div>
                        <div class="buttons">
                            <button id="submit-email" class="button email_b" name="submit_email">Ok</button>
                        </div>
                    </div>
                    <p class="email-ok invisible"><strong>Thank you</strong> for your subscription. We will inform you.</p>
                </form>
            </div>
        </section>
        <footer class="p-footer p-scrolldown">
            <a href="#about-us">
                <div class="arrow-d">
                    <div class="before">关于</div>
                    <div class="after">Jike</div>
                    <div class="circle"></div>
                </div>
            </a>
        </footer>
    </div>


    <div class="section page-about page page-cent" id="s-about-us">
        <section class="content">
            <header class="p-title">
                <h3>关于 我们<i class="ion ion-android-information">
                    </i>
                </h3>
                <h2> 任何值得 <span class="bold">做的</span> 就把它 <span class="bold">做好.</span> </h2>

            </header>
            <article class="text">
                <p>人生就是一场旅行，<strong>不在乎目的地， </strong>在乎的应该是沿途的风景以及看风景的心情。</p>

                <p>时间在流逝，生命中人来人往。不要错失机会，告诉他们在你生命中的意义。</p>
            </article>
        </section>
        <footer class="p-footer p-scrolldown">
            <a href="#contact">
                <div class="arrow-d">
                    <div class="before">联系</div>
                    <div class="after">消息</div>
                    <div class="circle"></div>
                </div>
            </a>
        </footer>
    </div>


    <div class="section page-contact page page-cent  bg-color" data-bgcolor="rgba(95, 25, 208, 0.88)s" id="s-contact">

        <div class="slide" id="information" data-anchor="information">
            <section class="content">
                <header class="p-title">
                    <h3>联系<i class="ion ion-location">
                        </i>
                    </h3>
                    <ul class="buttons">
                        <li class="show-for-medium-up">
                            <a title="About" href="#about-us"><i class="ion ion-android-information"></i></a>
                        </li>

                        <li>
                            <a title="Message" href="#contact/message"><i class="ion ion-email"></i></a>
                        </li>
                    </ul>
                </header>

                <div class="contact">
                    <div class="row">
                        <div class="medium-6 columns left">
                            <ul>
                                <li>
                                    <h4>邮箱</h4>
                                    <p><a href="/cdn-cgi/l/email-protection#a68989c5c9c8d2c7c5d2e6cbc7cfca88c5c9cb"><span class="__cf_email__" data-cfemail="2c4f4342584d4f5849414d45406c414d4540024f4341">[email&#160;protected]</span></a></p>
                                </li>
                                <li>
                                    <h4>地址</h4>
                                    <p>世界上最美丽的地方
                                        <br>静灵庭</p>
                                </li>
                                <li>
                                    <h4>电话号码</h4>
                                    <p>+888 888 888</p>
                                </li>
                            </ul>
                        </div>
                        <div class="medium-6 columns social-links right">
                            <ul>

                                <li class="show-for-medium-up">
                                    <h4>网站</h4>
                                    <p><a href="http://www.baidu.com">www.baidu.com</a></p>
                                </li>
                                <li class="show-for-medium-up">
                                    <h4>找到我们</h4>

                                    <div class="socialnet">
                                        <a href="#"><i class="ion ion-social-facebook"></i></a>
                                        <a href="#"><i class="ion ion-social-instagram"></i></a>
                                        <a href="#"><i class="ion ion-social-twitter"></i></a>
                                        <a href="#"><i class="ion ion-social-pinterest"></i></a>
                                        <a href="#"><i class="ion ion-social-tumblr"></i></a>
                                    </div>

                                </li>
                                <li>
                                    <p><img src="{{ asset('img/blog/logo_large.png') }}" alt="Logo" class="logo"></p>
                                    <p class="small">Bientot by <strong><a href="http://highhay.com">Brand</a></strong>. All right reserved 2018</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </section>
        </div>


        <div class="slide" id="message" data-anchor="message">
            <section class="content">
                <header class="p-title">
                    <h3>写信给我们<i class="ion ion-email">
                        </i>
                    </h3>
                    <ul class="buttons">
                        <li class="show-for-medium-up">
                            <a title="About" href="#about-us"><i class="ion ion-android-information"></i></a>
                        </li>
                        <li>
                            <a title="Contact" href="#contact/information"><i class="ion ion-location"></i></a>
                        </li>

                    </ul>
                </header>

                <div class="page-block c-right v-zoomIn">
                    <div class="wrapper">
                        <div>
                            <form class="message form send_message_form" method="get" action="ajaxserver/serverfile.php">
                                <div class="fields clearfix">
                                    <div class="input">
                                        <label for="mes-name">名字 </label>
                                        <input id="mes-name" name="name" type="text" placeholder="Your Name" required></div>
                                    <div class="buttons">
                                        <button id="submit-message" class="button email_b" name="submit_message">Ok</button>
                                    </div>
                                </div>
                                <div class="fields clearfix">
                                    <div class="input">
                                        <label for="mes-email">邮箱 </label>
                                        <input id="mes-email" type="email" placeholder="Email Address" name="email" required>
                                    </div>
                                </div>
                                <div class="fields clearfix no-border">
                                    <label for="mes-text">消息 </label>
                                    <textarea id="mes-text" placeholder="Message ..." name="message" required></textarea>
                                    <div>
                                        <p class="message-ok invisible">Your message has been sent, thank you.</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </div>

    </div>

</main>


<footer class="page-footer">
<span>Find us on
{{--<a href="#"><i class="ion icon ion-social-facebook"></i></a>--}}
{{--<a href="#"><i class="ion icon ion-social-instagram"></i></a>--}}
{{--<a href="#"><i class="ion icon ion-social-twitter"></i></a>--}}
</span>
</footer>
<script>
    $('.site-config').downCount({
        date: '08/27/2013 12:00:00',
        offset: -5
    }, function () {
        alert('WOOT WOOT, done!');
    });
</script>

@endsection




