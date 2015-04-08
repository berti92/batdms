<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT * FROM account_types WHERE id = '.$id);
    $account_type = mysql_fetch_assoc($res);
    $type_name = $account_type['type_name'];
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
    <li class="active"><?php l('BreadCrump.show'); ?></li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="type_name"><?php l('AccountType.type_name'); ?></label>
        <div><?php echo($type_name); ?></div><br/>
      </div>
    </div>
    <a href="account_type_edit.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('AccountType.edit_account_type'); ?></a>
    <a href="account_type_delete.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('AccountType.delete_account_type'); ?></a>
  <script type="text/javascript">
  </script>
</body>
</html>
