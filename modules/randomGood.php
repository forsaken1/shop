<?php
	$db = GetDatabase();
	
	$request = $db->query('SELECT * FROM items ORDER BY RAND() LIMIT 1');
	$result = $request->fetch();
	
	if(file_exists($result['img_min'])) $fileName = $result['img_min'];
    else $fileName = 'img/no_image_min.jpg';   
	
	print '<a href = "item.php?item='.$result['id'].'"><div id = "randomGood">';
	print '<img src = "'.$fileName.'"></img>';
	print '<p align = "center">'.$result['name'].'</p>';
	print '</div></a>';
?>