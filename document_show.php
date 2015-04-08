<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT documents.id, document_types.type_name, retention_periods.period_name, documents.comment, accounts.account_name, documents.document_name, documents.document_date, documents.relation FROM documents LEFT JOIN document_types ON document_types.id = documents.document_type_id LEFT JOIN retention_periods ON retention_periods.id = documents.retention_period_id LEFT JOIN accounts ON accounts.id = documents.account_id WHERE documents.id = '.$id.' AND documents.deleted_at IS NULL');
    $document = mysql_fetch_assoc($res);
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li><a href="documents.php"><?php l('BreadCrump.document'); ?></a></li>
    <li class="active"><?php l('BreadCrump.show'); ?></li>
  </ol>
  <form action="account_edit.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="document_type_id"><?php l('Document.document_type_id'); ?></label><br/>
        <div><?php echo($document['type_name']); ?></div><br/>
        <label for="document_date"><?php l('Document.document_date'); ?></label>
        <div><?php echo($document['document_date']); ?></div><br/>
        <label for="document_name"><?php l('Document.document_name'); ?></label>
        <div><?php echo($document['document_name']); ?></div><br/>
        <label for="relation"><?php l('Document.relation'); ?></label>
        <div><?php echo($document['relation']); ?></div><br/>
        <label for="account_id"><?php l('Document.account_id'); ?></label><br/>
        <div><?php echo($document['account_name']); ?></div><br/>
        <label for="retention_period_id"><?php l('Document.retention_period_id'); ?></label><br/>
        <div><?php echo($document['period_name']); ?></div><br/>
        <label for="comment"><?php l('Document.comment'); ?></label>
        <div><?php echo($document['comment']); ?></div><br/>
        <div id="upload_div"></div>
        <a href="document_edit.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('Document.edit_document'); ?></a>
        <a href="document_delete.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('Document.delete_document'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    load_panel('upload_div', '_upload_panel.php', {document_id: <?php echo($id); ?>});
  </script>
</body>
</html>
