<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $start = mysql_escape_string($_GET['start']);
  if ($start >= 10) {
    $page = ($start / 10) + 1;
  } else {
    $page = 1;
  }
  $limit = mysql_escape_string($_GET['length']);
  $order = mysql_escape_string($_GET['columns'][$_GET['order'][0]['column']]['data'].' '.$_GET['order'][0]['dir']);
  $res_ar = get_list('SELECT retention_periods.id AS id, retention_periods.period_name AS period_name, retention_periods.max_time_in_days AS max_time_in_days FROM retention_periods',
    'SELECT count(*) AS count FROM retention_periods',
    $page,
    ["id","period_name","max_time_in_days"],
    $order,
    $limit,
    '<a href="retention_period_show.php?id=##ID##" class="btn btn-primary glyphicon glyphicon-search"></a>');
  echo(json_encode($res_ar));
?>
