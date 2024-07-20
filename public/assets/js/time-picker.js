var firstOpen = true;
var time;
$('#timePicker').datetimepicker({
    useCurrent: false,
    format: "HH:mm"
}).on('dp.show', function() {
    if (firstOpen) {
        time = moment().startOf('day');
        firstOpen = false;
    } else {
        time = "01:00"
    }
    $(this).data('DateTimePicker').date(time);
});