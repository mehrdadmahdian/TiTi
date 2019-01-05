<div class="form-group {{ ($errors->has($dbName)) ? 'has-error' :'' }}">
    <div class="col-md-2">
        <input type="checkbox" name="{{ $dbName }}" id="{{ str_replace('[]','',$dbName) }}" value="1"
        @if(
            ( isset($variable) and $variable->$dbName ) or
            old($dbName) or
            ((isset($checked) and $checked==true) and ($variable ===null))
        )
        checked="checked"
        @endif
        >
    </div>
    <label for="{{ str_replace('[]','',$dbName) }}" class="col-md-10 control-label">{{ $label }}</label>
</div>

