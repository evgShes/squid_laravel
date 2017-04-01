jQuery(function($){
    $('#add_users').on('click',function(){
        var url = $(this).data('url'),
            data_form = $('.form_add_users :input').serialize();
        console.log(data_form);
        $.ajax({
            type: "POST",
            url: url,
            data: data_form,
            success: function(){
                Materialize.toast('Успешно', 3000, 'green darken-4 rounded');
            },
            error: function(jqXHR){
                handlerAllErrros(jqXHR);
            }
        });
    });
});