<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $edit = false;
  if(!empty($_GET['document_id'])) {
    $document_id = mysql_escape_string($_GET['document_id']);
    $res = mysql_query('SELECT id, file_name, file_type FROM uploads WHERE document_id = '.$document_id.' AND deleted_at IS NULL');
  }
  if(!empty($_GET['edit'])) {
    $edit = true;
  }
?>
<div class="panel panel-default">
  <div class="panel-heading"><?php l('UploadPanel.uploads'); ?></div>
  <div class="panel-body">
    <table class="table">
      <thead>
        <tr>
          <th><?php l('UploadPanel.filename'); ?></th>
          <th><?php l('UploadPanel.type'); ?></th>
          <th><?php l('UploadPanel.actions'); ?></th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = mysql_fetch_array($res)) { ?>
        <tr>
          <td><?php echo($row['file_name']); ?></td>
          <td><?php echo($row['file_type']); ?></td>
          <td><a href="upload_download.php?id=<?php echo($row['id']); ?>" target="_blank" class="btn btn-primary" title="Download"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a>
          <?php if($edit==true) { echo('<a href="#" onclick="delete_upload('.$row['id'].');" class="btn btn-danger" title="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'); } ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <?php if($edit==true) { ?>
      <input name="uploads[]" type="file" multiple="multiple"><br/>
    <?php } ?>
  </div>
</div>
