<?php 
	session_start(); 
	include_once('php/lib.php');
?>
<html>
  <head>
    <title>Интернет-магазин D`S</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style/style.css'>
	<link rel = 'stylesheet' type = 'text/css' href = 'style/menu.css'>
  </head>
    
  <body>
	<table id = 'main' cellpadding = 10>
	  <tr>
		<td id = 'logoBlock'   align = 'center'><a href = 'index.php'><img src = 'design/logo.gif'></a></td>
	    <td id = 'headerBlock' align = 'center'><a id = 'header' href = 'index.php'>Интернет-магазин D`S</a></td>
		<td id = 'authBlock'><?php include_once('modules/authentification.php'); ?></td>
	  </tr>
	  <tr>
		<td valign = 'top' id = 'leftBlock'> <?php include_once('modules/menu.php'); ?></td>
		<td valign = 'top' id = 'content'>   <?php content(); ?></td>
		<td valign = 'top' id = 'rightBlock'><?php for($i = 0; $i < 3; $i++) include('modules/randomGood.php'); ?></td>
	  </tr>
	  <tr>
	    <td></td>
		<td align = 'center'>(C) 2012 D`S.....e-mail: alexey2142@mail.ru</td>
		<td></td>
	  </tr>
	</table>
	<script src = 'js/jquery.js'></script>
	<script src = 'js/jquery.stickr.min.js'></script>
  </body>
</html>