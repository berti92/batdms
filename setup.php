<?php
  $NoRedirect = true;
  $erri = 'new';
  $qrs = -1;
  $qrm = -1;
  $qrl = -1;
  $dbhost = '';
  $dbport = '';
  $dbname = '';
  $dbuser = '';
  $dbpw = '';
  if(!empty($_POST['submit'])) {
    $dbhost = mysql_escape_string($_POST['dbhost']);
    $dbport = mysql_escape_string($_POST['dbport']);
    $dbname = mysql_escape_string($_POST['dbname']);
    $dbuser = mysql_escape_string($_POST['dbuser']);
    $dbpw = mysql_escape_string($_POST['dbpw']);
    $newl = "\n";
    $config_content = '<?php'.$newl.'$config = array();'.$newl.'$config["dbhost"] = "'.$dbhost.'";'.$newl.'$config["dbport"] = "'.$dbport.'";'.$newl.'$config["dbname"] = "'.$dbname.'";'.$newl.'$config["dbuser"] = "'.$dbuser.'";'.$newl.'$config["dbpw"] = "'.$dbpw.'";'.$newl.'?>';
    file_put_contents('includes/config.php', $config_content);
    $dbhandle = mysql_connect($dbhost.':'.$dbport, $dbuser, $dbpw) or $erri = 'Can not connect to database, please check that your database exists and your MySQL informations are correct!';
    mysql_select_db($dbname ,$dbhandle);
    mysql_query("SET NAMES 'utf8'");
    $ar_sql = Array();
    $sqls = str_replace("\n",'', str_replace('YOURDATABASE',$dbname,file_get_contents('dms_sqlscript.sql')));
    $sqlm = str_replace("\n",'', str_replace('YOURDATABASE',$dbname,file_get_contents('migrate.sql')));
    $sqll = str_replace("\n",'', str_replace('YOURDATABASE',$dbname,file_get_contents('localizations.sql')));
    foreach(explode(";", $sqls) as $sql) {
      array_push($ar_sql, $sql);
    }
    foreach(explode(";", $sqlm) as $sql) {
      array_push($ar_sql, $sql);
    }
    foreach(explode(";", $sqll) as $sql) {
      array_push($ar_sql, $sql);
    }
    foreach($ar_sql as $sql) {
      if(($erri == 'new' || $erri == '') && !empty(str_replace(' ','',$sql))) {
        $qr = mysql_query($sql) or (mysql_errno() !== 1065 ? $erri = 'Something went wrong, please check that your database exists and your MySQL informations are correct! -- '.mysql_errno().' '.mysql_error() : $erri = '');
      }
    }
    if($erri == 'new') {
      $erri = '';
    }
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">BatDMS</a>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <?php if(empty($erri)) { ?>
    <div class="alert alert-success" role="alert">
      Installation successfull, please remove the setup.php file from your server.
      You can now login on the <a href="login.php">mainpage</a> with the following login data:
      user: admin
      password: admin
    </div>
  <?php } ?>
  <?php if(!empty($erri) && $erri != 'new') { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo($erri); ?>
    </div>
  <?php } ?>
  <ol class="breadcrumb">
    <li class="active">Setup</li>
  </ol>
  <form action="setup.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="dbhost">MySQL host</label>
        <input type="text" name="dbhost" placeholder="MySQL host" value="<?php echo($dbhost); ?>" class="form-control" aria-describedby="sizing-addon2" required><br/>
        <label for="dbport">MySQL port</label>
        <input type="text" name="dbport" placeholder="MySQL port" value="<?php echo($dbport); ?>" class="form-control" aria-describedby="sizing-addon2" required><br/>
        <label for="dbname">Database name</label>
        <input type="text" name="dbname" placeholder="Database name" value="<?php echo($dbname); ?>" class="form-control" aria-describedby="sizing-addon2" required><br/>
        <label for="dbuser">MySQL user</label>
        <input type="text" name="dbuser" placeholder="MySQL user" value="<?php echo($dbuser); ?>" class="form-control" aria-describedby="sizing-addon2" required><br/>
        <label for="dbpw">MySQL password</label>
        <input type="password" name="dbpw" placeholder="MySQL password" value="<?php echo($dbpw); ?>" class="form-control" aria-describedby="sizing-addon2" required><br/>
        <input type="submit" name="submit" class="btn btn-default" value="Start installation"/>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
