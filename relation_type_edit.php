<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_GET['id'])) {
    $id = mysql_escape_string($_GET['id']);
    $res = mysql_query('SELECT * FROM relation_types WHERE id = '.$id);
    $account_type = mysql_fetch_assoc($res);
    $type_name = $account_type['type_name'];
  }
  if(!empty($_POST['submit']) && !empty($_POST['id'])) {
    $id = mysql_escape_string($_POST['id']);
    $type_name = mysql_escape_string($_POST['type_name']);
    mysql_query('UPDATE relation_types SET type_name = "'.$type_name.'" WHERE id = '.$id);
    header('Location: relation_type_show.php?id='.$id);
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
    <li class="active">Edit</li>
  </ol>
  <form action="relation_type_edit.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <input type="hidden" name="id" value="<?php echo($id); ?>"
        <label for="type_name">Type name</label>
        <input type="text" name="type_name" class="form-control" value="<?php echo($type_name); ?>" aria-describedby="sizing-addon2"><br/>
        <input type="submit" name="submit" class="btn btn-default" value="Save"/>
        <a href="relation_type_show.php?id=<?php echo($id); ?>" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
  </script>
</body>
</html>
