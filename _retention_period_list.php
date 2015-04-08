<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $table_id = $_GET['tid'];
  $page = $_GET['page'];
  $result = mysql_query('SELECT * FROM retention_periods');
?>
<table id="<?php echo($table_id); ?>" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th><?php l('RetentionPeriod.period_name'); ?></th>
            <th><?php l('RetentionPeriod.max_time_in_days'); ?></th>
        </tr>
    </thead>
    <tbody>
      <?php while($row = mysql_fetch_array($result)) { ?>
        <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['period_name']); ?></td>
            <td><?php echo($row['max_time_in_days']); ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>
