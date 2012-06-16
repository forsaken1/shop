<?php
	function GetLevel($sessionLogin) {
		$db = GetDatabase();
		$request = $db->prepare('SELECT level FROM users WHERE login = ?');
		$request->execute(array($sessionLogin));
		$result = $request->fetch();
		return $result['level'];
	}
	
	function GetDatabase() {
		return new PDO('mysql:host=localhost;dbname=base', 'root', '');
	}
?>