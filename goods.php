<?php 
	include_once('templates/template.php'); 
	function content() { 
		$db = new PDO('mysql:host=localhost;dbname=base', 'root', '');
		
		if(!isset($_GET['n'])) $pageNumber = 0;
		else $pageNumber = $_GET['n'];
		$rowLimit = 20;
		
		if($_GET['category'] == 0) {
			$request = $db->query('SELECT id, name, info, price, count, img_min FROM items LIMIT '.($pageNumber * $rowLimit).', '.$rowLimit);
			//$request = $db->prepare('SELECT id, name, info, price, count, img_min FROM items LIMIT ?, ?');
			//$request->execute(array($pageNumber * $rowLimit, $rowLimit)); //!!!!!!!!!!!
		}
		else {
			$request = $db->prepare('SELECT id, name, info, price, count, img_min FROM items WHERE category = ? LIMIT ?, ?');
			$request->execute(array($_GET['category'], $pageNumber * $rowLimit, $rowLimit));
		}
		$result = $request->fetchAll();
		
		$request = $db->query('SELECT * FROM items');
		$rowCount = $request->rowCount();
		
		$pagesCount = ceil($rowCount / $rowLimit);
		
		if($pageNumber == ($pagesCount - 1)) $rowLimit = $rowCount - ($pagesCount - 1) * $rowLimit;
		
		print '<h1>Все товары</h1>'; 
		for($i = 0; $i < $pagesCount; $i++)
			if($pageNumber != $i)
				print '<a class = "pageNumber" href = "goods.php?category='.$_GET['category'].'&n='.$i.'">'.($i + 1).'</a>';
			else 
				print '<span class = "pageNumber">'.($i + 1).'</span>';
				
		print '<div><table id = "goodTable" cellspacing = 0><tr><td align = "center">Изображение</td><td align = "center">Наименование</td><td align = "center">Цена, руб.</td><td align = "center">Наличие</td><td align = "center">Купить</td></tr>';
		for($i = 0; $i < $rowLimit; $i++) {
			print '<tr class = "item_string">
			<td align = "center"><a href = "item.php?item='.$result[$i]['id'].'"><img src = "'.$result[$i]['img_min'].'" alt = "img"></a></td>
			<td align = "center"><a href = "item.php?item='.$result[$i]['id'].'">'.$result[$i]['name'].'</a><br><div>'.$result[$i]['info'].'</div></td>
			<td align = "center"><div>'.$result[$i]['price'].'</div></td>
			<td align = "center"><div>'.($result[$i]['count'] > 0 ? 'Есть' : 'Нет' ).'</div></td>
			<td align = "center">Количество:<br><input maxlength = 5 value = "1" id = "count_'.$result[$i]['id'].'" class = "buyCount"></input><br>';
?>
			<input onclick = "buy(<?= $result[$i]['id'] ?>, '<?= $result[$i]['name'] ?>')" class = "buyCount" type = "button" value = "Купить"></a></td>
<?php
			print '</tr>';
		}
		print '</table></div>';
	}
?>
<script>
	function buy(goodID, goodName) {
		$.ajax({
			type: 'GET', 
			url: 'ajax/buy.php',
			data: 'id='+goodID+'&name='+goodName+'&count='+$('#count_'+goodID).val(),
			success: function(msg) {
				alert(msg);
			}
		});	
	}
</script>