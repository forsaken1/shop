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
	
	function GetLoginById($login) {
		$db = GetDatabase();
		$request = $db->prepare('SELECT login FROM users WHERE id = ?');
		$request->execute(array($login));
		$login = $request->fetch();
		return $login['login'];
	}
		
	function GetIdByLogin($id) {
		$db = GetDatabase();
		$request = $db->prepare('SELECT id FROM users WHERE login = ?');
		$request->execute(array($id));
		$id = $request->fetch();
		return $id['id'];
	}
?>