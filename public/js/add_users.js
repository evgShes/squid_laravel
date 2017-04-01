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
                Materialize.toast('Успешно', 3000, 'success_my rounded');
            },
            error: function(){
                Materialize.toast('Действие не выполнено', 3000,'rounded error_my');
            }
        });
    });
});