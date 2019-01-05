@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row">
        <section class="auth-section">
            <div class="middle-box text-center loginscreen animated fadeInDown">
                <div>
                    <div class="login-logo">
                        <img src="{{asset(trans('site.logo'))}}" alt="{{ trans('site.title') }}">
                    </div>
                    <h3>خوش آمدید.</h3>
                    <p>لطفاً برای ایجاد حساب کاربری در سیستم اطلاعات خود را وارد نمایید.</p>

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" type="text" class="form-control" name="name" placeholder="نام و نام خانوادگی" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email"
                                   placeholder="ایمیل" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="رمز عبور"
                                   required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تکرار رمز عبور" required>
                        </div>
                        <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                            <div class="form-group">
                                {!! captcha_img() !!}
                            </div>
                            <input id="captcha" type="text" class="form-control" name="captcha"
                                   placeholder="کدامنیتی"
                                   required>
                            @if ($errors->has('captcha'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b dim">ثبت نام</button>
                        <p class="text-muted text-center create-account-hint">
                            <small>هم اکنون عضو هستید؟</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="{{url('/login')}}">ورود</a>
                    </form>
                    <p class="m-t sign">
                        <img src="{{asset('img/dp.png')}}" alt="">
                        <small>طراحی و پشتیبانی توسط:</small>
                        <a href="http://www.dadehpardaz.com">داده پرداز</a>
                    <div class="copyright">&copy; 2016 | All Rights Reserved</div>
                    </p>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
