<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('admin.partials.head')
</head>
<body>
@yield('content')
@include('admin.partials.scripts')
</body>
</html>