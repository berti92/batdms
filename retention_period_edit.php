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
  if(!empty($_POST['submit']) && !empty($_POST['id'])) {
    $id = mysql_escape_string($_POST['id']);
    $period_name = mysql_escape_string($_POST['period_name']);
    $max_time_in_days = mysql_escape_string($_POST['max_time_in_days']);
    mysql_query('UPDATE retention_periods SET period_name = "'.$period_name.'", max_time_in_days = "'.$max_time_in_days.'" WHERE id = '.$id);
    header('Location: retention_period_show.php?id='.$id);
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
    <li class="active"><?php l('RetentionPeriod.edit'); ?></li>
  </ol>
  <form action="retention_period_edit.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="hidden" name="id" value="<?php echo($id); ?>"
        <label for="period_name"><?php l('RetentionPeriod.period_name'); ?></label>
        <input type="text" name="period_name" class="form-control" value="<?php echo($period_name); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="max_time_in_days"><?php l('RetentionPeriod.max_time_in_days'); ?></label>
        <input type="number" name="max_time_in_days" class="form-control" value="<?php echo($max_time_in_days); ?>" aria-describedby="sizing-addon2" required><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="retention_period_show.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
