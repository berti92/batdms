<?php
  $NoRedirect = true;
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
    $username = mysql_escape_string($_POST['username']);
    $password = mysql_escape_string($_POST['password']);
    $res = mysql_query('SELECT * FROM users WHERE username = "'.$username.'" AND password = md5("'.$password.'") LIMIT 1');
    $user = mysql_fetch_assoc($res);
    if(!empty($user)) {
      $_SESSION['login'] = 1;
      $_SESSION['user_id'] = $user['id'];
      header('Location: index.php');
    }
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <form action="login.php" method="POST">
  <div class="login-screen">
    <h2 style="text-align:center;">BatDMS - Login</h2>
    <hr>
    <div class="input-group name">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input class="form-control" name="username" placeholder="Username" aria-describedby="basic-addon1" type="text">
    </div>
    <div class="input-group pass">
     <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-link"></i></span>
      <input class="form-control" name="password" placeholder="Password" aria-describedby="basic-addon1" type="PASSWORD">
    </div>
    <input type="submit" name="submit" class="btn btn-block pass" value="Login"/>
  </div>
  </form>
</body>
</html>
