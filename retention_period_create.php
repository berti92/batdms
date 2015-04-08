<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
    $period_name = mysql_escape_string($_POST['period_name']);
    $max_time_in_days = mysql_escape_string($_POST['max_time_in_days']);
    mysql_query('INSERT INTO retention_periods(period_name, max_time_in_days) VALUES("'.$period_name.'","'.$max_time_in_days.'")');
    header('Location: retention_periods.php');
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
    <li class="active"><?php l('BreadCrump.new'); ?></li>
  </ol>
  <form action="retention_period_create.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="period_name"><?php l('RetentionPeriod.period_name'); ?></label>
        <input type="text" name="period_name" class="form-control" placeholder="<?php l('RetentionPeriod.period_name'); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="max_time_in_days"><?php l('RetentionPeriod.max_time_in_days'); ?></label>
        <input type="number" name="max_time_in_days" class="form-control" placeholder="365" aria-describedby="sizing-addon2" required><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="retention_periods.php" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
