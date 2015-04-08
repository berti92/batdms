<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT * FROM documents WHERE documents.id = '.$id.' AND documents.deleted_at IS NULL');
    $document = mysql_fetch_assoc($res);
    $document_name = $document['document_name'];
    $account_id = $document['account_id'];
    $document_type_id = $document['document_type_id'];
    $retention_period_id = $document['retention_period_id'];
    $document_date = $document['document_date'];
    $comment = $document['comment'];
    $relation = $document['relation'];
  }
  if(!empty($_POST['submit']) && !empty($_POST['id'])) {
    $id = mysql_escape_string($_POST['id']);
    $document_name = mysql_escape_string($_POST['document_name']);
    $account_id = mysql_escape_string($_POST['account_id']);
    $document_type_id = mysql_escape_string($_POST['document_type_id']);
    $retention_period_id = mysql_escape_string($_POST['retention_period_id']);
    $document_date = mysql_escape_string($_POST['document_date']);
    $comment = mysql_escape_string($_POST['comment']);
    $relation = mysql_escape_string($_POST['relation']);
    mysql_query('UPDATE documents SET document_name = "'.$document_name.'", document_type_id = '.$document_type_id.', account_id = "'.$account_id.'", document_date = "'.$document_date.'", relation = "'.$relation.'", retention_period_id = "'.$retention_period_id.'", comment = "'.$comment.'" WHERE id = '.$id);
    for ($i = 0; $i < count($_FILES['uploads']['name']); $i++){
      $file_name = $_FILES['uploads']['name'][$i];
      $file_tmp = $_FILES['uploads']['tmp_name'][$i];
      $file_type = $_FILES['uploads']['type'][$i];
      $upload_data = mysql_escape_string(file_get_contents($file_tmp));
      if(!empty($upload_data)) {
        mysql_query('INSERT INTO uploads(file_name, file_type, document_id, upload_data) VALUES("'.$file_name.'","'.$file_type.'",'.$id.',"'.$upload_data.'")');
      }
    }
    $doc_id = $id;
    include('_refresh_events.php');
    header('Location: document_show.php?id='.$id);
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
    <li class="active"><?php l('BreadCrump.edit'); ?></li>
  </ol>
  <form action="document_edit.php" method="POST" enctype="multipart/form-data">
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="hidden" name="id" value="<?php echo($id); ?>"
        <label for="document_type_id"><?php l('Document.document_type_id'); ?></label><br/>
        <?php echo(document_type_select('document_type_id', $document_type_id)); ?><br/><br/>
        <label for="relation"><?php l('Document.relation'); ?></label>
        <input type="text" name="relation" class="form-control" value="<?php echo($relation); ?>" aria-describedby="sizing-addon2"><br/>
        <label for="document_date"><?php l('Document.document_date'); ?></label>
        <div class="input-group date"><input type="text" name="document_date" value="<?php echo($document_date); ?>" class="form-control" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span></div><br/>
        <label for="document_name"><?php l('Document.document_name'); ?></label>
        <input type="text" name="document_name" class="form-control" value="<?php echo($document_name); ?>" aria-describedby="sizing-addon2" required><br/>
        <label for="account_id"><?php l('Document.account_id'); ?></label><br/>
        <?php echo(account_select('account_id', $account_id)); ?><br/><br/>
        <label for="retention_period_id"><?php l('Document.retention_period_id'); ?></label><br/>
        <?php echo(retention_period_select('retention_period_id',$retention_period_id)); ?><br/><br/>
        <label for="comment"><?php l('Document.comment'); ?></label>
        <textarea name="comment" class="form-control" aria-describedby="sizing-addon2"><?php echo($comment); ?></textarea><br/>
        <div id="upload_div"></div>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="document_show.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    load_panel('upload_div', '_upload_panel.php', {document_id: <?php echo($id); ?>, edit: true});
    function delete_upload(id) {
      $.get('upload_delete.php?id='+id, function(value) {
        load_panel('upload_div', '_upload_panel.php', {document_id: <?php echo($id); ?>, edit: true});
      });
    }
    $(form).validate();
  </script>
</body>
</html>
