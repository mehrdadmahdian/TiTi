<div class="col-sm-12">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">نحوه ی ذخیره سازی اطلاعات فراخوانی شده</label>
        <div class="col-sm-8">
            <select type="text" class="form-control select2" name="setting[twitter_recorder][type]">
                @foreach(\App\Twitter\Recorder\TweetRecorderFactory::getClassMap() as $key => $value)
                    <option value="{{$key}}">{{trans('twitter.recorder.type.'.$key)}}</option>
                @endforeach
            </select>
            {{--todo--}}
            {{--<span class="form-text m-b-none">توضیحات با ایجکس لود شود.</span>--}}
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    {{--todo: parameter section must be loaded using ajax call after changing collector type--}}
    {{--todo: if channel has this setting, paramter should be initialized for this channel--}}
</div>