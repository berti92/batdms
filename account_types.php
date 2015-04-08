<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li class="active"><?php l('BreadCrump.account_type'); ?></li>
  </ol>
    <div id="list_container">&nbsp;</div>
  <a class="btn btn-default" href="account_type_create.php"><?php l('AccountType.create_account_type'); ?></a>
  <script type="text/javascript">
    get_list('_account_type_list.php', 1, 'list_container','account_type_show.php?id=##ID##');
  </script>
</body>
</html>
