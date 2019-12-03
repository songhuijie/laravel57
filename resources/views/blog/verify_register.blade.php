@extends('blog.main')

@section('body')
    <div class="page-cover" id="home">

        <div class="cover-bg pos-abs full-size bg-img" data-image-src="{{ asset('img/blog/bg-slide5.jpg') }}"></div>

        <div class="cover-bg pos-abs full-size slide-show">
            <i class='img' data-src='{{ asset('img/blog/bg-slide5.jpg') }}'></i>
            <i class='img' data-src='{{ asset('img/blog/bg-slide6.jpg') }}'></i>
            <i class='img' data-src='{{ asset('img/blog/bg-slide7.jpg') }}'></i>
            <i class='img' data-src='{{ asset('img/blog/bg-slide8.jpg') }}'></i>
        </div>

        <div class="cover-bg pos-abs full-size bg-color" data-bgcolor="rgba(51, 2, 48, 0.12)"></div>
    </div>

    <main class="page-main" id="mainpage">


        <div class="section page-home page page-cent  active fp-table" >
            <h2>verify-register</h2>
            <form class="" style="margin: auto" action="/verifysignup" method="post" id='form' onsubmit="return false">
                <div class="form-group row">

                    <div class="col-md-offset-4 col-md-4">
                        <input id="code" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="code"  style="background-color:transparent;border-radius: 4px;height: 40px;" placeholder="code" required autofocus>
                        <input type="text" name="email" id="email" value="18080952663@sina.cn">
                        <input type="text" name="status"  id="status" value="2">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-offset-4 col-md-4">
                        <button type="submit" class="btn btn-block btn-primary" style="border-radius: 4px;height: 40px;" id="submit">Submit</button>
                        <button type="submit" class="btn btn-block btn-primary" style="border-radius: 4px;height: 40px;" id="send">发送邮件验证</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="" id="s-when" style="display: none">
            <section class="content">
                <div class="clock clock-countdown">
                    <div class="site-config" data-date="10/31/2015 23:00:00" data-date-timezone="+0"></div>
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




    </main>
@endsection
@section('script')
    @include('js.verify_register')
@endsection

