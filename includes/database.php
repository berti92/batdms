<?php
  session_start();
  include 'includes/config.php';
  $dbhandle = mysql_connect($config['dbhost'].':'.$config['dbport'], $config['dbuser'], $config['dbpw']) or die("cannot connect");
  mysql_select_db($config['dbname'] ,$dbhandle);
  mysql_query("SET NAMES 'utf8'");

  /* CHECK LOGIN */
  if(!empty($_SESSION['login']) && $_SESSION['login'] === 1) {
    $LoggedIn = true;
    $user_id = $_SESSION['user_id'];
  } else {
    $LoggedIn = false;
    $user_id = NULL;
    if(empty($NoRedirect) || !$NoRedirect === true) { header('Location: login.php'); }
  }
?>
