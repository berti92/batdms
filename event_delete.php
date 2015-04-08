<?php
  include_once 'includes/database.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    mysql_query('UPDATE events SET deleted_at = NOW() WHERE events.id = '.$id);
  }
?>
