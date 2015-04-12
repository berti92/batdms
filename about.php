<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_POST['submit'])) {
    $type_name = mysql_escape_string($_POST['type_name']);
    mysql_query('INSERT INTO account_types(type_name) VALUES("'.$type_name.'")');
    header('Location: account_types.php');
  }
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <ol class="breadcrumb">
    <li><a href="index.php"><?php l('BreadCrump.home'); ?></a></li>
    <li class="active"><?php l('BreadCrump.about_batdms'); ?></li>
  </ol>
  <div class="jumbotron">
    <div class="container">
      <h1>About BatDMS</h1>
      <p>BatDMS was written by Andreas Treubert.</p>
      <p>If you have any further questions or bugs to report please write me: <a href="mailto:simplyanamedude@gmail.com">simplyanamedude@gmail.com</a> or create an issue directly on GitHub <!-- Place this tag where you want the button to render. -->
      <a class="github-button" href="https://github.com/berti92/batdms/issues" data-icon="octicon-issue-opened" data-style="mega" data-count-api="/repos/berti92/batdms#open_issues_count" data-count-aria-label="# issues on GitHub" aria-label="Issue berti92/batdms on GitHub">Issue</a></p>
      <p>Please check our GitHub Repository <a class="github-button" href="https://github.com/berti92/batdms" data-icon="octicon-eye" data-style="mega" data-count-href="/berti92/batdms/watchers" data-count-api="/repos/berti92/batdms#subscribers_count" data-count-aria-label="# watchers on GitHub" aria-label="Watch berti92/batdms on GitHub">Watch</a> to get the newest BatDMS updates!</p>
    </div>
  </div>
  <script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
