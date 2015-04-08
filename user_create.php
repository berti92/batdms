<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
    $username = mysql_escape_string($_POST['username']);
    $password = mysql_escape_string($_POST['password']);
    $confirm_password = mysql_escape_string($_POST['confirm_password']);
    $email = mysql_escape_string($_POST['email']);
    $birthday = mysql_escape_string($_POST['birthday']);
    $first_name = mysql_escape_string($_POST['first_name']);
    $last_name = mysql_escape_string($_POST['last_name']);
    if(!empty($_POST['force_password_change'])) {
      $force_password_change = (bool) mysql_escape_string($_POST['force_password_change']);
    } else {
      $force_password_change = 0;
    }
    if($password == $confirm_password) {
      mysql_query('INSERT INTO users(username, password, email, birthday, first_name, last_name, force_password_change) VALUES("'.$username.'",md5("'.$password.'"),"'.$email.'","'.$birthday.'","'.$first_name.'","'.$last_name.'", '.$force_password_change.')');
      mysql_query('INSERT INTO user_settings(user_id, setting_key, setting_value) VALUES('.mysql_insert_id().',"language_id",(SELECT id FROM languages WHERE language_name = "English"))')
      header('Location: users.php');
    }
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
    <li class="active"><?php l('BreadCrump.new'); ?></li>
  </ol>
  <form action="user_create.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="username"><?php l('User.username'); ?></label>
        <input type="text" name="username" class="form-control" placeholder="<?php l('User.username'); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="password"><?php l('User.password'); ?></label>
        <input type="password" name="password" class="form-control" placeholder="<?php l('User.password'); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="confirm_password"><?php l('User.confirm_password'); ?></label>
        <input type="password" name="confirm_password" class="form-control" placeholder="<?php l('User.confirm_password'); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="email"><?php l('User.email'); ?></label>
        <input type="email" name="email" class="form-control" placeholder="<?php l('User.email'); ?>" aria-describedby="sizing-addon2"><br/>
        <label for="birthday"><?php l('User.birthday'); ?></label>
        <div class="input-group date"><input type="text" name="birthday" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span></div><br/>
        <label for="first_name"><?php l('User.first_name'); ?></label>
        <input type="text" name="first_name" class="form-control" placeholder="<?php l('User.first_name'); ?>" aria-describedby="sizing-addon2"><br/>
        <label for="last_name"><?php l('User.last_name'); ?></label>
        <input type="text" name="last_name" class="form-control" placeholder="<?php l('User.last_name'); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="force_password_change"><?php l('User.force_password_change'); ?></label>
        <input type="checkbox" name="force_password_change" class="form-control" aria-describedby="sizing-addon2"><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="users.php" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
