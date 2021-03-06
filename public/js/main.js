jQuery(function ($) {
   $('.accordion_class_toggle').on('click',function(){
       $('.'+$(this).attr('href').slice(1)).toggle();
       //console.log($(this).attr('href').slice(1));

   });
    $(document).ready(function() {
        $('select').material_select();
    });
    $('.date_bootstrap').pickadate({
        selectMonths: true,
        selectYears: 15
        // Strings and translations
        //monthsFull: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрт', 'Октябрь', 'Ноябрь', 'Декабрь'],
        //monthsShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        //weekdaysFull: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
        //weekdaysShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        //today: 'Сегодня',
        //clear: 'Очистить',
        //close: 'Закрыть',
        //labelMonthNext: 'Следующий месяц',
        //labelMonthPrev: 'Предыдущий месяц',
        //labelMonthSelect: 'Выбрать месяц',
        //labelYearSelect: 'Выбрать год',
    });
    // ----------------------------------------------валидация
    // $("#modal_add_site").validate({
    //     rules: {
    //         name: {
    //             required: true,
    //             minlength: 5
    //         },
    //         domain: {
    //             required: true,
    //             minlength: 5
    //         }
    //     },
    //     //For custom messages
    //     messages: {
    //         name:{
    //             required: "Поле обязательно для заполнения",
    //             minlength: "Введите больше 5 символов"
    //         },
    //         domain:{
    //             required:  "Поле обязательно для заполнения",
    //             minlength: "Введите больше 5 символов"
    //         },
    //
    //     },
    //     errorElement : 'div',
    //     errorPlacement: function(error, element) {
    //         var placement = $(element).data('error');
    //         if (placement) {
    //             $(placement).append(error)
    //         } else {
    //             error.insertAfter(element);
    //         }
    //     }
    // });

    //$('.modal_sm').modal({
    //    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    //    opacity: .5, // Opacity of modal background
    //    inDuration: 300, // Transition in duration
    //    outDuration: 200, // Transition out duration
    //    startingTop: '4%', // Starting top style attribute
    //    endingTop: '10%', // Ending top style attribute
    //    //getWidth:'600px',
    //    //maxWidth:'600px',
    //
    //
    //    //действие при открытии
    //    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
    //       //modal - id модалки
    //       // trigger - кнопка вызова модалки
    //    },
    //    //действие при закрытии
    //    complete: function() {
    //
    //    }
    //});
    //$('.modal_lg').modal({
    //    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    //    opacity: .5, // Opacity of modal background
    //    inDuration: 300, // Transition in duration
    //    outDuration: 200, // Transition out duration
    //    startingTop: '4%', // Starting top style attribute
    //    endingTop: '10%', // Ending top style attribute
    //
    //
    //
    //    //действие при открытии
    //    ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
    //       //modal - id модалки
    //       // trigger - кнопка вызова модалки
    //    },
    //    //действие при закрытии
    //    complete: function() {
    //
    //    }
    //});
    $('.modal').modal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        inDuration: 300, // Transition in duration
        outDuration: 200, // Transition out duration
        startingTop: '4%', // Starting top style attribute
        endingTop: '10%', // Ending top style attribute



        //действие при открытии
        ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
           //modal - id модалки
           // trigger - кнопка вызова модалки
        },
        //действие при закрытии
        complete: function() {

        }
    });

    function getResources(data_form = {}) {
        var data_arr = [];
        $.ajax({
            url: '/js/top/resources',
            method: 'post',
            data: data_form,
            success: function (data) {
                $.each(data.records, function (key, val) {
                    // mas_labels.push(val.url);
                    //  mas_series.push(val.cnt);
                    data_arr.push({
                        name: val.url,
                        y: val.cnt,
                    });
                });
                Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Рейтинг популярных сайтов за все время'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Соотношение',
                        colorByPoint: true,
                        data: data_arr
                    }]
                });
            }
        });
    }

    getResources();
    $('#btn-stat').on('click', function (e) {
        let form_data = $(this).closest('form').serialize();
        getResources(form_data);
    });
}); // END