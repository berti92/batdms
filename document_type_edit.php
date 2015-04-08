<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT document_types.id, document_types.type_name, document_types.default_retention_period_id, retention_periods.period_name FROM document_types LEFT JOIN retention_periods ON document_types.default_retention_period_id = retention_periods.id WHERE document_types.id = '.$id);
    $document_type = mysql_fetch_assoc($res);
    $type_name = $document_type['type_name'];
    $default_retention_period_id = $document_type['default_retention_period_id'];
  }
  if(!empty($_POST['submit']) && !empty($_POST['id'])) {
    $id = mysql_escape_string($_POST['id']);
    $type_name = mysql_escape_string($_POST['type_name']);
    $default_retention_period_id = mysql_escape_string($_POST['default_retention_period_id']);
    mysql_query('UPDATE document_types SET type_name = "'.$type_name.'", default_retention_period_id = '.$default_retention_period_id.' WHERE id = '.$id);
    header('Location: document_type_show.php?id='.$id);
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
    <li class="active"><?php l('BreadCrump.edit'); ?></li>
  </ol>
  <form action="document_type_edit.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="hidden" name="id" value="<?php echo($id); ?>"
        <label for="type_name"><?php l('DocumentType.type_name'); ?></label>
        <input type="text" name="type_name" class="form-control" value="<?php echo($type_name); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="default_retention_period_id"><?php l('DocumentType.default_retention_period_id'); ?></label><br/>
        <?php echo(retention_period_select('default_retention_period_id', $default_retention_period_id)); ?><br/><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="relation_type_show.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
