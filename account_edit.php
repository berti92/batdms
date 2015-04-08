<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT accounts.id, accounts.account_name, accounts.account_ext, account_types.type_name, accounts.relation, accounts.account_type_id, accounts.street_name, accounts.street_ext, accounts.house_no, accounts.zip, accounts.city_name, countries.country_name, countries.id AS country_id FROM accounts LEFT JOIN account_types ON account_types.id = accounts.account_type_id LEFT JOIN countries ON countries.id = accounts.country_id WHERE accounts.id = '.$id.' AND accounts.deleted_at IS NULL');
    $account = mysql_fetch_assoc($res);
    $account_name = $account['account_name'];
    $account_type_id = $account['account_type_id'];
    $account_ext = $account['account_ext'];
    $street_name = $account['street_name'];
    $street_ext = $account['street_ext'];
    $house_no = $account['house_no'];
    $zip = $account['zip'];
    $city_name = $account['city_name'];
    $country_id = $account['country_id'];
    $relation = $account['relation'];
  }
  if(!empty($_POST['submit']) && !empty($_POST['id'])) {
    $id = mysql_escape_string($_POST['id']);
    $account_name = mysql_escape_string($_POST['account_name']);
    $account_type_id = mysql_escape_string($_POST['account_type_id']);
    $account_ext = mysql_escape_string($_POST['account_ext']);
    $street_name = mysql_escape_string($_POST['street_name']);
    $street_ext = mysql_escape_string($_POST['street_ext']);
    $house_no = mysql_escape_string($_POST['house_no']);
    $zip = mysql_escape_string($_POST['zip']);
    $city_name = mysql_escape_string($_POST['city_name']);
    $country_id = mysql_escape_string($_POST['country_id']);
    $relation = mysql_escape_string($_POST['relation']);
    mysql_query('UPDATE accounts SET account_name = "'.$account_name.'", relation = "'.$relation.'", account_type_id = '.$account_type_id.', account_ext = "'.$account_ext.'", street_name = "'.$street_name.'", house_no = "'.$house_no.'", street_ext = "'.$street_ext.'", country_id = '.$country_id.', zip = "'.$zip.'", city_name = "'.$zip.'" WHERE id = '.$id);
    header('Location: account_show.php?id='.$id);
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
    <li class="active"><?php l('BreadCrump.edit'); ?></li>
  </ol>
  <form action="account_edit.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="hidden" name="id" value="<?php echo($id); ?>"
        <label for="account_type_id"><?php l('Account.account_type_id'); ?></label><br/>
        <?php echo(account_type_select('account_type_id', $account_type_id)); ?><br/>
        <label for="account_name"><?php l('Account.account_name'); ?></label>
        <input type="text" name="account_name" class="form-control" value="<?php echo($account_name); ?>" aria-describedby="sizing-addon2" required>
        <label for="relation"><?php l('Account.relation'); ?></label>
        <input type="text" name="relation" class="form-control" value="<?php echo($relation); ?>" aria-describedby="sizing-addon2">
        <label for="account_ext"><?php l('Account.account_ext'); ?></label>
        <input type="text" name="account_ext" class="form-control" value="<?php echo($account_ext); ?>" aria-describedby="sizing-addon2">
        <label for="street_name"><?php l('Account.street_name'); ?></label>
        <input type="text" name="street_name" class="form-control" value="<?php echo($street_name); ?>" aria-describedby="sizing-addon2">
        <label for="street_ext"><?php l('Account.street_ext'); ?></label>
        <input type="text" name="street_ext" class="form-control" value="<?php echo($street_ext); ?>" aria-describedby="sizing-addon2">
        <label for="house_no"><?php l('Account.house_no'); ?></label>
        <input type="text" name="house_no" class="form-control" value="<?php echo($house_no); ?>" aria-describedby="sizing-addon2">
        <label for="zip"><?php l('Account.zip'); ?></label>
        <input type="text" name="zip" class="form-control" value="<?php echo($zip); ?>" aria-describedby="sizing-addon2">
        <label for="city_name"><?php l('Account.city_name'); ?></label>
        <input type="text" name="city_name" class="form-control" value="<?php echo($city_name); ?>" aria-describedby="sizing-addon2">
        <label for="country_id"><?php l('Account.country_id'); ?></label><br/>
        <?php echo(country_select('country_id', $country_id)); ?><br/><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="account_show.php?id=<?php echo($id); ?>" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
