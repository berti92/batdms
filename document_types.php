<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $table_id = 'document_type_list_table';
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li class="active"><?php l('BreadCrump.document_type'); ?></li>
  </ol>
    <div id="list_container" width="100%">
      <table id="<?php echo($table_id); ?>" cellspacing="0" width="100%">
      </table>
    </div>
  <a class="btn btn-default" href="document_type_create.php"><?php l('DocumentType.create_document_type'); ?></a>
  <script type="text/javascript">
    $('#<?php echo($table_id); ?>').dataTable(
      {
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": "_document_type_list.php",
        "columns": [
          {"data":"action", "title":"", "orderable": false},
          {"data":"id", "title":"ID"},
          {"data":"type_name", "title": "<?php l('DocumentType.type_name'); ?>"},
          {"data":"period_name", "title": "<?php l('DocumentType.default_retention_period_id'); ?>"},
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
