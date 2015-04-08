<?php
  include_once 'includes/database.php';
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li class="active"><?php l('BreadCrump.user'); ?></li>
  </ol>
    <div id="list_container">&nbsp;</div>
  <a class="btn btn-default" href="user_create.php"><?php l('User.create_user'); ?></a>
  <script type="text/javascript">
    get_list('_user_list.php', 1, 'list_container','user_show.php?id=##ID##');
  </script>
</body>
</html>
