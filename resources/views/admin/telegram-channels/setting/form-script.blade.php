<script>

    $('#setting-form-submit').on('click', function ()
    {
        toastr.options = {
            "closeButton": false,
            "positionClass": "toast-top-left",
            "timeOut": "1000",
        };
        var l = Ladda.create(this);
        l.start();
        addTagsToForm();
       $.ajax({
           url: "{{route('admin.telegram_channels.setting.store', ['id'=> $telegramChannel->id])}}" ,
           type: 'post',
           data: $('#setting-form').serialize(),
           success: function (result) {
               result.status ? toastr.success(result.message) : toastr.error(result.message);
               l.stop();

           }, error: function () {
               toastr.error({{trans('ajax.message.error')}});
               l.stop();
           }
       })
    });

    function addTagsToForm()
    {
        if ($('input[name="hidden-setting\\[twitter_processor\\]\\[filter\\]\\[words\\]"]')) {
            var words = $($('input[name="hidden-setting\\[twitter_processor\\]\\[filter\\]\\[words\\]"]')[0]).val();
        } else {
            var words = null;
        }
        $('#setting-form').append(
            '<input type=hidden name=setting[twitter_processor][filter][words] value='+words+'>'
        );
        if ($('input[name="hidden-setting\\[twitter_processor\\]\\[filter\\]\\[user_names\\]"]')) {
            var user_names = $($('input[name="hidden-setting\\[twitter_processor\\]\\[filter\\]\\[user_names\\]"]')[0]).val();
        } else {
            var user_names = null;
        }
        $('#setting-form').append(
            '<input type=hidden name=setting[twitter_processor][filter][user_names] value='+user_names+'>'
        );
    }

</script>