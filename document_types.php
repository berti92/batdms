<?php
  include_once 'includes/database.php';
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
    <div id="list_container">&nbsp;</div>
  <a class="btn btn-default" href="document_type_create.php"><?php l('DocumentType.create_document_type'); ?></a>
  <script type="text/javascript">
    get_list('_document_type_list.php', 1, 'list_container','document_type_show.php?id=##ID##');
  </script>
</body>
</html>
