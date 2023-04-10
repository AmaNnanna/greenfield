(function($) {
    "use strict"

    // MAterial Date picker
    $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        time: true,
        date: false
    });
    $('#date-format').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm'
    });

    $('#min-date').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        minDate: new Date()
    });

    $('#min-date-start').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        minDate: new Date()
    });

    $('#min-date-end').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        minDate: new Date()
    });

    $('#min-date-start-event').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        minDate: new Date()
    });

    $('#min-date-end-event').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        minDate: new Date()
    });

})(jQuery);