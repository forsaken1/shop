<?php
	print 
	"<div id = 'mainMenu'>
	  <ul>
		<li><a href = 'index.php'>Главная страница</a></li>
		<li><a href = 'goods.php?category=0'>Каталог товаров</a>
		  <ul>";
	print "<li><a href = 'goods.php?category=1'>Ударные установки</a></li>
	    <li><a href = 'goods.php?category=2'>Барабаны</a></li>
		<li><a href = 'goods.php?category=3'>Палочки</a></li>
		<li><a href = 'goods.php?category=4'>Педали</a></li>
		<li><a href = 'goods.php?category=5'>Тарелки</a></li>
		<li><a href = 'goods.php?category=6'>Пластики</a></li>
		<li><a href = 'goods.php?category=7'>Стулья</a></li>
		<li><a href = 'goods.php?category=8'>Стойки и крепежи</a></li>
		<li><a href = 'goods.php?category=9'>Чехлы</a></li>
		<li><a href = 'goods.php?category=10'>Запчасти</a></li>
		<li><a href = 'goods.php?category=11'>Струны</a></li>
		<li><a href = 'goods.php?category=12'>Тренировочные пэды</a></li>";
	print 
		 "</ul>
	    </li>";
		
	if(isset($_SESSION['id']) && GetLevel($_SESSION['login']) == '1') {
		print '<li><a href = "add.php">Меню добавления товаров</a></li>';
		print '<li><a href = "cat.php">Меню категорий товаров</a></li>';
		print '<li><a href = "orders.php">Меню заказов</a></li>';
	}
		
	print
		"<li><a href = 'about.php'>О сайте</a></li>
	  </ul>
	</div>";
?>