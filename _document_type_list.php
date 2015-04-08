<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $table_id = $_GET['tid'];
  $page = $_GET['page'];
  $result = mysql_query('SELECT document_types.id, document_types.type_name, retention_periods.period_name FROM document_types LEFT JOIN retention_periods ON document_types.default_retention_period_id = retention_periods.id');
?>
<table id="<?php echo($table_id); ?>" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th><?php l('DocumentType.type_name'); ?></th>
            <th><?php l('DocumentType.default_retention_period_id'); ?></th>
        </tr>
    </thead>
    <tbody>
      <?php while($row = mysql_fetch_array($result)) { ?>
        <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['type_name']); ?></td>
            <td><?php echo($row['period_name']); ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>
