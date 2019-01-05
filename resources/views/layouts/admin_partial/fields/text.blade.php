@php
$dbNameFix=str_replace('[]','',$dbName);
@endphp
<div class="form-group {{ ($errors->has($dbNameFix)) ? 'has-error' :'' }}">

    <label for="{{ $dbNameFix }}" class="control-label col-md-2">{{ $label }}</label>
    <div class="col-md-10">

        @if(!isset($isPass) or !$isPass)
            @if(isset($dbName) and old($dbName))
                @php
                    $value=old($dbName)
                @endphp
            @else
                @if (isset($variable))
                    @php
                        $value=$variable->$dbNameFix
                    @endphp
                @else
                    @php
                    $value=''
                    @endphp
                @endif
            @endif
        @endif
        <input
            type="{{ (isset($isPass) and $isPass==true) ? 'password' : 'text' }}"
            name="{{ $dbName }}" id="{{ $dbNameFix }}"
            value="{{ (isset($value) ? $value : '')}}"
            class="form-control"
            {{ $required }}
            autocomplete="off"
        >
    </div>
</div>