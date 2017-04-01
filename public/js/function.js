function handlerErrors(errors) {
    $('.handler_errors').remove();
    if (!empty(errors)) {
        $.each(errors, function (key, val) {
            var list = $('<span>').addClass('help-block handler_errors').css('color', 'red');
            if (typeof (val) == 'object') {
                $.each(val, function (key1, val1) {
                    list.append('<li>' + val1 + '</li>');
                });
                $("[name=" + key + "]").after(list);
                $("[name=" + key + "]").on('input', function (e) {
                    var elem = $(this).next();
                    if (elem.hasClass('handler_errors')) {
                        elem.remove();
                    }
                });
            }
        })
    }
}

function notyError(mess) {
    if (mess != undefined) {
        var noty_mess = noty({
            text: mess,
            type: 'error',
            layout: 'bottomRight'
        });
        setTimeout(function () {
            noty_mess.close();
        }, 5000);
    }
}

function handlerAllErrros(jqXHR) {
    if (jqXHR.status == 422 && jqXHR.responseJSON != undefined) {
        let data = jqXHR.responseJSON;
        if (data.errors != undefined) {
            return errorsMess(data.errors)
        } else if (data.noty != undefined) {
            notyError(data.noty);
        } else {
            handlerErrors(data);
        }
    } else if (jqXHR.status == 401) {
        noty({
            type: 'error',
            text: 'Ошибка авторизации!',
            layout: 'center',
            modal: true,
            buttons: [
                {
                    addClass: 'btn btn-success',
                    text: 'Авторизоваться',
                    onClick: function ($noty) {
                        location.reload();
                    }
                }
            ],
        });
    } else {
        alert("Ошибка отправки формы!");
    }
}