@extends('layouts.admin')

@section('page-title')
    کاربران
@endsection

@section('content')
    <div class="col-md-12">

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#users-datatable').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": '{{route('admin.users.datatable')}}'
            } );
        } );
    </script>
@endpush