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
  $res_ar = get_list('SELECT account_types.id AS id, account_types.type_name AS type_name FROM account_types ',
    'SELECT count(*) AS count FROM account_types',
    $page,
    ["id","type_name"],
    $order,
    $limit,
    '<a href="account_type_show.php?id=##ID##" class="btn btn-primary glyphicon glyphicon-search"></a>');
  echo(json_encode($res_ar));
?>
