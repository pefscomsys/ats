jQuery(document).ready(function () {

    // Select2
    $(".select2").select2();

    //initialise jquery preimage
    $('.file').preimage();

    $(".select2-limiting").select2({
        maximumSelectionLength: 2
    });

    jQuery('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
		orientation: 'bottom',
    });
    jQuery('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('.datepicker-inline').datepicker();
    jQuery('.datepicker-multiple-date').datepicker({
        format: "mm/dd/yyyy",
        clearBtn: true,
        multidate: true,
        multidateSeparator: ","
    });
});
