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

});