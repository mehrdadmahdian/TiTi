<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('bundle/backend/js/core.js') }}"></script>
<script src="{{ asset('bundle/backend/js/plugins.js') }}"></script>
<script src="{{ asset('bundle/backend/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('bundle/backend/ckeditor/adapters/jquery.js') }}"></script>
{{--<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>--}}
@stack('scripts')
<script src="{{ asset('bundle/backend/js/script.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>

<script type="text/javascript">
    setTimeout(function () {
        toastr.options = {
            positionClass: "toast-top-center",
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 10000,
            extendedTimeOut: 10000
        };
        @if (isset($errors) and count($errors) > 0)
        @php($message = '')
            @foreach ($errors->all() as $error)
            @php($message .= $error . PHP_EOL )
            @endforeach
            toastr.error('{{ $error }}');
        @elseif (session('status'))
        toastr.success('{{ session('status') }}');
        @endif
    }, 1300);
    $('.ckeditor').ckeditor({
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
    });

    duplicate('#logs fieldset:first', '#addLog', '.RemoveItem', {{ (isset($medias) ? count($medias) : 0) + 1 }}, '.file-url');

</script>
<script type="text/javascript">
    $(".tm-input").tagsManager();
</script>

