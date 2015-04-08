<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $res = mysql_query('SELECT events.id, events.document_id, documents.document_name, documents.document_date, document_types.type_name, accounts.account_name FROM events LEFT JOIN documents ON events.document_id = documents.id LEFT JOIN document_types ON documents.document_type_id = document_types.id LEFT JOIN accounts ON documents.account_id = accounts.id WHERE events.start_time <= NOW() AND events.end_time >= NOW() AND events.deleted_at IS NULL');
?>
<div class="panel panel-default">
  <div class="panel-heading"><?php l('EventPanel.outdated_documents'); ?></div>
  <div class="panel-body">
    <table class="table">
      <thead>
        <tr>
          <th><?php l('EventPanel.document_name'); ?></th>
          <th><?php l('EventPanel.document_type'); ?></th>
          <th><?php l('EventPanel.document_date'); ?></th>
          <th><?php l('EventPanel.account_name'); ?></th>
          <th><?php l('EventPanel.actions'); ?></th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = mysql_fetch_array($res)) { ?>
        <tr>
          <td><?php echo($row['document_name']); ?></td>
          <td><?php echo($row['type_name']); ?></td>
          <td><?php echo($row['document_date']); ?></td>
          <td><?php echo($row['account_name']); ?></td>
          <td>
            <a href="document_show.php?id=<?php echo($row['document_id']); ?>" target="_blank" class="btn btn-primary" title="Show document"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
            <a href="#" onclick="delete_event(<?php echo($row['id']); ?>);" class="btn btn-warning" title="Delete Event"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="#" onclick="delete_document_event(<?php echo($row['id']); ?>,<?php echo($row['document_id']); ?>);" class="btn btn-danger" title="Delete Document & Event"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
        </tr>
      <?php } ?>
      <?php if(mysql_num_rows($res) == 0) { ?>
        <tr align="center">
          <td colspan="5"><?php l('App.no_records_found'); ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div>
