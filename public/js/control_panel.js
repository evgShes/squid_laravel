jQuery(function($){
    $('#type_report').on('change',function(){
        if($(this).val()=='4'){
            $('#date_from,#date_to').prop('disabled',false);
        }
        else{
            $('#date_from,#date_to').prop('disabled',true).val('');
        }
    });
    $('#generate_report').on('click',function(){
        var url = $(this).data('url'),
            data_form = $('.generate_report :input').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: data_form,
            beforeSend:function () {
                $('#modal_load').show();
            },
            success: function(){
                $('#modal_load').hide();
                Materialize.toast('Успешно', 3000, 'green darken-4 rounded');
            },
            error: function(){
                $('#modal_load').hide();
                Materialize.toast('Действие не выполнено', 3000,'rounded red accent-4');
            }
        });
    });
    // $('#button_add_modal_add_site').on('click',function(){
    //     var url = $(this).data('url'),
    //         data_form = $('#modal_add_site .modal-content :input').serialize();
    //     $.ajax({
    //         type: "POST",
    //         url: url,
    //         data: data_form,
    //         beforeSend:function () {
    //             $('#modal_load').show();
    //         },
    //         success: function(){
    //             $('#modal_load').hide();
    //             Materialize.toast('Успешно', 3000, 'green darken-4 rounded');
    //         },
    //         error: function(){
    //             $('#modal_load').hide();
    //             Materialize.toast('Действие не выполнено', 3000,'rounded red accent-4');
    //         }
    //     });
    // });

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
            },
            error:function (jqXHR) {
                handlerAllErrros(jqXHR);
            }
        });
    });
});