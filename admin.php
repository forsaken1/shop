<link rel="stylesheet" type="text/css" media="screen" href="style/ui.jqgrid.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="style/jquery-ui-1.8.16.custom.css"/>
<?php
	include_once('templates/template.php');
	function content() {
		if(isset($_SESSION['id']) && GetLevel($_SESSION['login']) == '1') { 
			print '<div><h1>Панель администрирования</h1>';
			print '<table id = "userTable"  class="scroll"></table>';
			print '<div id = "pager" class="scroll" ></div>';
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
    jQuery(document).ready(function(){
        jQuery("#userTable").jqGrid({
            url:'ajax/getUserList.php',
            datatype: 'json',
            mtype: 'POST',
            colNames:['#', 'Фамилия', 'Имя', 'Отчество'],
            colModel :[
                {name:'id', index:'id', width:30}
                ,{name:'surname', index:'surname', width:80, align:'right'}
                ,{name:'fname', index:'fname', width:90}
                ,{name:'lname', index:'lname', width:80, align:'right'}
                ],
            pager: jQuery('#pager'),
            rowNum:5,
            rowList:[5,10,30],
            sortname: 'id',
            sortorder: "asc",
            viewrecords: true,
            imgpath: 'themes/basic/images',
            caption: 'Данные пользователей'
        });
    });
	/*jQuery("#userTable").jqGrid({
		datatype: "local",
		height: 250,
		colNames:['Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'],
		colModel:[
			{name:'id',index:'id', width:60, sorttype:"int"},
			{name:'invdate',index:'invdate', width:90, sorttype:"date"},
			{name:'name',index:'name', width:100},
			{name:'amount',index:'amount', width:80, align:"right",sorttype:"float"},
			{name:'tax',index:'tax', width:80, align:"right",sorttype:"float"},		
			{name:'total',index:'total', width:80,align:"right",sorttype:"float"},		
			{name:'note',index:'note', width:150, sortable:false}		
		],
		multiselect: true,
		caption: "Manipulating Array Data"
	});
	var mydata = [
		{id:"1",invdate:"2007-10-01",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"2",invdate:"2007-10-02",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"3",invdate:"2007-09-01",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"},
		{id:"4",invdate:"2007-10-04",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"5",invdate:"2007-10-05",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"6",invdate:"2007-09-06",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"},
		{id:"7",invdate:"2007-10-04",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"8",invdate:"2007-10-03",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"9",invdate:"2007-09-01",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"}
		];
	for(var i = 0;i <= mydata.length; i++)
		jQuery("#userTable").jqGrid('addRowData', i+1, mydata[i]);*/
</script>
