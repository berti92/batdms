<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT document_types.id, document_types.type_name, document_types.default_retention_period_id, retention_periods.period_name FROM document_types LEFT JOIN retention_periods ON document_types.default_retention_period_id = retention_periods.id WHERE document_types.id = '.$id.' AND document_types.deleted_at IS NULL');
    $document_type = mysql_fetch_assoc($res);
    $type_name = $document_type['type_name'];
    $period_name = $document_type['period_name'];
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
    <li class="active"><?php l('BreadCrump.show'); ?></li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="type_name"><?php l('DocumentType.type_name'); ?></label>
        <div><?php echo($type_name); ?></div><br/>
        <label for="period_name"><?php l('DocumentType.default_retention_period_id'); ?></label>
        <div><?php echo($period_name); ?></div><br/>
      </div>
    </div>
    <a href="document_type_edit.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('DocumentType.edit_document_type'); ?></a>
    <a href="document_type_delete.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('DocumentType.delete_document_type'); ?></a>
  <script type="text/javascript">
  </script>
</body>
</html>
