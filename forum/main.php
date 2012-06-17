<?php
	include_once('templates/template.php');
	function content() {
		$db = GetDatabase();
		print '<h1><a href = "'.$_SERVER['HTTP_REFERER'].'">Назад</a></h1>';
		
		if(!isset($_GET['level']) || $_GET['level'] == 1) {
			$request = $db->query('SELECT * FROM board');
			$board = $request->fetchAll();
			$rowCount = $request->rowCount();
		
			print '<h1>Список форумов: '.$rowCount.' позиций</h1>';
			print '<table id = "boardTable">';
			print '<tr><td align = "center">Название форума</td><td align = "center">Количество тем</td><td align = "center">Количество сообщений</td></tr>';
			for($i = 0; $i < $rowCount; $i++) {
				print '<tr><td align = "center"><a href = "main.php?level=2">'.$board[$i]['name'].'</a></td><td align = "center">'.$board[$i]['topic_count'].'</td><td align = "center">'.$board[$i]['message_count'].'</td></tr>';
			}
			print '</table>';
		}
		else if($_GET['level'] == 2) {
			$request = $db->query('SELECT * FROM topic');
			$topic = $request->fetchAll();
			$rowCount = $request->rowCount();
			
			print '<h1>Список тем: '.$rowCount.' позиций</h1>';
			print '<table id = "boardTable">';
			print '<tr><td align = "center">Название темы</td><td align = "center">Автор</td><td align = "center">Количество сообщений</td><td align = "center">Просмотров</td><td align = "center">Последнее сообщение</td></tr>';
			for($i = 0; $i < $rowCount; $i++) {
				print '<tr><td align = "center"><a href = "main.php?level=3">'.$topic[$i]['name'].'</a></td><td align = "center">'.$topic[$i]['author'].'</td><td align = "center">'.$topic[$i]['answer_count'].'</td><td align = "center">'.$topic[$i]['views_count'].'</td><td align = "center">'.$topic[$i]['last_message'].'</td></tr>';
			}
			print '</table>';
		}
		else if($_GET['level'] == 3) {
			$request = $db->query('SELECT * FROM messages');
			$messages = $request->fetchAll();
			$rowCount = $request->rowCount();
			
			print '<h1>Сообщения: '.$rowCount.' позиций</h1>';
			print '<table id = "boardTable">';
			print '<tr><td align = "center">Автор</td><td align = "center">Текст сообщения</td></tr>';
			for($i = 0; $i < $rowCount; $i++) {
				print '<tr><td align = "center"><a href = "">'.$messages[$i]['author'].'</a></td><td align = "center">'.$messages[$i]['text'].'</td></tr>';
			}
			print '</table>';
		}
		else {
			header('Location: error.php');
		}
	}
?>