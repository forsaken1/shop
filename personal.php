<?php 
	include_once('templates/template.php');
	function content() {
		if(isset($_SESSION['id'])) {
			$db = GetDatabase();
			$request = $db->prepare('SELECT name, surname, phone, city, post_index, other FROM users WHERE login = ?');
			$request->execute(array($_SESSION['login']));
			$result = $request->fetch();
	
			print '<div><h1>Ваш личный кабинет</h1>';
			print '<b>Ваши личные данные</b>';
			print '<table id = "personalTable"><tr><td>Имя</td><td>Фамилия</td><td>Телефон</td><td>Город</td><td>Индекс</td><td>Точный адрес</td></tr><tr>';
			for($i = 0; $i < $request->columnCount(); $i++) {
				print '<td>'.$result[$i].'</td>';
			}
			print '</tr></table></div>';
			
		}
		else header('Location: noauth.php');
	}
?>