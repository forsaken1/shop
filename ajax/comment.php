<?php
	include_once('C:/xampp/htdocs/mysite/php/lib.php');
	
	$db = GetDatabase();
	
	$request = $db->prepare('INSERT INTO comments (good, author, text, date) VALUES (?, ?, ?, ?)');
	$request->execute(array($_GET['good'], $_GET['author'], $_GET['text'], $_GET['date']));
	echo 'Комментарий добавлен';
?>