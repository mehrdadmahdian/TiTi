@extends('layouts.admin')

@section('page-title')
    کاربران
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
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                        <table class="stripe row-border order-column" style="width:100%" id="datatable">
                            <thead>
                                <tr>
                                    <td>نام</td>
                                    <td>ایمیل</td>
                                </tr>
                            </thead>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.users.datatable.getData') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                ]
            });
        });
    </script>
@endpush