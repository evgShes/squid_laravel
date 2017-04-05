jQuery(function ($) {
    $('#button_add_modal_add_site').on('click', function () {
        let button = $(this),
            url = button.data('url'),
            data_val = $('#create-site :input').serializeArray(),
            file = $('#file-inp').prop('files')[0],
            form = new FormData;
        form.append('file', file);
        $.each(data_val,function (key,elem) {
            form.append(elem.name,elem.value)
        });
        $.ajax({
            url: url,
            type:'post',
            data: form,
            processData: false,
            contentType: false,
            success: function (data) {
                if(data == true){
                    $('#block-sites').loadBlock();
                    $('#modal_add_site').modal('close');
                    notyBotRight();
                }
            },
            error:function (jqXHR) {
                handlerAllErrros(jqXHR);
            }
        });
    });

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