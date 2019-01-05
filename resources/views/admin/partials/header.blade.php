@if (View::hasSection('page-title'))
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>@yield('page-title')</h2>
            <small>@yield('page-description')</small>
        </div>
    </div>
@endif
