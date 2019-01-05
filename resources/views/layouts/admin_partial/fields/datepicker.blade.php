<div class="form-group {{ ($errors->has($dbName)) ? 'has-error' :'' }}">
    @php
        $dbNameFix = str_replace('[]','',$dbName);
    @endphp
    <label for="{{ $dbNameFix }}" class="col-md-2 control-label">{{ $label }}</label>
    <div class="col-md-10">
        @php
        $jalaliVariable='jalali_'.$dbNameFix;
        @endphp
        <input placeholder="{{ $label }}" type="text" name="{{ $dbName }}" id="{{ $dbNameFix }}" value="{{ (isset($variable)) ? $variable->$jalaliVariable : old($dbNameFix) }}" class="form-control datepicker" {{ $required }} autocomplete="off">
    </div>
</div>