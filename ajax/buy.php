<?php
	session_start();
	include_once('php/lib.php');
	$db = getDatabase();
	
	if(isset($_SESSION['id'])) {
		$request = $db->prepare('INSERT INTO `base`.`cards` (buyer, good_id, name, count) VALUES (?, ?, ?, ?)');
		$request->execute(array($_SESSION['login'], $_GET['id'], $_GET['name'], $_GET['count']));
		echo 'Вы приобрели '.$_GET['count'].' экземпляр(-а, -ов) товара '.$_GET['name'];
	}
	else echo 'Вы не авторизированы на сайте!';
	
	$db = null;
?>