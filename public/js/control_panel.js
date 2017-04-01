jQuery(function($){
    $('#type_report').on('change',function(){
        if($(this).val()=='3'){
            $('#date_from,#date_to').prop('disabled',true).val('');
        }
        else{
            $('#date_from,#date_to').prop('disabled',false);
        }
    });
    $('#generate_report').on('click',function(){
        var url = $(this).data('url'),
            data_form = $('.generate_report :input').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: data_form,
            success: function(){
                Materialize.toast('Успешно', 3000, 'green darken-4 rounded');
            },
            error: function(){
                Materialize.toast('Действие не выполнено', 3000,'rounded red accent-4');
            }
        });
    });
});