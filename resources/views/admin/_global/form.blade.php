@extends('layouts.admin')

@section('page-title')
    {{ $title }}
@endsection

@section('page-description')
    {{ $desc }}
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeIn admin-form">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! form($form) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@if(View::exists($bladeScriptPath))
    @push('scripts')
        @include($bladeScriptPath)
    @endpush
@endif