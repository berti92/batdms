<?php
  include_once 'includes/database.php';
  echo(json_encode($_SESSION['notify']));
  $_SESSION['notify'] = Array();
  $_SESSION['notify']['error'] = Array();
  $_SESSION['notify']['success'] = Array();
  $_SESSION['notify']['info'] = Array();
  $_SESSION['notify']['warn'] = Array();
?>
