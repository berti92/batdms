<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $table_id = $_GET['tid'];
  $page = $_GET['page'];
  $result = mysql_query('SELECT * FROM account_types');
?>
<table id="<?php echo($table_id); ?>" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th><?php l('AccountType.type_name'); ?></th>
        </tr>
    </thead>
    <tbody>
      <?php while($row = mysql_fetch_array($result)) { ?>
        <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['type_name']); ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>
