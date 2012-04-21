 <?php
	session_start();
	$db = new PDO('mysql:host=localhost;dbname=base', 'root', '');
	
	if(isset($_SESSION['id'])) {
		$request = $db->prepare('DELETE FROM `base`.`cards` WHERE good_id = ? AND buyer = ?');
		$request->execute(array($_GET['id'], $_SESSION['login']));
		echo 'Товар удален';
	}
	else echo 'Вы не авторизированы на сайте!';
	
	$db = null;
?>