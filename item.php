<?php 
	include_once('templates/template.php'); 
	function content() { 
		include_once('php/image_lib.php');
	    $db = GetDatabase();
		$request = $db->prepare('SELECT id, name, info, about, price, count, img1 FROM items WHERE id = ?');
		$request->execute(array($_GET['item']));
		$result = $request->fetch();
		
		print '<h1><a href = "'.$_SERVER['HTTP_REFERER'].'">Назад</a></h1>';
		print '<h1>'.$result['name'].'</h1>'; 
		print '<div id = "itemBlock"><img src = "'.$result['img1'].'"></div>';
		
		print '<div id = "imageBar">';
		$sources = array($result['img1'], 'img/2.jpg', 'img/3.jpg', 'img/4.jpg', 'img/5.jpg');
		$sources_final = array('img/1_1.jpg', 'img/2_1.jpg', 'img/3_1.jpg', 'img/4_1.jpg', 'img/5_1.jpg');
		for($i = 0; $i < 5; $i++) {
			GetSquareImage($sources[$i], $sources_final[$i], 150);
			print '<img style = "margin-left: 5px; margin-top: 5px" src = "'.$sources_final[$i].'">';
		}
		print '</div>';
		
		print '<div id = "itemBlock"><b>Количество:</b><input maxlength = 5 value = "1" id = "count_'.$result["id"].'" class = "buyCount"></input>'; ?>
		<input onclick = "buy(<?php echo $result['id'] ?>, '<?php echo $result['name'] ?>')" class = "buyCount" type = "button" value = "Купить"></input>
<?php 
		print '<b>На складе: '.$result['count'].'; </b><b>Цена: '.$result['price'].'</b></div>';
		print '<div id = "itemBlock"><div><p>'.$result['info'].'</p>';
		print '<p>'.$result['about'].'</p></div></div>';
		
		$request = $db->prepare('SELECT * FROM comments WHERE good = ?');
		$request->execute(array($result['id']));
		$comments = $request->fetchAll();
		$rowCount = $request->rowCount();
		
		print '<h1>Отзывы: '.$rowCount.' комментариев</h1>';
		
		if($rowCount > 0) {
			print '<table id = "goodTable">';
			print '<tr><td align = "center">Автор</td><td align = "center">Комментарий</td><td align = "center">Дата</td></tr>';
			for($i = 0; $i < $rowCount; $i++) {
				print '<tr><td align = "center">'.GetLoginById($comments[$i]['author']).'</td><td align = "center">'.$comments[$i]['text'].'</td><td align = "center">'.$comments[$i]['date'].'</td></tr>';
			}
			print '</table>';
		}
		
		if(isset($_SESSION['login'])) {
			print '<textarea maxlength = 500 id = "text" style = "width: 300px"></textarea><br>';
			print '<input type = "button" value = "Комментировать" onclick = "comment('.$result['id'].', '.GetIdByLogin($_SESSION['login']).');"></input>';
		}
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
	
	function comment(goodID, authorID) {
		var date = new Date().toLocaleString();
		$.ajax({
			type: 'GET', 
			url: 'ajax/comment.php',
			data: 'date='+date+'&good='+goodID+'&author='+authorID+'&text='+$('#text').val(),
			success: function(msg) {
				$.stickr({ note: msg, time: 2000 });
			}
		});	
	}
</script>