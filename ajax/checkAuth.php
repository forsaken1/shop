<?php
	$db = new PDO('mysql:host=localhost;dbname=base', 'root', '');
	$login = $_GET['login'];
	$password = md5($_GET['password']);
	
	function checkLoginPass() {
		global $login, $password, $db;
		$request = $db->prepare('SELECT login, password FROM users WHERE login = ? AND password = ?');
		$request->execute(array($login, $password));
		$result = $request->fetch();
		if(!$result['login']) { echo 'Неверная комбинация "логин-пароль"'; return 0; }
		return 1;
	}
	
	function authentification() {
		global $login;
		if(checkLoginPass()) {
			session_start();
			$_SESSION['id'] = md5($login.rand());
			$_SESSION['login'] = $login;
			echo 'OK';
		}
	}
	
	authentification();
	$db = null;
?>