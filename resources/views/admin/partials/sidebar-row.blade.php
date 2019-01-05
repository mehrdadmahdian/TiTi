@foreach( $route as $item)
    @can($item['permission'])
        <li class="{{ setActive('admin.' . $item['name'] . '.index') }} menu-item">
            <a href="{{ route('admin.' . $item['name'] . '.index') }}"><i class='{{ $item['icon'] }} '>{{ isset($item['li_text']) ? $item['li_text'] : '' }}</i>
                <span>{{ $item['title'] }}</span></a>
        </li>
    @endcan
@endforeach