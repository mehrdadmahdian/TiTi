@extends('layouts.admin')

@section('page-title')
    نقش های کاربری
@endsection

@push('head')
    <style>
        div.dataTables_wrapper {
            direction: rtl;
        }

        /* Ensure that the demo table scrolls */
        th, td { white-space: nowrap; }
        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }

        .select2-container{
            z-index:100000;
        }
    </style>
@endpush

@section('content')
    <div class="wrapper wrapper-content">
        <a class="btn btn-success btn-sm" data-toggle="modal" href="#modal-create">
            <i class="fa fa-plus-circle"></i> ایجاد نقش کاربری جدید
        </a>
        <div class="row m-t-lg animated fadeInUp">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <table class="stripe row-border order-column" style="width:100%" id="datatable">
                            <thead>
                            <tr>
                                <td>نام</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.roles.create-modal')
    @include('admin.roles.edit-modal')
@endsection

@push('scripts')
    @include('admin.roles.index-script')
@endpush