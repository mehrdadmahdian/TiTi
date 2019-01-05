<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('frontend.partials.head')
</head>
<body class="layout-name">
@include('frontend.partials.header')
<main>
    @include('layouts.admin_partial.alerts')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>
</main>
@include('frontend.partials.footer')
@include('frontend.partials.scripts')
</body>
</html>