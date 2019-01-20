@extends('layouts.admin')

@section('page-title')
    اکانت های توییتر
@endsection

@push('head')
@endpush
@section('content')
    <div class="wrapper wrapper-content">
        <a class="btn btn-success btn-sm" type="submit" data-toggle="modal" href="#modal-create">
            <i class="fa fa-plus-circle"></i> افزودن اکانت توییتر
        </a>
        <div class="row m-t-lg animated fadeInUp">
            <div>
                <div class="row" style="display: flex;flex-wrap: wrap;">
                    @foreach($twitterAccounts as $twitterAccount)
                        <div class="col-md-3" style="display: flex;flex-direction: column">
                            <div class="ibox-content text-center">
                                <h1>{{$twitterAccount->name}}</h1>
                                <div class="m-b-sm">
                                    <img style="width:80%" alt="image" class="rounded-circle" src="https://i.ibb.co/p0wkgNd/1-O5e4-d-HGuf-M97-Gc-AITe-X6-Q.png">
                                </div>
                                <p class="font-bold">{{$twitterAccount->description}}</p>

                                <div class="text-center">
                                    <a href="" class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> مشاهده پیام ها</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('admin.twitter-accounts.create-modal')
    @include('admin.twitter-accounts.edit-modal')

@endsection

@push('scripts')
    @include('admin.twitter-accounts.index-script')
@endpush