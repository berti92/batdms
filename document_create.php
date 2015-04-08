<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
    $document_name = mysql_escape_string($_POST['document_name']);
    $document_type_id = mysql_escape_string($_POST['document_type_id']);
    $relation = mysql_escape_string($_POST['relation']);
    $account_id = mysql_escape_string($_POST['account_id']);
    $retention_period_id = mysql_escape_string($_POST['retention_period_id']);
    $comment = mysql_escape_string($_POST['comment']);
    $document_date = mysql_escape_string($_POST['document_date']);
    mysql_query('INSERT INTO documents(document_name, account_id, retention_period_id,document_type_id,document_date, comment, relation) VALUES("'.$document_name.'",'.$account_id.','.$retention_period_id.','.$document_type_id.',"'.$document_date.'","'.$comment.'","'.$relation.'")');
    $doc_id = mysql_insert_id();
    #upload_name, file_name, file_type, account_id, document_id, upload_data
      for ($i = 0; $i < count($_FILES['uploads']['name']); $i++){
        $file_name = $_FILES['uploads']['name'][$i];
        $file_tmp = $_FILES['uploads']['tmp_name'][$i];
        $file_type = $_FILES['uploads']['type'][$i];
        $upload_data = mysql_escape_string(file_get_contents($file_tmp));
        if(!empty($upload_data)) {
          mysql_query('INSERT INTO uploads(file_name, file_type, document_id, upload_data) VALUES("'.$file_name.'","'.$file_type.'",'.$doc_id.',"'.$upload_data.'")');
        }
      }
    $doc_id = mysql_insert_id();
    include('_refresh_events.php');
    header('Location: documents.php');
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
    <li class="active"><?php l('BreadCrump.new'); ?></li>
  </ol>
  <form action="document_create.php" method="POST" enctype="multipart/form-data">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="document_type_id"><?php l('Document.document_type_id'); ?></label><br/>
        <?php echo(document_type_select('document_type_id')); ?><br/><br/>
        <label for="document_date"><?php l('Document.document_date'); ?></label>
        <div class="input-group date"><input type="text" name="document_date" placeholder="Date" class="form-control" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span></div><br/>
        <label for="document_name"><?php l('Document.document_name'); ?></label>
        <input type="text" name="document_name" class="form-control" placeholder="Document name" aria-describedby="sizing-addon2" required><br/>
        <label for="relation"><?php l('Document.relation'); ?></label>
        <input type="text" name="relation" class="form-control" placeholder="relation" aria-describedby="sizing-addon2"><br/>
        <label for="account_id"><?php l('Document.account_id'); ?></label><br/>
        <?php echo(account_select('account_id')); ?><br/><br/>
        <label for="retention_period_id"><?php l('Document.retention_period_id'); ?></label><br/>
        <?php echo(retention_period_select('retention_period_id')); ?><br/><br/>
        <label for="comment"><?php l('Document.comment'); ?></label>
        <textarea name="comment" class="form-control" placeholder="Comment" aria-describedby="sizing-addon2"></textarea><br/>
        <label for="uploads"><?php l('UploadPanel.uploads'); ?></label>
        <input name="uploads[]" type="file" multiple="multiple"><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="documents.php" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
