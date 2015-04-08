<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
    $type_name = mysql_escape_string($_POST['type_name']);
    $default_retention_period_id = mysql_escape_string($_POST['default_retention_period_id']);
    mysql_query('INSERT INTO document_types(type_name, default_retention_period_id) VALUES("'.$type_name.'", '.$default_retention_period_id.')');
    header('Location: document_types.php');
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li><a href="document_types.php"><?php l('BreadCrump.document_type'); ?></a></li>
    <li class="active"><?php l('BreadCrump.home'); ?></li>
  </ol>
  <form action="document_type_create.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="type_name"><?php l('DocumentType.type_name'); ?></label>
        <input type="text" name="type_name" class="form-control" value="<?php l('DocumentType.type_name'); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="default_retention_period_id"><?php l('DocumentType.default_retention_period_id'); ?></label><br/>
        <?php echo(retention_period_select('default_retention_period_id', $default_retention_period_id)); ?><br/><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="document_types.php" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
