<?php
  include_once 'includes/database.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    mysql_query('UPDATE relation_types SET deleted_at = NOW() WHERE id = '.$id);
    array_push($_SESSION['notify_success'], 'Successfully deleted!');
  }
  header('Location: relation_types.php');
?>
