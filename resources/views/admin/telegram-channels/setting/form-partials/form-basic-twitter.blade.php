<div class="col-sm-12">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">اکانت توییتر متصل به کانال</label>
        <div class="col-sm-8">
            <select type="text" class="form-control select2">
                @foreach($twitterAccounts as $ta)
                    <option value="{{$ta->id}}">{{$ta->name}}</option>
                @endforeach
            </select>
            <span class="form-text m-b-none">

                محل تغذیه کانال تلگرامی <span>{{$telegramChannel->name}}</span> از اکانت توییتر انتخاب شده خواهد بود.
            </span>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label">بازه ی زمانی فراخوانی</label>
        <div class="col-sm-8">
            <input type="number" min="1" max="60" class="form-control">
            <span class="form-text m-b-none">ترجیح می دهید هر چند دقیقه یکبار اکانت توییتر شما فراخوانی شود؟</span>
        </div>
    </div>
</div>

