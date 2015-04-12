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
  $res_ar = get_list('SELECT accounts.id AS id, accounts.account_name AS account_name, accounts.relation AS relation, account_types.type_name AS type_name, accounts.street_name AS street_name, accounts.house_no AS house_no, accounts.zip AS zip, accounts.city_name AS city_name, countries.country_name AS country_name FROM accounts LEFT JOIN account_types ON account_types.id = accounts.account_type_id LEFT JOIN countries ON countries.id = accounts.country_id WHERE accounts.deleted_at IS NULL',
    'SELECT count(*) AS count FROM accounts',
    $page,
    ["id","account_name","relation","type_name","city_name","country_name"],
    $order,
    $limit,
    '<a href="account_show.php?id=##ID##" class="btn btn-primary glyphicon glyphicon-search"></a>');
  echo(json_encode($res_ar));
?>
