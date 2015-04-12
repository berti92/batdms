<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  if(!empty($_SESSION['notify_success']) || !empty($_SESSION['notify_warn']) || !empty($_SESSION['notify_info']) || !empty($_SESSION['notify_error'])) {
    echo('<script type="text/javascript">');
    echo('$(document).ready(function () {');
    foreach($_SESSION['notify_success'] as $suc) {
      echo('$.notify("'.$suc.'","success")');
    }
    foreach($_SESSION['notify_error'] as $er) {
      echo('$.notify("'.$er.'","error")');
    }
    foreach($_SESSION['notify_info'] as $info) {
      echo('$.notify("'.$info.'","info")');
    }
    foreach($_SESSION['notify_warn'] as $warn) {
      echo('$.notify("'.$warn.'","warn")');
    }
    echo('});');
    echo('</script>');
  }
  $_SESSION['notify_success'] = Array();
  $_SESSION['notify_error'] = Array();
  $_SESSION['notify_info'] = Array();
  $_SESSION['notify_warn'] = Array();
?>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">BatDMS</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index.php"><?php l('Navbar.overview') ?></a></li>
          <li><a href="accounts.php"><?php l('Navbar.accounts') ?></a></li>
          <li><a href="documents.php"><?php l('Navbar.documents') ?></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php l('Navbar.administration') ?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="account_types.php"><?php l('Navbar.administration.account_types') ?></a></li>
              <li><a href="document_types.php"><?php l('Navbar.administration.document_types') ?></a></li>
              <li><a href="retention_periods.php"><?php l('Navbar.administration.retention_periods') ?></a></li>
              <li class="divider"></li>
              <li><a href="users.php"><?php l('Navbar.administration.users') ?></a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search" action="search.php" method="POST">
          <div class="input-group">
            <input type="text" name="search_value" class="form-control" placeholder="<?php l('Navbar.search') ?>">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default" aria-label="Left Align">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </button>
            </span>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a target="_blank" href="https://github.com/berti92/batdms/wiki"><?php l('Navbar.help') ?></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php l('Navbar.me') ?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="settings.php"><?php l('Navbar.me.settings') ?></a></li>
              <li class="divider"></li>
              <li><a href="about.php"><?php l('Navbar.me.about_batdms') ?></a></li>
              <li class="divider"></li>
              <li><a href="logout.php"><?php l('Navbar.me.log_out') ?></a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
