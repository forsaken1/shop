<?php
	session_start();
	$_SESSION['id'] = null; 
	$_SESSION['login'] = null; 
	session_destroy();
	header('Location: http://localhost/mysite/index.php');
?>