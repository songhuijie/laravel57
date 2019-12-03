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
            <h2>sign-up</h2>
            <form class="" style="margin: auto"  method="post" id='form' data-url="{{url('/')}}" onsubmit="return false">
                <div class="form-group row">

                    <div class="col-md-offset-4 col-md-4">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" style="background-color:transparent;border-radius: 4px;height: 40px;" placeholder="name" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-offset-4 col-md-4">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" style="background-color:transparent;border-radius: 4px;height: 40px;" placeholder="e-mail" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-offset-4 col-md-4">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" style="background-color:transparent;border-radius: 4px;height: 40px;" placeholder="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-offset-4 col-md-4">
                        <input id="re-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="re-password" style="background-color:transparent;border-radius: 4px;height: 40px;" placeholder="re-password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-offset-4 col-md-2">
                        <div style="line-height: 80px">
                            <a href="javascript:;" class="file" id="portrait">上传头像
                                <input type="file" name="file" id="file" >
                                <input type="hidden" name="portrait" id="portraits">
                            </a>

                            <div style="line-height: 2px;color: #a94442;display: none" id="ferror">上传失败</div>

                        </div>

                    </div>
                    <div class="col-md-1">

                        <img src="{{ asset('/img/blog/add_ico_logo.png') }}" width="120px" height="120px" id="current">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-offset-4 col-md-4">
                        <button type="submit" class="btn btn-block btn-primary" style="border-radius: 4px;height: 40px;" id="submit">Submit</button>
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
    @include('js.register')
@endsection

