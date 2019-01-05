<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            @if (! Auth::guest())
                <li class="nav-header">
                    <div class="view-site">
                        <a href="{{url('/')}}" target="_blank">
                            <i class="material-icons">language</i>
                            <span>{{config('app.login-company')}}</span>
                        </a>
                    </div>
                    <div class="dropdown profile-element">
                    <span>
                        <img class="avatar" src="{{ asset('img/dashboard-avatar.png') }}" alt="">
                        <p class="font-bold">{{ Auth::user()->name }}</p>
                    </span>
                        <span class="block m-t-xs">
                                <div class="label label-success pull-right">
                                    <span>{{ jdate(\Carbon\Carbon::now())->format('Y/m/d') }}</span>
                                </div>
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="text-muted text-xs block">منوی کاربری<b class="caret"></b></span>
                        </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">ورود</a></li>
                            @else
                                <li>
                                    <a href="{{ url(config('crud.admin_prefix','backend')) }}">
                                        <i class="material-icons">dashboard</i>داشبورد
                                    </a>
                                </li>
                                <li><a href="{{ route('logout') }}">
                                        <i class="material-icons">exit_to_app</i>خروج
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="logo-element">
                        <img class="img-responsive" src="#">
                    </div>
                </li>
            @endif
            <div class="menu-search">
                <input id="menuSearch" class="form-control search-box" type="text" placeholder="جستجوی منو">
            </div>
            @foreach(collect(config('cruds.routes', []))->sortBy('order')->groupBy('parent-menu') as $key=>$route)
                @if($key)
                    <?php
                        foreach($route->pluck('permission') as $permission) {
                            $status = \Illuminate\Support\Facades\Auth::user()->can($permission) ? true : false;
                            if ($status) {
                                break;
                            }
                        }
                    ?>
                    @if($status)
                        <li class="{{ $route->pluck('name')->transform(function($item){ return setActive($item); })->unique()->filter()->first()}} menu-item">
                            <a href="#">
                                <i class="{{ $route->first()['icon'] }}">{{ isset( $route->first()['li_text'] ) ? $route->first()['li_text']  : ''  }}</i>
                                <span class="nav-label">{{ $key }}</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                @include('admin.partials.sidebar-row')
                            </ul>
                        </li>
                    @endif
                @else
                    @include('admin.partials.sidebar-row')
                @endif
            @endforeach
            {{--@action('dpadmin_sidebar')--}}
        </ul>
        <ul class="nav metismenu" id="search-menu">
            <li id="searchResult" class="active">
                <a href="#">
                    <i class="material-icons">search</i>
                    <span>نتایج جستجو</span>
                </a>
                <ul id="searchResultList" class="nav nav-second-level collapse"></ul>
            </li>
        </ul>
    </div>
</nav>