<div class="form-group {{ ($errors->has($dbName)) ? 'has-error' :'' }}">
    @php
    $dbNameFix = str_replace('[]','',$dbName);
    @endphp
    <label for="{{ str_replace('[]','',$dbNameFix) }}" class="col-md-2 control-label">{{ $label }}</label>
    <div class="col-md-10">
        <textarea class="{{ (isset($class)) ? $class : 'ckeditor form-control' }}" name="{{ $dbName }}" id="{{ $dbNameFix }}" {{ $required }}>{{ (isset($variable)) ? $variable->$dbNameFix : old($dbNameFix) }}</textarea>
    </div>
</div>