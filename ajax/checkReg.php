<?php
	$db = new PDO('mysql:host=localhost;dbname=base', 'root', '');
	if($_GET['n'] == '0') {
		if(checkLogin()) echo 'OK';
		else echo 'Аккаунт с данным логином уже зарегистрирован';
	}
	
	function checkLogin() {
		$request = $db->prepare('SELECT login FROM users WHERE login = ?');
		$request->execute(array($_GET['login']));
		$result = $request->fetch();
		if(!$result['login']) return 1;
		else return 0;
	}
	
	if($_GET['n'] == '1') {
		if(checkLogin()) {
			$request = $db->prepare("INSERT INTO `base`.`users` (`name`, `surname`, `email`, `phone`, `city`, `post_index`, `other`, `login`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$request->execute(array($_GET['name'], $_GET['surname'], $_GET['mail'], $_GET['phone'], $_GET['city'], $_GET['index'], $_GET['other'], $_GET['login'], md5($_GET['password'])));
		}
	}
	$db = null;
?>