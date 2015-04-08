<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    mysql_query('UPDATE retention_periods SET deleted_at = NOW() WHERE id = '.$id);
    array_push($_SESSION['notify_success'], lr('App.deleted'));
  }
  header('Location: retention_periods.php');
?>
