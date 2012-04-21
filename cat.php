<?php 
	include_once('templates/template.php'); 
	function content() { 
		if(isset($_SESSION['id']) && GetLevel($_SESSION['login']) == '1')  { ?>
				<h1>Меню добавления категорий</h1>
				<form enctype = 'multipart/form-data' action = 'ajax/addCat.php' method = 'POST'>
				  <b>Название категории *</b><br><input maxlength = 200 class = 'goodAdd' required name = 'name' id = 'name'></input><br>
				  <b>Родительская категория</b><br>
				  
				  <b>Описание</b><br><textarea maxlength = 500 class = 'goodAdd' name = 'info'></textarea><br>
				  <b>Изображение</b><br><input class = 'goodAdd' name = 'file' accept = 'image/*' type = 'file'></input><br>
				  <input class = 'goodAdd' type = 'submit' value = 'Добавить' id = 'sub'></input>
			    </form>
	<?php
		}
		else header('Location: noauth.php');
	}
?>