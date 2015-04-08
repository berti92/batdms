<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $table_id = $_GET['tid'];
  $page = $_GET['page'];
  $result = mysql_query('SELECT * FROM users');
?>
<table id="<?php echo($table_id); ?>" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th><?php l('User.username'); ?></th>
            <th><?php l('User.email'); ?></th>
            <th><?php l('User.birthday'); ?></th>
            <th><?php l('User.first_name'); ?></th>
            <th><?php l('User.last_name'); ?></th>
            <th><?php l('User.force_password_change'); ?></th>
        </tr>
    </thead>
    <tbody>
      <?php while($row = mysql_fetch_array($result)) { ?>
        <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['username']); ?></td>
            <td><?php echo($row['email']); ?></td>
            <td><?php echo($row['birthday']); ?></td>
            <td><?php echo($row['first_name']); ?></td>
            <td><?php echo($row['last_name']); ?></td>
            <td><?php echo(bool_to_text($row['force_password_change'])); ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>
