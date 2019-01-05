<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            @if (View::hasSection('page-help'))
                <li class="top-bar-item page-info">
                    <a data-toggle="modal" data-target="#PageInfoContent" id="PageInfo"
                       type="button">
                        <i class="material-icons">info</i>
                    </a>
                </li>
            @endif
            <li class="top-bar-item notification-bell dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="label label-primary">{{(Illuminate\Support\Facades\Auth::user()->unreadNotifications->count() < 4) ? Illuminate\Support\Facades\Auth::user()->unreadNotifications->count() : '4+' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    @foreach(Illuminate\Support\Facades\Auth::user()->unreadNotifications->take(4)  as $notification)
                        <li>
                            {{--if action full-> make url by action-> use in a tag--}}
                            @if(isset($notification->data['action']['rout_parameter']) and isset($notification->data['action']['route_name']))
                                @php
                                    $url = route($notification->data['action']['route_name'],$notification->data['action']['rout_parameter']);
                                @endphp
                            @endif
                            <a href="{{ isset($url) ? $url : '' }}">
                                <div>
                                    {{--if message exist--}}
                                    <i class="fa fa-envelope fa-fw"></i>{{ $notification->data['message'] ?: 'اعلان جدید' }}
                                    <span class="pull-right text-muted small">{{ jdate($notification->created_at)->format('H:i y/m/d') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </nav>
</div>
@if (View::hasSection('page-help'))
    <div class="modal fade" id="PageInfoContent" tabindex="-1" role="dialog" aria-labelledby="PageInfoContentLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="PageInfoContentLabel">توضیحات</h4>
                </div>
                <div class="modal-body">
                    @yield('page-help')
                </div>
            </div>
        </div>
    </div>
@endif