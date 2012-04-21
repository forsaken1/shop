<?php
	$db = new PDO('mysql:host=localhost;dbname=base', 'root', '');
	
	$request = $db->query('SELECT * FROM items ORDER BY RAND() LIMIT 1');
	$result = $request->fetch();
	
	print '<a href = "item.php?item='.$result['id'].'"><div id = "randomGood">';
	print '<img src = "'.$result['img_min'].'"></img>';
	print '<p align = "center">'.$result['name'].'</p>';
	print '</div></a>';
	
	$db = null;
?>