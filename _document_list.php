<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $table_id = $_GET['tid'];
  $page = $_GET['page'];
  $result = mysql_query('SELECT documents.id, documents.document_name, accounts.account_name, document_types.type_name, retention_periods.period_name, documents.document_date, documents.relation FROM documents LEFT JOIN document_types ON document_types.id = documents.document_type_id LEFT JOIN accounts ON accounts.id = documents.account_id LEFT JOIN retention_periods ON retention_periods.id = documents.retention_period_id WHERE documents.deleted_at IS NULL');
?>
<table id="<?php echo($table_id); ?>" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th><?php l('Document.document_name'); ?></th>
            <th><?php l('Document.relation'); ?></th>
            <th><?php l('Document.document_type_id'); ?></th>
            <th><?php l('Document.account_id'); ?></th>
            <th><?php l('Document.retention_period_id'); ?></th>
            <th><?php l('Document.document_date'); ?></th>
        </tr>
    </thead>
    <tbody>
      <?php while($row = mysql_fetch_array($result)) { ?>
        <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['document_name']); ?></td>
            <td><?php echo($row['relation']); ?></td>
            <td><?php echo($row['type_name']); ?></td>
            <td><?php echo($row['account_name']); ?></td>
            <td><?php echo($row['period_name']); ?></td>
            <td><?php echo($row['document_date']); ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>
