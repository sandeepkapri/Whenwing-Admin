<?php 
      $path = require $_SERVER['DOCUMENT_ROOT'].'/ww-admin/config/config-path.php';
      $vertspace = 5;
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="theme-color" content="#4885ed" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Whenwing - Page not found</title>
	<link rel="icon" href="images/logo.png">
	<?php include $path['admin'].'/includes/style-wb-admin.inc.php';?>
</head>

<body>
	<?php include $path['admin'].'/resources/templates/404-tmpl.php';?>
</body>

</html>