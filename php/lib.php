<?php
	function GetLevel($sessionLogin) {
		$db = new PDO('mysql:host=localhost;dbname=base', 'root', '');
		$request = $db->prepare('SELECT level FROM users WHERE login = ?');
		$request->execute(array($sessionLogin));
		$result = $request->fetch();
		$db = null;
		return $result['level'];
	}
?>