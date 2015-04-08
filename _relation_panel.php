<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['account_id'])) {
    $account_id = mysql_escape_string($_GET['account_id']);
    $res = mysql_query('SELECT relations.id, relation_types.type_name, relations.relation_value, relations.comment FROM relations LEFT JOIN relation_types ON relation_types.id = relations.relation_type_id WHERE relations.account_id = '.$account_id);
  } else {
    $document_id = mysql_escape_string($_GET['document_id']);
    $res = mysql_query('SELECT relations.id, relation_types.type_name, relations.relation_value, relations.comment FROM relations LEFT JOIN relation_types ON relation_types.id = relations.relation_type_id WHERE relations.document_id = '.$document_id);
  }
?>
<div class="panel panel-default">
  <div class="panel-heading">Relations</div>
  <div class="panel-body">
    <table class="table">
      <thead>
        <tr>
          <th>Typ</th>
          <th>Value</th>
          <th>Comment</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = mysql_fetch_array($res)) { ?>
        <tr>
          <td><?php echo($row['type_name']); ?></td>
          <td><?php echo($row['relation_value']); ?></td>
          <td><?php echo($row['comment']); ?></td>
          <td>ACTION</td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <a href="#" onclick="new_relation();" class="btn btn-default">New relation</a>
  </div>
</div>
