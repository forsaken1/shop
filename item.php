<?php 
	include_once('templates/template.php'); 
	function content() { 
	    $db = GetDatabase();
		$request = $db->prepare('SELECT id, name, info, about, price, count, img FROM items WHERE id = ?');
		$request->execute(array($_GET['item']));
		$result = $request->fetch();
		
		print '<h1><a href = "'.$_SERVER['HTTP_REFERER'].'">Назад</a></h1>';
		print '<h1>'.$result['name'].'</h1>'; 
		print '<div id = "itemBlock"><img src = "'.$result['img'].'"></div>';
		print '<div id = "itemBlock"><b>Количество:</b><input maxlength = 5 value = "1" id = "count_'.$result["id"].'" class = "buyCount"></input>'; ?>
		<input onclick = "buy(<?php echo $result['id'] ?>, '<?php echo $result['name'] ?>')" class = "buyCount" type = "button" value = "Купить"></input>
<?php 
		print '<b>На складе: '.$result['count'].'; </b><b>Цена: '.$result['price'].'</b></div>';
		print '<div id = "itemBlock"><div><p>'.$result['info'].'</p>';
		print '<p>'.$result['about'].'</p></div></div>';
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