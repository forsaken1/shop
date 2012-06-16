<link rel="stylesheet" type="text/css" media="screen" href="style/ui.jqgrid.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="style/jquery-ui-1.8.16.custom.css"/>
<?php
	include_once('templates/template.php');
	function content() {
		if(isset($_SESSION['id']) && GetLevel($_SESSION['login']) == '1') { 
			print '<div><h1>Панель администрирования</h1>';
?>
			<table id = "userTable"></table> <?php
				/*$db = GetDatabase();
				$request = $db->query('SELECT login, level, name, surname, email FROM users');
				$result = $request->fetchAll();
				$field = array('login', 'level', 'name', 'surname', 'email');
				
				print '<div><h1>Панель администрирования</h1>';
				print '<table id = "userTable" cellspacing = 0>';
				print '<tr><td>Логин</td><td>Приоритет</td><td>Имя</td><td>Фамилия</td><td>E-mail</td><td>Операции</td></tr>';
				for($i = 0; $i < $request->rowCount(); $i++) {
					print '<tr>';
					for($j = 0; $j < 5; $j++) print '<td><div>'.$result[$i][$field[$j]].'</div></td>';
					print '<td><a href = "">Просмотреть</a><br>
						<a align = "center" href = "">Редактировать</a><br>
						<a align = "right" href = "">Удалить</a></td></tr>';
				}
				print '</table></div>';*/
		}
		else header('Location: noauth.php');
	}
?>
<script src = "js/grid.locale-ru.js" type = "text/javascript"></script>
<script src = "js/jquery.jqGrid.min.js" type = "text/javascript"></script>
<script>
	jQuery("#userTable").jqGrid({        
		url:'getUserList.php',
		datatype: "json",
		colNames:['Логин','Приоритет', 'Имя', 'Фамилия','E-mail','Операции'],
		colModel:[
			{name:'login',index:'id', width:100},
			{name:'priority',index:'invdate', width:100},
			{name:'name',index:'name', width:100},
			{name:'surname',index:'amount', width:100, align:"right"},
			{name:'email',index:'tax', width:100, align:"right"},		
			{name:'operation',index:'total', width:100,align:"right"}	
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: '#pager',
		sortname: 'id',
		viewrecords: true,
		sortorder: "desc",
		caption: "Зарегистрированные пользователи сайта"
	});
</script>
