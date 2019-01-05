{{--@if (session('status'))--}}
    {{--<div class="alert alert-success alert-dismissable">--}}
    {{--{{ session('status') }}--}}
    {{--</div>--}}
{{--@endif--}}
@if(isset($errors) and !$errors->isEmpty())
    <div class="alert alert-danger alert-dismissable">
        <h4><i class="icon fa fa-ban"></i> خطا</h4>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif