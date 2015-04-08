<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $lang = mysql_fetch_assoc(mysql_query('SELECT * FROM user_settings WHERE setting_key = "language_id" AND user_id = '.$user_id));
  if(!empty($_POST['submit'])) {
    $language_id = mysql_escape_string($_POST['language_id']);
    mysql_query('DELETE FROM user_settings WHERE user_id = '.$user_id);
    mysql_query('INSERT INTO user_settings(user_id, setting_key, setting_value) VALUES('.$user_id.',"language_id","'.$language_id.'")');
    header('Location: settings.php');
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li class="active"><?php l('BreadCrump.settings'); ?></li>
  </ol>
  <form action="settings.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="language"><?php l('Settings.language'); ?></label><br/>
        <?php echo(language_select('language_id', $lang['setting_value'])); ?><br/><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="accounts.php" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
</body>
</html>
