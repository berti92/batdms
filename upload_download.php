<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $edit = false;
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT * FROM uploads WHERE id = '.$id);
    $row = mysql_fetch_assoc($res);
    header('Content-Type: '.$row['file_type']);
    header('Content-Disposition: attachment; filename="'.$row['file_name'].'"');
    echo($row['upload_data']);
  }
?>
