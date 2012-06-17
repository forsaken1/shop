<?php
	function typeOfImage($file) {
        $im = @imagecreatefromjpeg($file);
        if ($im !== false) { return '.jpg'; }
        $im = @imagecreatefromgif($file);
        if ($im !== false) { return '.gif'; }
        $im = @imagecreatefrompng($file);
        if ($im !== false) { return '.png'; }
        return false;
	}
	
	function GetSquareImage($input, $output, $width) {
		crop($input, $output);
		resize_image($output, $output, $width);
	}
	
	function resize_image($file, $out, $w = 100, $q = 90) {
		if(empty($file) || empty($out)) return false;
		$src = imagecreatefromjpeg($file);
		$w_src = imagesx($src);
		$h_src = imagesy($src);
		$ratio = $w_src/$w;
		$w_dest = round($w_src/$ratio);
		$h_dest = round($h_src/$ratio);
		$dest = imagecreatetruecolor($w_dest, $h_dest);
		imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
		imagejpeg($dest, $out, $q);
		imagedestroy($dest);
		imagedestroy($src);
		return true;
	}
	
	function crop($file_input, $file_output, $crop = 'square',$percent = false) {
		list($w_i, $h_i, $type) = getimagesize($file_input);
		if (!$w_i || !$h_i) {
			echo 'Невозможно получить длину и ширину изображения';
			return;
		}
        $types = array('','gif','jpeg','png');
        $ext = $types[$type];
        if ($ext) {
    	    $func = 'imagecreatefrom'.$ext;
    	    $img = $func($file_input);
        } else {
    	    echo 'Некорректный формат файла';
			return;
        }
		$x_o = 0;
		$y_o = 0;
		if ($crop == 'square') {
			$min = $w_i;
			if ($w_i > $h_i) $min = $h_i;
			$w_o = $h_o = $min;
		} else {
			list($x_o, $y_o, $w_o, $h_o) = $crop;
			if ($percent) {
				$w_o *= $w_i / 100;
				$h_o *= $h_i / 100;
				$x_o *= $w_i / 100;
				$y_o *= $h_i / 100;
			}
    	    if ($w_o < 0) $w_o += $w_i;
	        $w_o -= $x_o;
			if ($h_o < 0) $h_o += $h_i;
			$h_o -= $y_o;
		}
		$img_o = imagecreatetruecolor($w_o, $h_o);
		imagecopy($img_o, $img, 0, 0, $x_o, $y_o, $w_o, $h_o);
		if ($type == 2) {
			return imagejpeg($img_o,$file_output,100);
		} else {
			$func = 'image'.$ext;
			return $func($img_o, $file_output);
		}
	}
?>