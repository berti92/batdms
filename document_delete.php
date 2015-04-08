<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    mysql_query('UPDATE documents SET deleted_at = NOW() WHERE documents.id = '.$id);
    array_push($_SESSION['notify_success'], lr('App.deleted'));
  }
  header('Location: documents.php');
?>
