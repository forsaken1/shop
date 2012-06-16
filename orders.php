<?php 
	include_once('templates/template.php'); 
	function content() { 
		if(isset($_SESSION['id']) && GetLevel($_SESSION['login']) == '1')  { 
			$db = GetDatabase();
			$request = $db->query('SELECT * FROM cards');
			$result = $request->fetchAll();
			
			print '<h1>Заказы</h1>';
			print '<table id = "ordersTable" cellspacing = 0>';
			print '<tr><td>Покупатель</td><td>Товар</td><td>Количество</td></tr>';
			for($i = 0; $i < $request->rowCount(); $i++) {
				print '<tr><td>'.$result[$i]['buyer'].'</td><td>'.$result[$i]['name'].'
				</td><td>'.$result[$i]['count'].'</td></tr>';
			}
			print '</table>';
		}
	}
?>