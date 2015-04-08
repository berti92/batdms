<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT * FROM account_types WHERE id = '.$id);
    $account_type = mysql_fetch_assoc($res);
    $type_name = $account_type['type_name'];
  }
  if(!empty($_POST['submit']) && !empty($_POST['id'])) {
    $id = mysql_escape_string($_POST['id']);
    $type_name = mysql_escape_string($_POST['type_name']);
    mysql_query('UPDATE account_types SET type_name = "'.$type_name.'" WHERE id = '.$id);
    header('Location: account_type_show.php?id='.$id);
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
    <li class="active"><?php l('BreadCrump.edit'); ?></li>
  </ol>
  <form action="account_type_edit.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="hidden" name="id" value="<?php echo($id); ?>"
        <label for="type_name"><?php l('AccountType.type_name'); ?></label>
        <input type="text" name="type_name" class="form-control" value="<?php echo($type_name); ?>" aria-describedby="sizing-addon2" required>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="account_type_show.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
