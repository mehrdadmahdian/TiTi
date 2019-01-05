$(document).ready(function () {
    // Prevent FOUC
    $('.no-fouc').removeClass('no-fouc');

    // FontFaceObserver
    var font = new FontFaceObserver('Material Icons');
    var html = document.documentElement;

    html.classList.add('fonts-loading');

    font.load(null, 10000).then(function () {
        html.classList.remove('fonts-loading');
        html.classList.add('fonts-loaded');
    }).catch(function () {
        html.classList.remove('fonts-loading');
        html.classList.add('fonts-failed');
    });


    $(".datepicker").datepicker({
        isRTL: true,
        dateFormat: 'y/mm/dd'
    });


    $('body').on('focus', ".datepicker", function () {
        $(this).datepicker({
            isRTL: true,
            dateFormat: 'y/mm/dd'
        });
    });

    // Make datatables Striped
    $('.dataTable').addClass("table-bordered table-striped");


    // Initial iCheck jQuery Plugin
    $('.icheck').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });


    // Initial Select2 jQuery Plugin
    $('.select2').select2({
        dir: "rtl",
        width: '100%'
    });

    //Pin Board Close Button
    $('.note-trash').on('click', function (e) {
        e.preventDefault();
        $(this).parent().fadeOut(800, function () {
            $(this).parent().remove();
        });
    });

    // Menu Instant Search
    $("#menuSearch").on("keyup paste", function () {
        var searchValue = $(this).val();
        if (searchValue) {
            $('#searchResultList').empty();
            $('#side-menu .menu-item').hide();
            $('.nav-second-level .menu-item a > span').each(function (index, value) {
                if (value.innerHTML.indexOf(searchValue) > -1) {
                    $('#searchResultList').append($(value).parent().parent().clone());
                }
            });
            $('#search-menu .menu-item').show();
            $('#searchResult, #searchResultList, #searchResultList a').show();
        }
        else {
            $('#side-menu .menu-item').show();
            $('#searchResult').hide();
        }
    });
});

function duplicate($templateSelector, $addSelector, $removerSelector, $currentCount, $except) {
    var template = $($templateSelector).clone();
    $(document).on('click', $addSelector, function () {
        $currentCount++;
        var section = template.clone().find(':input').each(function () {
            var newId = this.id + $currentCount;
            $(this).prev().attr('for', newId);
            this.id = newId;
            this.value = '';
        }).end();

        if ($except != 'undefined') {
            section.find($except).remove();
        }
        section.find('#file_name' + $currentCount).prop('required', true);

        section.appendTo($($templateSelector).parent());
        //FixUI();
        return false;
    });

    $(document).on('click', $removerSelector, function () {
        $(this).parent().parent().fadeOut(300, function () {
            $(this).remove();
        });
        return false;
    });
}

(function () {

    var laravel = {
        initialize: function () {
            this.methodLinks = $('a[data-method]');
            this.token = $('a[data-token]');
            this.registerEvents();
        },

        registerEvents: function () {
            $('body').on('click','a[data-method]', this.handleMethod);
        },

        handleMethod: function (e) {
            var link = $(this);
            var httpMethod = link.data('method').toUpperCase();
            var form;

// If the data-method attribute is not PUT or DELETE,
// then we don't know what to do. Just ignore.
            if ($.inArray(httpMethod, ['PUT', 'DELETE']) === -1) {
                return;
            }

// Allow user to optionally provide data-confirm="Are you sure?"
            if (link.data('confirm')) {
                if (!laravel.verifyConfirm(link)) {
                    return false;
                }
            }

            form = laravel.createForm(link);
            form.submit();

            e.preventDefault();
        },

        verifyConfirm: function (link) {
            return confirm(link.data('confirm'));
        },

        createForm: function (link) {
            var form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            var token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token')
                });

            var hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    laravel.initialize();

})();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});