<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
    $type_name = mysql_escape_string($_POST['type_name']);
    mysql_query('INSERT INTO relation_types(type_name) VALUES("'.$type_name.'")');
    header('Location: relation_types.php');
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
    <li class="active">New</li>
  </ol>
  <form action="relation_type_create.php" method="POST">
    <div class="panel panel-default">
      <div class="panel-body">
        <label for="type_name">Type name</label>
        <input type="text" name="type_name" class="form-control" placeholder="Type name" aria-describedby="sizing-addon2"><br/>
        <input type="submit" name="submit" class="btn btn-default" value="Save"/>
        <a href="relation_types.php" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </form>
  <script type="text/javascript">
  </script>
</body>
</html>
