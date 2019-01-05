<div class="form-group {{ ($errors->has(str_replace('[]','',$dbName))) ? 'has-error' :'' }}">
    <label for="{{ str_replace('[]','',$dbName) }}" class="control-label col-md-2">{{ $label }}</label>
    <div class="col-md-10">
        <select class="form-control custom-select {{ isset($multiple) ? 'multiple' : ''}}" name="{{ (isset($noName) and $noName==true) ? '' : $dbName }}" id="{{ str_replace('[]','',$dbName) }}" {{ $required }} {{ isset($multiple) ? 'multiple' : ''}}>
            @foreach($list as $row)
            <option
                @if (isset($selectedIn) and $selectedIn)
                    @if(!isset($multiple))
                    {{ ($selectedIn==(isset($rowValue) ? $row->$rowValue : $row)) ? 'selected=selected' : '' }}
                    @else
                        @if(in_array((isset($rowValue) ? $row->$rowValue : $row),$selectedIn))
                        selected="selected"
                        @endif
                    @endif
                @else
                {{ (isset($variable) and $variable->$dbName==(isset($rowValue) ? $row->$rowValue : $row)) ? 'selected=selected' : '' }}
                @endif
                value="{{ (isset($rowValue)) ? $row->$rowValue : $row}}">
                {{ (isset($rowValue)) ? $row->$rowName : $row}}
            </option>
            @endforeach
        </select>
    </div>
</div>