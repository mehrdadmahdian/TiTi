<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{trans('site.title')}} | @yield('page-title')</title>
<meta name="description" content="{{trans('site.description')}}">
@if (config('app.locale') == 'en')

    <link rel="stylesheet" href="{{ asset('bundle/en/backend/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('bundle/en/backend/css/plugins.css') }}">
    @stack('head')
    <link rel="stylesheet" href="{{ asset('bundle/en/frontend/css/style.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('bundle/backend/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('bundle/backend/css/plugins.css') }}">
    @stack('head')
    <link rel="stylesheet" href="{{ asset('bundle/backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css">

@endif
{{--<link rel="icon" href="{{asset('favicon-16.png')}}" sizes="16x16" type="image/png">--}}
{{--<link rel="icon" href="{{asset('favicon-32.png')}}" sizes="32x32" type="image/png">--}}
{{--<link rel="icon" href="{{asset('favicon-48.png')}}" sizes="48x48" type="image/png">--}}
{{--<link rel="icon" href="{{asset('favicon-62.png')}}" sizes="62x62" type="image/png">--}}
{{--<link rel="icon" href="{{asset('favicon-192.png')}}" sizes="192x192" type="image/png">--}}
<script>
    document.documentElement.className = 'no-fouc';
</script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->