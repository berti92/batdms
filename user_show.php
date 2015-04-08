<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT * FROM users WHERE id = '.$id);
    $user = mysql_fetch_assoc($res);
    $username = $user['username'];
    $email = $user['email'];
    $birthday = $user['birthday'];
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $force_password_change = $user['force_password_change'];
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li><a href="users.php"><?php l('BreadCrump.user'); ?></a></li>
    <li class="active"><?php l('BreadCrump.show'); ?></li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="username"><?php l('User.username'); ?></label>
        <div><?php echo($username); ?></div><br/>
        <label for="birthday"><?php l('User.birthday'); ?></label>
        <div><?php echo($birthday); ?></div><br/>
        <label for="email"><?php l('User.email'); ?></label>
        <div><?php echo($email); ?></div><br/>
        <label for="first_name"><?php l('User.first_name'); ?></label>
        <div><?php echo($first_name); ?></div><br/>
        <label for="last_name"><?php l('User.last_name'); ?></label>
        <div><?php echo($last_name); ?></div><br/>
        <label for="force_password_change"><?php l('User.force_password_change'); ?></label>
        <div><?php echo(bool_to_text($force_password_change)); ?></div><br/>
      </div>
    </div>
    <a href="user_edit.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('User.edit_user'); ?></a>
    <a href="user_delete.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('User.delete_user'); ?></a>
  <script type="text/javascript">
  </script>
</body>
</html>
