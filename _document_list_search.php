<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $search_value = mysql_escape_string($_GET['search_value']);
  $start = mysql_escape_string($_GET['start']);
  if ($start >= 10) {
    $page = ($start / 10) + 1;
  } else {
    $page = 1;
  }
  $limit = mysql_escape_string($_GET['length']);
  $order = mysql_escape_string($_GET['columns'][$_GET['order'][0]['column']]['data'].' '.$_GET['order'][0]['dir']);
  $res_ar = get_list('SELECT documents.id AS id, documents.document_name AS document_name, accounts.account_name AS account_name, document_types.type_name AS type_name, retention_periods.period_name AS period_name, documents.document_date AS document_date, documents.relation AS relation FROM documents LEFT JOIN document_types ON document_types.id = documents.document_type_id LEFT JOIN accounts ON accounts.id = documents.account_id LEFT JOIN retention_periods ON retention_periods.id = documents.retention_period_id WHERE documents.deleted_at IS NULL AND (documents.document_name LIKE "%'.$search_value.'%" OR accounts.account_name LIKE "%'.$search_value.'%" OR documents.relation LIKE "%'.$search_value.'%" OR accounts.relation LIKE "%'.$search_value.'%")',
  'SELECT count(*) AS count FROM documents LEFT JOIN document_types ON document_types.id = documents.document_type_id LEFT JOIN accounts ON accounts.id = documents.account_id LEFT JOIN retention_periods ON retention_periods.id = documents.retention_period_id WHERE documents.deleted_at IS NULL AND (documents.document_name LIKE "%'.$search_value.'%" OR accounts.account_name LIKE "%'.$search_value.'%" OR documents.relation LIKE "%'.$search_value.'%" OR accounts.relation LIKE "%'.$search_value.'%")',
    $page,
    ["id","document_name","account_name","type_name","relation","period_name","document_date"],
    $order,
    $limit,
    '<a href="document_show.php?id=##ID##" class="btn btn-primary glyphicon glyphicon-search"></a>');
  echo(json_encode($res_ar));
?>
