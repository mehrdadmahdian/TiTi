<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('admin.partials.head')
</head>
<body class="rtls">
<div id="wrapper">
    @include('admin.partials.sidebar')
    <div id="page-wrapper" class="gray-bg">
        @include('admin.partials.topbar')
        @include('admin.partials.header')
        @yield('content')
        @include('admin.partials.footer')
    </div>
</div>
@include('admin.partials.scripts')
</body>
</html>
