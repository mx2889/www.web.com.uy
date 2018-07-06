<?php


 $directory="../_media/img";
 $dirint = dir($directory);
 $path='';
 while (($archivo = $dirint->read()) !== false){
	if (preg_match("/gif/", $archivo) || preg_match("/jpg/", $archivo) || preg_match("/svg/", $archivo) || preg_match("/png/", $archivo)){
		$fileImgs = $directory."/".$archivo;
		$path.='"'.$url.$fileImgs.'",';
	}
 }
 $dirint->close();
 $path = rtrim($path,',');
 echo $path;



 ?>

