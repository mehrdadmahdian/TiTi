@extends('layouts.admin')

@section('page-title')
    کانال های تلگرامی کاربر
@endsection

@push('head')
@endpush
@section('content')
    <div class="wrapper wrapper-content ">
        <a class="btn btn-success btn-sm" type="submit" data-toggle="modal" href="#modal-create">
            <i class="fa fa-plus-circle"></i> افزودن کانال تلگرامی
        </a>
        <div class="row m-t-lg animated fadeInUp">
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

    @include('admin.telegram-channels.create-modal')
    @include('admin.telegram-channels.edit-modal')

@endsection

@push('scripts')
    @include('admin.telegram-channels.index-script')
@endpush