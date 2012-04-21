<?php 
	include_once('templates/template.php'); 
	function content() { 
		if(isset($_SESSION['id'])) { 
			$db = new PDO('mysql:host=localhost;dbname=base', 'root', '');
			$request = $db->prepare('SELECT name, count, good_id FROM cards WHERE buyer = ?');
			$request->execute(array($_SESSION['login']));
			$result = $request->fetchAll();
			$db = null;
			
			print '<h1>Ваши заказы</h1>';
			print '<table id = "cardTable">';
			print '<tr><td>Название товара</td><td>Количество</td><td>Операции</td></tr>';
			for($i = 0; $i < $request->rowCount(); $i++) {
?>
				<tr><td><a href = "item.php?item='<?php echo $result[$i]['good_id'] ?>'"><?php echo $result[$i]['name'] ?></a></td><td id = "td_<?php echo $result[$i]['good_id'] ?>" onclick = "getEdit(<?php echo $result[$i]['good_id'] ?>, <?php echo $result[$i]['count'] ?>);"><?php echo $result[$i]['count'] ?></td>

				<td><input type = "button" onclick = "deleteGood(<?php echo $result[$i]['good_id'] ?>)" value = "Удалить"></input></td></tr>
<?php   	}
			print '</table>';
		}
		else header('Location: noauth.php');
	}
?>
<script>
	function getEdit(goodID, goodCount) {
		alert('sdf');
		//$('#td_' + goodID).html('<input value = '+ goodCount +'></input><input type = "button"></input>');
	}
	
	function deleteGood(goodID) {
		$.ajax({
			type: 'GET', 
			url: 'ajax/deleteGood.php',
			data: 'id='+goodID,
			success: function(msg) {
				alert(msg);
				location = 'card.php';
			}
		});	
	}
	
	function changeGoodCount(goodID, goodCount) {
		$('#td_' + goodID).html(goodCount);
		$('#button_' + goodID).val('Изменить количество').click(function() { 
			getEdit(goodID, goodCount); 
		});;
	}
</script>