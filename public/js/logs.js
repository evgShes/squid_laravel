jQuery(function ($) {
    $('#update-btn').on('click', function () {
        let $button = $(this),
            url = $button.data('url');

        simplePostAjax(url, {}, function (data) {
            if (data == true) {
                $('#update-table').loadBlock();
            }
        });
    })
});
