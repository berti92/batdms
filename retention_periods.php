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
    <li class="active"><?php l('BreadCrump.retention_period'); ?></li>
  </ol>
    <div id="list_container">&nbsp;</div>
  <a class="btn btn-default" href="retention_period_create.php"><?php l('RetentionPeriod.create_retention_period'); ?></a>
  <script type="text/javascript">
    get_list('_retention_period_list.php', 1, 'list_container','retention_period_show.php?id=##ID##');
  </script>
</body>
</html>
