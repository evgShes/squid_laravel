jQuery(function ($) {
    $('#btn-block-site').on('click', function () {
        let url = $(this).data('url')
            input = $('#block-sites :input').serialize();
        simplePostAjax(url,input, function (data) {
           if(data == true){
               notyBotRight();
           }
        });
    });
});