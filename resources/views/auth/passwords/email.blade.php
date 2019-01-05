@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <section class="auth-section reset-password">
            <div class="middle-box text-center loginscreen animated fadeInDown">
                <div>
                    <div class="login-logo">
                        <img src="{{asset('img/login-logo.png')}}" alt="لوگو شرکت">
                    </div>
                    <div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ایمیل"  required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b dim">بازیابی رمز عبور</button>
                        <p class="text-muted text-center create-account-hint">
                            <a class="btn-back" href="{{ url()->previous() }}">
                                <i class="material-icons">arrow_back</i>
                        </p>

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
