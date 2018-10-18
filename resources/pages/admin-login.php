<?php
$path = require $_SERVER['DOCUMENT_ROOT'] . '/ww-admin/config/config-path.php';
include_once $path['root'] . '/ww-admin/includes/session.inc.php';
include_once $path['root'] . '/ww-admin/includes/connect.inc.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>WhenWing | Admin Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="theme-color" content="#4885ed" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/logo.png">
	<?php include $path['admin'] . '/includes/style-wb-admin.inc.php';?>
</head>

<body class="hold-transition lockscreen">


<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (md5($_POST['admin-password']) == '346374febbceea9e115363fee6f88de7') {
        $_SESSION['user_id'] = 'Admin';
    }else {
      echo '<div class="alert alert-danger alert-dismissible center">Incorrect Password</div>';
    }
}
if (isset($_SESSION['user_id'])) {
    header('Location: /ww-admin/');
}

?>
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Admin </b>WhenWing</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Administrator</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">


    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="/ww-admin/login" method="post">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" name="admin-password">

        <div class="input-group-btn">
          <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>

</div>
<!-- /.center -->


	<?php include $path['admin'] . '/includes/script-wb-admin.inc.php';?>
</body>

</html>