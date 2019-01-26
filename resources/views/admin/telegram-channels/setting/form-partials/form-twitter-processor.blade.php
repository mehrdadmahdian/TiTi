<div class="col-sm-12">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">نحوه ی ارزیابی اطلاعات فراخوانی شده</label>
        <div class="col-sm-8">
            <select type="text" class="form-control select2" name="setting[twitter_processor][type]">
                @foreach(\App\Twitter\Processor\TweetProcessorFactory::getClassMap() as $key => $value)
                    <option value="{{$key}}">{{trans('twitter.processor.type.'.$key)}}</option>
                @endforeach
            </select>
            {{--todo--}}
            {{--<span class="form-text m-b-none">توضیحات با ایجکس لود شود.</span>--}}
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    {{--todo: parameter section must be loaded using ajax call after changing collector type--}}
    {{--todo: if channel has this setting, paramter should be initialized for this channel--}}

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" >فیلترینگ توییت ها با کلمات</label>
        <div class="col-sm-8">
            <input type="text" name="setting[twitter_processor][filter][words]" placeholder="کلمه ناشایست" class="tm-input form-control tm-input-info"/>
            <span class="form-text m-b-none">تمامی توییت هایی که دارای یکی از این کلمات باشند مورد ارزیابی قرار نخواهند گرفت.</span>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">فیلترینگ توییت ها با کاربر</label>
        <div class="col-sm-8">
            <input type="text" name="setting[twitter_processor][filter][user_names]" placeholder="sample_user_5218" class="tm-input form-control tm-input-info"/>
            <span class="form-text m-b-none">تمامی توییت هایی که توسط کاربران فیلتر شده توییت شده باشند مورد ارزیابی قرار نخواهند گرفت.</span>
        </div>
    </div>
</div>