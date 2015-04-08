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
    <li><a href="account_types.php"><?php l('BreadCrump.account_type'); ?></a></li>
    <li class="active"><?php l('BreadCrump.new'); ?></li>
  </ol>
  <form action="account_type_create.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="type_name"><?php l('AccountType.type_name'); ?></label>
        <input type="text" name="type_name" class="form-control" placeholder="<?php l('AccountType.type_name'); ?>" aria-describedby="sizing-addon2" required><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="account_types.php" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
