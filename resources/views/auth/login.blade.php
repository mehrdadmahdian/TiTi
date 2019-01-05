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
                        <h3>وقت بخیر</h3>
                        <p>برای دسترسی به بخش مدیریت به حساب کاربری خود وارد شوید.</p>
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

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
                            {{--<div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">--}}
                                {{--<div class="form-group">--}}
                                    {{--{!! captcha_img() !!}--}}
                                {{--</div>--}}
                                {{--<input id="captcha" type="text" class="form-control" name="captcha"--}}
                                       {{--placeholder="کدامنیتی"--}}
                                       {{--required>--}}
                                {{--@if ($errors->has('captcha'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('captcha') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                            <button type="submit" class="btn btn-primary block full-width m-b dim">ورود</button>

                            <div class="row">
                                <div class="col-sm-6 forget-password">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            <small> رمز عبور خود را فراموش کرده اید؟</small>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-sm-6 remember-me">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <small>مرا بخاطر داشته باش</small>
                                    </label>
                                </div>
                            </div>
                            @if (Route::has('register'))
                                <p class="text-muted text-center create-account-hint">
                                    <small>هنوز حساب کاربری ندارید؟</small>
                                </p>
                                <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">ایجاد حساب
                                    کاربری</a>
                            @endif
                        </form>
                        <p class="m-t sign">
                            <img src="{{asset('img/dp.png')}}" alt="">
                            <small>طراحی و پشتیبانی توسط:</small>
                            <a target="_blank" href="http://www.dadehpardaz.com">داده پرداز</a>
                        <div class="copyright">&copy; 2016 | All Rights Reserved</div>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
