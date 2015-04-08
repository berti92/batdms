<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT * FROM relation_types WHERE id = '.$id);
    $account_type = mysql_fetch_assoc($res);
    $type_name = $account_type['type_name'];
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="relation_types.php">Relation type</a></li>
    <li class="active">Show</li>
  </ol>
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="type_name">Type name</label>
        <div><?php echo($type_name); ?></div><br/>
      </div>
    </div>
    <a href="relation_type_edit.php?id=<?php echo($id); ?>" class="btn btn-default">Edit Relation type</a>
    <a href="relation_type_delete.php?id=<?php echo($id); ?>" class="btn btn-default">Delete Relation type</a>
  <script type="text/javascript">
  </script>
</body>
</html>
