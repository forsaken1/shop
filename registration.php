<?php 
	include_once('templates/template.php'); 
	function content() { 
	  print "<div id = 'registrationModule'>
		<h1>Регистрация нового пользователя</h1>
		<h2>Ваши персональные данные</h2>
		<b>Имя</b><br>     <input maxlength = 25 id = 'name'><br>
		<b>Фамилия</b><br> <input maxlength = 25 id = 'surname'></input><br>
		<b>E-mail</b><br>  <input maxlength = 50 id = 'mail'></input><br>
		<b>Телефон</b><br> <input maxlength = 15 id = 'phone'></input><br>
		<h2>Ваш адрес</h2>
		<b>Город</b><br>   <input maxlength = 50 id = 'city'></input><br>
		<b>Индекс</b><br>  <input maxlength = 6  id = 'index'></input><br>
		<b>Улица, дом, квартира</b><br><input maxlength = 100 id = 'other'></input><br>
		<h2>Ваш аккаунт на сайте</h2>
		<b>Логин *</b><br>             <input maxlength = 25 id = 'login' onblur = 'checkLogin()'></input><b id = 'checkLogin'></b><br>
		<b>Пароль *</b><br>            <input maxlength = 25 type = 'password' id = 'password' onblur = 'checkPassword()'></input><b id = 'passCheck'></b><br>
		<b>Подтвердите пароль *</b><br><input maxlength = 25 type = 'password' id = 'passwordConf' onblur = 'checkPasswordConf()'><b id = 'passConfCheck'></b></input><br>
		<input type = 'button' onclick = 'checkAll()' value = 'Зарегистрироваться'></input><br>
		<b>* - обязательно заполнить для регистрации на сайте</b>
	  </div>";
	} 
?>
<script>			
	function checkPassword() {
		var pass = $('#password').val();
		var check = $('#passCheck');
		if(pass.length < 6) { check.text('Пароль не менее 6-ти символов!'); return 0; }
		else check.text('ОК'); return 1; 
	}
	
	function checkPasswordConf() {
		var pass = $('#password').val();
		var passConf = $('#passwordConf').val();
		var check = $('#passConfCheck');
		if(checkPassword() && pass == passConf) { check.text('ОК'); return 1; }
		else check.text('Пароли не совпадают!'); return 0;
	}
	
	function checkLogin() {
		var login = $('#login').val();
		var requestForm = $('#checkLogin');
		if(login.length == 0) { requestForm.text('Обязательно для заполнения'); return 0; }
		var check = 0;
		$.ajax({
			type: 'GET', 
			async: false,
			url: 'ajax/checkReg.php',
			data: 'n=0&login='+login,
			success: function(msg) {
				requestForm.text(msg);
				check = 1;
			}
		});	
		return check;
	}
	
	function checkAll() {
		if(checkLogin() && checkPassword() && checkPasswordConf()) registration();
	}
	
	function registration() {		
		var field = [$('#name').val(),  $('#surname').val(), $('#mail').val(), 
					 $('#phone').val(), $('#city').val(),    $('#index').val(), 
					 $('#other').val(), $('#login').val(),   $('#password').val(),
				     $('#passwordConf').val()];
		$.ajax({
			type: 'GET', 
			url: 'ajax/checkReg.php',
			data: 'n=1&name='+field[0]+'&surname='+field[1]+'&mail='+field[2]+'&phone='+field[3]+'&city='+field[4]+'&index='+field[5]+'&other='+field[6]+'&login='+field[7]+'&password='+field[8],
			complete: function() {
				location = 'http://localhost/mysite/index.php';
			}
		});	
	}
</script>