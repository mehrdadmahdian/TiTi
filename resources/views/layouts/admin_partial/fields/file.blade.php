<div class="form-group {{ ($errors->has(str_replace('[]','',$dbName))) ? 'has-error' :'' }}">
    <label for="{{ str_replace('[]','',$dbName) }}" class="col-sm-2 control-label">{{ $label }}</label>
    <div class="col-sm-{{ (isset($variable)) ? '5' : '9' }}">
        <input type="file" name="{{ $dbName }}" id="{{ str_replace('[]','',$dbName) }}">
    </div>
    <?PHP $url=str_replace('[]','',$dbName).'_url'; ?>
    @if(isset($variable) and $variable->$dbName and  !isset($hiddenShow))
        <a href="{{ $variable->$url }}" target="_blank" class="btn btn-info fa fa-image"> نمایش</a>
    @endif
</div>