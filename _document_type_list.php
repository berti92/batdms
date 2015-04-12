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
  $res_ar = get_list('SELECT document_types.id AS id, document_types.type_name AS type_name, retention_periods.period_name AS period_name FROM document_types LEFT JOIN retention_periods ON document_types.default_retention_period_id = retention_periods.id',
    'SELECT count(*) AS count FROM document_types LEFT JOIN retention_periods ON document_types.default_retention_period_id = retention_periods.id',
    $page,
    ["id","type_name","period_name"],
    $order,
    $limit,
    '<a href="document_type_show.php?id=##ID##" class="btn btn-primary glyphicon glyphicon-search"></a>');
  echo(json_encode($res_ar));
?>
