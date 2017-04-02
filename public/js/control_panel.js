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
    $('#button_add_modal_add_site').on('click',function(){
        var url = $(this).data('url'),
            data_form = $('#modal_add_site .modal-content :input').serialize();
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
});