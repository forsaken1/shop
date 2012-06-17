<?php 
	include_once('php/lib.php');
	include_once('php/image_lib.php');
	
	$db = getDatabase();
	if(isset($_FILES['file'])) $typeImg = typeOfImage($_FILES['file']); else $typeImg = false;
	
	if($typeImg) {
		$dirImg = 'C:/xampp/htdocs/MySite/img/';
		$originalImgPath = $dirImg.$id.$typeImg;
		$minimalImgPath = $dirImg.$id.'_min'.$typeImg;
		copy($_FILES['file']['tmp_name'], $originalImgPath);
		crop($originalImgPath, $minimalImgPath);
		resize_image($minimalImgPath, $minimalImgPath, 100, 100);
		$pathImg = 'img/'.$id.$typeImg;
		$pathImgMin = 'img/'.$id.'_min'.$typeImg;
	}
	else {
		$originalImgPath = 'C:/xampp/htdocs/MySite/img/no_image.jpg';
		$minimalImgPath = 'C:/xampp/htdocs/MySite/img/no_image_min.jpg';
	}

	$request = $db->prepare("INSERT INTO `base`.`items` (`id`, `name`, `info`, `about`, `price`, `count`, `category`, `img`, `img_min`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$request->execute(array($id, $_POST['name'], $_POST['info'], $_POST['about'], $_POST['price'], $_POST['count'], $_POST['cat'], $pathImg, $pathImgMin));

	header('Location: http://localhost/mysite/add.php');
?>