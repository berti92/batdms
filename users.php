<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $table_id = 'account_type_list_table';
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li class="active"><?php l('BreadCrump.user'); ?></li>
  </ol>
    <div id="list_container" width="100%">
      <table id="<?php echo($table_id); ?>" cellspacing="0" width="100%">
      </table>
    </div>
  <a class="btn btn-default" href="user_create.php"><?php l('User.create_user'); ?></a>
  <script type="text/javascript">
    $('#<?php echo($table_id); ?>').dataTable(
      {
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": "_user_list.php",
        "columns": [
          {"data":"action", "title":"", "orderable": false},
          {"data":"id", "title":"ID"},
          {"data":"username", "title": "<?php l('User.username'); ?>"},
          {"data":"email", "title": "<?php l('User.email'); ?>"},
          {"data":"birthday", "title": "<?php l('User.birthday'); ?>"},
          {"data":"first_name", "title": "<?php l('User.first_name'); ?>"},
          {"data":"last_name", "title": "<?php l('User.last_name'); ?>"},
          {"data":"force_password_change", "title": "<?php l('User.force_password_change'); ?>"}
        ],
        "order": [[1, 'asc']]
        <?php if(get_current_lang() == 2) { ?>
          , "language": {"url": "/js/DataTables-1.10.5/DE.json" }
        <?php } ?>
      }
    );
  </script>
</body>
</html>
