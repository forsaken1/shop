<?php
	print "<div id = 'authModule'>";
	if(isset($_SESSION['id'])) {
		print 'Здравствуйте, '.$_SESSION['login'].'<br>';
		$db = GetDatabase();
		$request = $db->prepare('SELECT level FROM users WHERE login = ?');
		$request->execute(array($_SESSION['login']));
		$result = $request->fetch();
		if($result['level'] != '1') print '<a href = "personal.php">Войти в личный кабинет</a><br><a href = "card.php">Корзина</a><br>';
		else print '<a href = "admin.php">Войти в панель управления</a><br>';
		print '<a href = "modules/deauth.php">Выйти</a>';
	}
	else 
	print "<div class = 'auth'>Логин </div><input maxlength = 25 class = 'auth' id = 'loginA'></input><br>
		   <div class = 'auth'>Пароль</div><input maxlength = 25 type = 'password' class = 'auth' id = 'passwordA'></input><br>
		   <input class = 'auth' type = 'button' value = 'Войти' onclick = 'auth()'></input>
		   <a id = 'reg' href = 'registration.php'>Зарегистрироваться</a>
	       <div id = 'answer'></div>";
	print "</div>";
   
?>
<script>
	function auth() {
		var login = $('#loginA');
		var password = $('#passwordA');
		
		$.ajax({
			type: 'GET', 
			url: 'ajax/checkAuth.php',
			async: false,
			data: 'login='+login.val()+'&password='+password.val(),
			dataType: 'json',
			success: function(answer) {
				if(answer.msg != 'OK') {
					login.val('');
					password.val('');
					$.stickr({ note: answer.msg, time: 2000, className: 'next'});
				}
				else { 
					$.stickr({ note: 'Вход произведен', time: 1000});
				    location = 'personal.php';
				}
			},
			error: function(msg) {
				alert(msg);
			}
		});	
	}
</script>