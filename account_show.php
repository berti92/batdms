<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT accounts.id, accounts.account_name, accounts.relation, accounts.account_ext, account_types.type_name, accounts.street_name, accounts.street_ext, accounts.house_no, accounts.zip, accounts.city_name, countries.country_name FROM accounts LEFT JOIN account_types ON account_types.id = accounts.account_type_id LEFT JOIN countries ON countries.id = accounts.country_id WHERE accounts.id = '.$id.' AND accounts.deleted_at IS NULL');
    $account = mysql_fetch_assoc($res);
    $account_name = $account['account_name'];
    $account_type_id = $account['type_name'];
    $account_ext = $account['account_ext'];
    $street_name = $account['street_name'];
    $street_ext = $account['street_ext'];
    $house_no = $account['house_no'];
    $zip = $account['zip'];
    $city_name = $account['city_name'];
    $country_id = $account['country_name'];
    $relation = $account['relation'];
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li><a href="accounts.php"><?php l('BreadCrump.account'); ?></a></li>
    <li class="active"><?php l('BreadCrump.show'); ?></li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="account_type_id"><?php l('Account.account_type_id'); ?></label><br/>
        <div><?php echo($account_type_id); ?></div><br/>
        <label for="account_name"><?php l('Account.account_name'); ?></label>
        <div><?php echo($account_name); ?></div><br/>
        <label for="relation"><?php l('Account.relation'); ?></label>
        <div><?php echo($relation); ?></div><br/>
        <label for="account_ext"><?php l('Account.account_ext'); ?></label>
        <div><?php echo($account_ext); ?></div><br/>
        <label for="street_name"><?php l('Account.street_name'); ?></label>
        <div><?php echo($street_name); ?></div><br/>
        <label for="street_ext"><?php l('Account.street_ext'); ?></label>
        <div><?php echo($street_ext); ?></div><br/>
        <label for="house_no"><?php l('Account.house_no'); ?></label>
        <div><?php echo($house_no); ?></div><br/>
        <label for="zip"><?php l('Account.zip'); ?></label>
        <div><?php echo($zip); ?></div><br/>
        <label for="city_name"><?php l('Account.city_name'); ?></label>
        <div><?php echo($city_name); ?></div><br/>
        <label for="country_id"><?php l('Account.country_id'); ?></label><br/>
        <div><?php echo($country_id); ?></div><br/>
      </div>
    </div>
    <a href="account_edit.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('Account.edit_account'); ?></a>
    <a href="account_delete.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('Account.delete_account'); ?></a>
  <script type="text/javascript">
  </script>
</body>
</html>
