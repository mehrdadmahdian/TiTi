@extends('layouts.admin')

@section('page-title')
    کانال های تلگرامی کاربر
@endsection

@push('head')
@endpush
@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <a class="btn btn-success btn-sm" type="submit" data-toggle="modal" href="#modal-add-telegram-channel">
            <i class="fa fa-plus-circle"></i> افزودن کانال تلگرامی
        </a>
        <div class="row m-t-lg">
            <div>
                <div class="row" style="display: flex;flex-wrap: wrap;">
                    @foreach($telegramChannels as $telegramChannel)
                        <div class="col-md-3" style="display: flex;flex-direction: column">
                            <div class="ibox-content text-center">
                                <h1>{{$telegramChannel->name}}</h1>
                                <div class="m-b-sm">
                                    <img style="width:80%" alt="image" class="rounded-circle" src="https://i.ibb.co/p0wkgNd/1-O5e4-d-HGuf-M97-Gc-AITe-X6-Q.png">
                                </div>
                                <p class="font-bold">{{$telegramChannel->description}}</p>

                                <div class="text-center">
                                    <a href="{{route('admin.telegram_channels.setting', ['telegram_channel_id', $telegramChannel->id])}}"
                                       class="btn btn-xs btn-white">
                                        <i class="fa fa-gears"></i>
                                        تنظیمات
                                    </a>
                                    <a href="" class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> مشاهده پیام ها</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="modal-add-telegram-channel" class="modal fade" style="display: none" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12"><h3 class="m-t-none m-b">افزودن کانال تلگرامی</h3>

                            <p>مشخصات کانال تلگرامی خود را در فرم زیر وارد نمایید:</p>

                            <form role="form">
                                <div class="form-group"><label>عنوان کانال</label> <input type="text" placeholder="خبر فوری" class="form-control"></div>
                                <div class="form-group"><label>توضیحات</label> <input type="text" placeholder="این یک کانال خبری است." class="form-control"></div>
                                <div class="form-group"><label>آی دی کانال</label> <input type="text" placeholder="@khabar_fouri" class="form-control"></div>
                                <div class="custom-file">
                                    <input id="logo" type="file" class="custom-file-input">
                                    <label for="logo" class="custom-file-label">Choose file...</label>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>ثبت کانال</strong></button>
                                    <label> <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Remember me </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
@endpush