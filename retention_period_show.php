<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT * FROM retention_periods WHERE id = '.$id);
    $retention_period = mysql_fetch_assoc($res);
    $period_name = $retention_period['period_name'];
    $max_time_in_days = $retention_period['max_time_in_days'];
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li><a href="retention_periods.php"><?php l('BreadCrump.retention_period'); ?></a></li>
    <li class="active"><?php l('BreadCrump.show'); ?></li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="period_name"><?php l('RetentionPeriod.period_name'); ?></label>
        <div><?php echo($period_name); ?></div><br/>
        <label for="max_time_in_days"><?php l('RetentionPeriod.max_time_in_days'); ?></label>
        <div><?php echo($max_time_in_days); ?></div><br/>
      </div>
    </div>
    <a href="retention_period_edit.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('RetentionPeriod.edit_retention_period'); ?></a>
    <a href="retention_period_delete.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('RetentionPeriod.delete_retention_period'); ?></a>
  <script type="text/javascript">
  </script>
</body>
</html>
