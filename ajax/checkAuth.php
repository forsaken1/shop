<?php
	include_once('C:/xampp/htdocs/mysite/php/lib.php');
	
	function checkLoginAndPass() {
		$db = GetDatabase();
		$request = $db->prepare('SELECT login, password FROM users WHERE login = ? AND password = ?');
		$request->execute(array($_GET['login'], md5($_GET['password'])));
		$result = $request->fetch();
		if(!$result['login']) { 
			echo json_encode(array('msg' => 'Неверная комбинация "логин-пароль"')); 
			return 0; 
		}
		return 1;
	}
	
	function authentification() {
		if(checkLoginAndPass()) {
			session_start();
			$_SESSION['id'] = md5($_GET['login'].rand());
			$_SESSION['login'] = $_GET['login'];
			echo json_encode(array('msg' => 'OK'));
		}
	}
	authentification();
?>