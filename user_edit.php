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
  if(!empty($_POST['submit']) && !empty($_POST['id'])) {
    $id = mysql_escape_string($_POST['id']);
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
    mysql_query('UPDATE users SET username = "'.$username.'", email = "'.$email.'", birthday = "'.$birthday.'", first_name = "'.$first_name.'", last_name = "'.$last_name.'", force_password_change = '.$force_password_change.' WHERE id = '.$id);
    if(!empty($password) && $password == $confirm_password) {
      mysql_query('UPDATE users SET password = password = md5("'.$password.'") WHERE id = '.$id);
    }
    header('Location: user_show.php?id='.$id);
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
    <li class="active"><?php l('BreadCrump.edit'); ?></li>
  </ol>
  <form action="user_edit.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="hidden" name="id" value="<?php echo($id); ?>">
        <label for="username"><?php l('User.username'); ?></label>
        <input type="text" name="username" class="form-control" value="<?php echo($username); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="password"><?php l('User.password'); ?></label>
        <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2"><br/>
        <label for="confirm_password"><?php l('User.confirm_password'); ?></label>
        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" aria-describedby="sizing-addon2"><br/>
        <label for="email"><?php l('User.email'); ?></label>
        <input type="text" name="email" class="form-control" value="<?php echo($email); ?>" aria-describedby="sizing-addon2"><br/>
        <label for="birthday"><?php l('User.birthday'); ?></label>
        <div class="input-group date"><input type="text" name="birthday" value="<?php echo($birthday); ?>" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span></div><br/>
        <label for="first_name"><?php l('User.first_name'); ?></label>
        <input type="text" name="first_name" class="form-control" value="<?php echo($first_name); ?>" aria-describedby="sizing-addon2"><br/>
        <label for="last_name"><?php l('User.last_name'); ?></label>
        <input type="text" name="last_name" class="form-control" value="<?php echo($last_name); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="force_password_change"><?php l('User.force_password_change'); ?></label>
        <input type="checkbox" name="force_password_change" class="form-control" aria-describedby="sizing-addon2" <?php if((bool) $user['force_password_change']) {echo('checked');}?>><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="user_show.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
