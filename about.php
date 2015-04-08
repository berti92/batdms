<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
    $type_name = mysql_escape_string($_POST['type_name']);
    mysql_query('INSERT INTO account_types(type_name) VALUES("'.$type_name.'")');
    header('Location: account_types.php');
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li class="active"><?php l('BreadCrump.about_batdms'); ?></li>
  </ol>
  <div class="jumbotron">
    <div class="container">
      <h1>About BatDMS</h1>
      <p>BatDMS was written by Andreas Treubert.</p>
      <p>If you have any further questions or bugs to report please write me: <a href="mailto:simplyanamedude@gmail.com">simplyanamedude@gmail.com</a></p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div>
  </div>
</body>
</html>
