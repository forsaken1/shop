<link rel="stylesheet" type="text/css" media="screen" href="style/ui.jqgrid.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="style/jquery-ui-1.8.16.custom.css"/>
<?php
	include_once('templates/template.php');
	function content() {
		if(isset($_SESSION['id']) && GetLevel($_SESSION['login']) == '1') {
				$db = new PDO('mysql:host=localhost;dbname=base', 'root', '');
				$request = $db->query('SELECT login, level, name, surname, email FROM users');
				$result = $request->fetchAll();
				$countOfGoodsOnList = 20;
				$field = array('login', 'level', 'name', 'surname', 'email');
				print '<div><h1>Панель администрирования</h1>';
				//print '<table id = "userTable"></table>';
				//$countOfList = $request->rowCount() / $countOfGoodsOnList;
				print '';
				print '<table id = "adminModule" cellspacing = 0>';
				print '<tr><td>Логин</td><td>Приоритет</td><td>Имя</td><td>Фамилия</td><td>E-mail</td><td>Операции</td></tr>';
				for($i = 0; $i < $request->rowCount(); $i++) {
					print '<tr>';
					for($j = 0; $j < 5; $j++) print '<td><div>'.$result[$i][$field[$j]].'</div></td>';
					print '<td><a href = "">Просмотреть</a><br>
						<a align = "center" href = "">Редактировать</a><br>
						<a align = "right" href = "">Удалить</a></td></tr>';
				}
				print '</table></div>';

				$db = null;
		}
		else header('Location: noauth.php');
	}
?>
<script src = "js/grid.locale-ru.js" type = "text/javascript"></script>
<script src = "js/jquery.jqGrid.min.js" type = "text/javascript"></script>
<script>
	/*function userTable() {
		jQuery("#userTable").jqGrid({        
			url:'getTable.php',
			datatype: "json",
			colNames:['Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'],
			colModel:[
				{name:'id',index:'id', width:55},
				{name:'invdate',index:'invdate', width:90},
				{name:'name',index:'name', width:100},
				{name:'amount',index:'amount', width:80, align:"right"},
				{name:'tax',index:'tax', width:80, align:"right"},		
				{name:'total',index:'total', width:80,align:"right"},		
				{name:'note',index:'note', width:150, sortable:false}		
			],
			rowNum:10,
			rowList:[10,20,30],
			pager: '#pager',
			sortname: 'id',
			viewrecords: true,
			sortorder: "desc",
			caption:"Simple data manipulation"
		});
	}
	userTable();*/
</script>
