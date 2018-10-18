<?php
	$path = require $_SERVER['DOCUMENT_ROOT'] . '/ww-admin/config/config-path.php';
    require_once $path['admin'] . '/includes/session.inc.php';
	session_destroy();
	header('Location:../ww-admin/login');	
?>