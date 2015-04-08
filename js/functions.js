$(document).ready(function() {
  $('.input-group.date').datepicker({
    format: "yyyy-mm-dd",
    clearBtn: true,
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true
  });
});

function random_str(length) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for( var i=0; i < length; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    return text;
}

function get_list(list, pagenum, container, url_red) {
  var table_id = random_str(20);
  var progress = '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="sr-only">45% Complete</span></div></div>';
  $('#'+container).html(progress);
  $.get(list, {page:pagenum,tid:table_id}, function(value) {
    $('#'+container).html(value);
    $(document).ready( function() {
      var table = $('#'+table_id).DataTable({
        searching: false,
        lengthChange: false
      });
      $('#'+table_id).on( 'click', 'tr', function () {
        window.location = url_red.replace('##ID##',table.row(this).data()[0]);
      });
    });
  });
}
function load_panel(id, panel, vars) {
  $.get(panel, vars, function(value) {
    $('#'+id).html(value);
  });
}
