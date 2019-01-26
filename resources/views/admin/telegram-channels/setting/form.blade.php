@extends('layouts.admin')

@section('page-title')
    تنظیمات کانال {{$telegramChannel->name}}
@endsection

@push('head')
@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>تنظیمات توییتر</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="row">

                            <div class="col-sm-12">
                                <form method="get" id="setting-form">
                                    <div class="tabs-container">
                                        <div class="tabs-right">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-link-parent active"><a class="nav-link" data-toggle="tab" href="#basic-twitter">تنظیمات پایه توییتر</a></li>
                                                <li class="nav-link-parent"><a class="nav-link" data-toggle="tab" href="#basic-telegram">تنظیمات پایه کانال تلگرام</a></li>
                                                <li class="nav-link-parent"><a class="nav-link" data-toggle="tab" href="#twitter-collector">تنظیم فراخوانی توییت ها</a></li>
                                                <li class="nav-link-parent"><a class="nav-link" data-toggle="tab" href="#twitter-processor">تنظیم ارزیابی توییت ها</a></li>
                                                <li class="nav-link-parent"><a class="nav-link" data-toggle="tab" href="#twitter-recorder">تنظیم ذخیره سازی توییت ها</a></li>
                                                <li class="nav-link-parent"><a class="nav-link" data-toggle="tab" href="#telegram-publishing">تنظیم انتشار توییت ها در کانال</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="basic-twitter" class="tab-pane active">
                                                    <div class="panel-body">
                                                        @include('admin.telegram-channels.setting.form-partials.form-basic-twitter')
                                                    </div>
                                                </div>
                                                <div id="basic-telegram" class="tab-pane">
                                                    <div class="panel-body">
                                                        @include('admin.telegram-channels.setting.form-partials.form-basic-telegram')
                                                    </div>
                                                </div>
                                                <div id="twitter-collector" class="tab-pane">
                                                    <div class="panel-body">
                                                        @include('admin.telegram-channels.setting.form-partials.form-twitter-collector')
                                                    </div>
                                                </div>
                                                <div id="twitter-processor" class="tab-pane">
                                                    <div class="panel-body">
                                                        @include('admin.telegram-channels.setting.form-partials.form-twitter-processor')
                                                    </div>
                                                </div>
                                                <div id="twitter-recorder" class="tab-pane">
                                                    <div class="panel-body">
                                                        @include('admin.telegram-channels.setting.form-partials.form-twitter-recorder')
                                                    </div>
                                                </div>
                                                <div id="telegram-publishing" class="tab-pane">
                                                    <div class="panel-body">
                                                        @include('admin.telegram-channels.setting.form-partials.form-telegram-publishing')
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <button id="setting-form-submit" class="btn btn-primary pull-right ladda-button" type="submit" data-style="expand-right">
                                        <span class="ladda-label"> ذخیره تنظیمات</span>
                                        <span class="ladda-spinner"></span>

                                    </button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection

@push('scripts')
    @include('admin.telegram-channels.setting.form-script')
@endpush



