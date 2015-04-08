<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $table_id = $_GET['tid'];
  $page = $_GET['page'];
  $result = mysql_query('SELECT accounts.id, accounts.account_name, accounts.relation, account_types.type_name, accounts.street_name, accounts.house_no, accounts.zip, accounts.city_name, countries.country_name FROM accounts LEFT JOIN account_types ON account_types.id = accounts.account_type_id LEFT JOIN countries ON countries.id = accounts.country_id WHERE accounts.deleted_at IS NULL');
?>
<table id="<?php echo($table_id); ?>" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th><?php l('Account.account_name'); ?></th>
            <th><?php l('Account.relation'); ?></th>
            <th><?php l('Account.account_type_id'); ?></th>
            <th><?php l('Account.city_name'); ?></th>
            <th><?php l('Account.country_id'); ?></th>
        </tr>
    </thead>
    <tbody>
      <?php while($row = mysql_fetch_array($result)) { ?>
        <tr>
            <td><?php echo($row['id']); ?></td>
            <td><?php echo($row['account_name']); ?></td>
            <td><?php echo($row['relation']); ?></td>
            <td><?php echo($row['type_name']); ?></td>
            <td><?php echo($row['city_name']); ?></td>
            <td><?php echo($row['country_name']); ?></td>
        </tr>
      <?php } ?>
    </tbody>
</table>
