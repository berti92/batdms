<?php
  include_once 'includes/database.php';
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Relation Type</li>
  </ol>
    <div id="list_container">&nbsp;</div>
  <a class="btn btn-default" href="relation_type_create.php">Create new Relation type</a>
  <script type="text/javascript">
    get_list('_relation_type_list.php', 1, 'list_container','relation_type_show.php?id=##ID##');
  </script>
</body>
</html>
