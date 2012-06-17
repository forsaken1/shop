<?php 
	session_start(); 
	include_once('C:/xampp/htdocs/mysite/php/lib.php');
?>
<html>
  <head>
    <title>Форум D`S</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'style/style.css'>
  </head>
    
  <body>
	<table id = 'main' cellpadding = 10>
	  <tr>
		<td id = 'logoBlock'   align = 'center'><a href = 'http://localhost/mysite'><img src = 'design/logo.jpg'></a></td>
	    <td id = 'headerBlock' align = 'center'><a id = 'header' href = 'main.php'>Форум D`S</a></td>
		<td id = 'authBlock'><?php include_once('C:/xampp/htdocs/mysite/modules/authentification.php'); ?></td>
	  </tr>
	</table>
	  <?php content(); ?>
	  <!--<tr>
	    <td></td>
		<td align = 'center'>(C) 2012 ...Forum D`S...e-mail: alexey2142@mail.ru</td>
		<td></td>
	  </tr>
	</table>-->
	<script src = 'C:/xampp/htdocs/mysite/js/jquery.js'></script>
	<script src = 'C:/xampp/htdocs/mysite/js/jquery.stickr.min.js'></script>
  </body>
</html>