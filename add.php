<?php 
	include_once('templates/template.php'); 
	function content() { 
		if(isset($_SESSION['id']) && GetLevel($_SESSION['login']) == '1') { ?>
			  <div>
				<h1>Меню добавления товаров</h1>
				<form enctype = 'multipart/form-data' action = 'ajax/addGood.php' method = 'POST'>
				  <b>Название товара *</b><br><input maxlength = 200 class = 'goodAdd' required name = 'name' id = 'name'></input><br>
				  <b>Категория</b><br>
				  <select class = 'goodAdd' name = 'cat'>
					<option value = '1'>Ударные установки</option>
					<option value = '2'>Барабаны</option>
					<option value = '3'>Палочки</option>
					<option value = '4'>Педали</option>
					<option value = '5'>Тарелки</option>
					<option value = '6'>Пластики</option>
					<option value = '7'>Стулья</option>
					<option value = '8'>Стойки и крепежи</option>
					<option value = '9'>Чехлы</option>
					<option value = '10'>Запчасти</option>
					<option value = '11'>Струны</option>
					<option value = '12'>Тренировочные пэды</option>
				  </select><br>
				  <b>Краткое описание</b><br><textarea maxlength = 500 class = 'goodAdd' name = 'info'></textarea><br>
				  <b>Подробное описание</b><br><textarea maxlength = 3000 class = 'goodAdd' name = 'about'></textarea><br>
				  <b>Цена *</b><br><input maxlength = 10  class = 'goodAdd' required name = 'price' id = 'price'></input><br>
				  <b>Количество *</b><br><input min = 0 maxlength = 3  class = 'goodAdd' required name = 'count' id = 'count' value = '1'></input><br>
				  <b>Изображение</b><br><input class = 'goodAdd' name = 'file' accept = 'image/*' type = 'file'></input><br>
				  <input class = 'goodAdd' type = 'submit' value = 'Добавить' id = 'sub'></input>
			    </form>
				<div id = 'status'></div>
			  </div>
	  <?php 
		}
		else header('Location: noauth.php');
	}
?>
<script>
	function checkFields() {
		var status = $('#status');
		if($('#name').val().length == 0) { status.val('Поле "Название" не заполнено'); return 0; }
		else if($('#price').val().length == 0) { status.val('Поле "Цена" не заполнено'); return 0; }
			 else if($('#count').val().length == 0) { status.val('Поле "Количество" не заполнено'); return 0; } 
	    return 1;
	}
</script>