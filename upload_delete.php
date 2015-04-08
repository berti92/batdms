<?php
  include_once 'includes/database.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    mysql_query('UPDATE uploads SET deleted_at = NOW() WHERE uploads.id = '.$id);
  }
?>
