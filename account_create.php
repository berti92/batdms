<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
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
    mysql_query('INSERT INTO accounts(account_name, account_ext, account_type_id, relation, street_name, street_ext, house_no, zip, city_name, country_id) VALUES("'.$account_name.'","'.$account_ext.'","'.$account_type_id.'","'.$relation.'","'.$street_name.'","'.$street_ext.'","'.$house_no.'","'.$zip.'","'.$city_name.'","'.$country_id.'")');
    header('Location: accounts.php');
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
    <li class="active"><?php l('BreadCrump.new'); ?></li>
  </ol>
  <form action="account_create.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="account_type_id"><?php l('Account.account_type_id'); ?></label><br/>
        <?php echo(account_type_select('account_type_id')); ?><br/>
        <label for="account_name"><?php l('Account.account_name'); ?></label>
        <input type="text" name="account_name" class="form-control" placeholder="<?php l('Account.account_name'); ?>" aria-describedby="sizing-addon2" required>
        <label for="relation"><?php l('Account.relation'); ?></label>
        <input type="text" name="relation" class="form-control" placeholder="<?php l('Account.relation'); ?>" aria-describedby="sizing-addon2">
        <label for="account_ext"><?php l('Account.account_ext'); ?></label>
        <input type="text" name="account_ext" class="form-control" placeholder="<?php l('Account.account_ext'); ?>" aria-describedby="sizing-addon2">
        <label for="street_name"><?php l('Account.street_name'); ?></label>
        <input type="text" name="street_name" class="form-control" placeholder="<?php l('Account.street_name'); ?>" aria-describedby="sizing-addon2">
        <label for="street_ext"><?php l('Account.street_ext'); ?></label>
        <input type="text" name="street_ext" class="form-control" placeholder="<?php l('Account.street_ext'); ?>" aria-describedby="sizing-addon2">
        <label for="house_no"><?php l('Account.house_no'); ?></label>
        <input type="text" name="house_no" class="form-control" placeholder="<?php l('Account.house_no'); ?>" aria-describedby="sizing-addon2">
        <label for="zip"><?php l('Account.zip'); ?></label>
        <input type="text" name="zip" class="form-control" placeholder="<?php l('Account.zip'); ?>" aria-describedby="sizing-addon2">
        <label for="city_name"><?php l('Account.city_name'); ?></label>
        <input type="text" name="city_name" class="form-control" placeholder="<?php l('Account.city_name'); ?>" aria-describedby="sizing-addon2">
        <label for="country_id"><?php l('Account.country_id'); ?></label><br/>
        <?php echo(country_select('country_id')); ?><br/><br/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php l('App.save'); ?>"/>
        <a href="accounts.php" class="btn btn-default"><?php l('App.cancel'); ?></a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    $(form).validate();
  </script>
</body>
</html>
