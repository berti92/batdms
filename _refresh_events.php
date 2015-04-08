<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $res = mysql_query('SELECT max_time_in_days FROM retention_periods WHERE id = (SELECT retention_period_id FROM documents WHERE id = '.$doc_id.')');
  $retention_period = mysql_fetch_assoc($res);
  $val = $retention_period['max_time_in_days'];
  $val_end = $retention_period['max_time_in_days'] + 30;
  mysql_query('DELETE FROM events WHERE document_id = '.$doc_id);
  mysql_query('INSERT INTO events(document_id, start_time, end_time) VALUES('.$doc_id.',DATE_ADD((SELECT document_date FROM documents WHERE id = "'.$doc_id.'"),INTERVAL '.$val.' DAY),DATE_ADD((SELECT document_date FROM documents WHERE id = "'.$doc_id.'"),INTERVAL '.$val_end.' DAY))');
?>
