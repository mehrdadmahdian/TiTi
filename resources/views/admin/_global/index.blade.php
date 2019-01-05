@extends('layouts.admin')

@section('page-title')
    {{ $title }}
@endsection

@section('page-description')
    {{ $desc }}
@endsection

@section('page-help')
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        @if(isset($filters) and !empty($filters))
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox collapsed">
                        <div class="ibox-title">
                            <h5>فیلتر</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="builder"></div>
                            <button class="btn btn-primary" id="submitQuery"><i class="fa fa-filter"></i> فیلتر</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="datatable-action">
                            @php($route = config('cruds.admin_prefix','backend') . '.' . $routename . '.create')
                            @if ( Route::has($route) )
                                <a href="{{ route($route) }}" class="btn btn-primary"><i class="fa fa-edit"></i>جدید</a>
                            @endif
                        </div>
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush


@if(View::exists($bladeScriptPath))
    @push('scripts')
    @include($bladeScriptPath)
    @endpush
@endif

@if(isset($filters) and !empty($filters))
    @push('scripts')
    <script>
        var datatablesRequest = {};
        var _rules = {};

        $('#builder').queryBuilder({
            allow_groups: 1,
            plugins: {},
            filters: {!! json_encode($filters, JSON_UNESCAPED_SLASHES) !!}
        });
        $('#submitQuery').on('click', function () {
            var result = $('#builder').queryBuilder('getRules');
            if (!$.isEmptyObject(result)) {
                _rules = result;
            } else {
                return false;
            }
            reloadDatatables();
        });

        function filterChange() {
            var _json = JSON.stringify(_rules);
            datatablesRequest = {rules: _json};
        }

        function reloadDatatables() {
            filterChange();
            $('.dataTable').each(function () {
                dt = $(this).dataTable();
                dt.fnDraw();
            })
        }
    </script>
    @endpush
@endif