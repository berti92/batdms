<?php
  $NoRedirect = true;
  $_SESSION['login'] = 0;
  $_SESSION['user_id'] = null;
  header('Location: login.php');
?>
