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
  $res_ar = get_list('SELECT users.id AS id, users.username AS username, users.email AS email, users.birthday AS birthday, users.first_name AS first_name, users.last_name AS last_name, users.force_password_change AS force_password_change FROM users',
    'SELECT count(*) AS count FROM users',
    $page,
    ["id","username","email","birthday","first_name","last_name","force_password_change"],
    $order,
    $limit,
    '<a href="user_show.php?id=##ID##" class="btn btn-primary glyphicon glyphicon-search"></a>');
  echo(json_encode($res_ar));
?>
