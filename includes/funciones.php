<?php

$errores = '';


// CONEXIÓN
require ('config.php');
//session_start();


// VARIABLES
$p      = isset($_GET['p'])         ? $_GET['p'] : 'inicio' ;
$pagina = isset($_GET['pagina'])    ? $_GET['pagina'] : null ;
$buscar = isset($_GET['buscar'])    ? $_GET['buscar'] : null ;
$por    = isset($_GET['por'])       ? $_GET['por'] : null ;
$id     = isset($_GET['id'])        ? (int)$_GET['id'] : null ;
$tipo   = isset($_SESSION['tipo'])  ? $_SESSION['tipo'] : null ;
$pag    = isset($_GET['pag'])       ? (int)$_GET['pag'] : 1 ;

$nombre_web = 'Web';
$correo = 'info@maximilianolopez.uy';
$theme_color = '#000000';

/*
// DETECTAR LENGUAJE
if(!isset($_GET['lg'])){
	
	function detectlanguage() {
			$langcode = explode(";", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
			$langcode = explode(",", $langcode['0']);
			$langcode = explode("-", $langcode['0']);
			return $langcode['0'];
			}
		
		$language = detectlanguage();
		/*
		if ( $language == "es" ){
			header("location: es/");
				 
		}else{
			header("location: es/");
		}
		switch($language) {
			case 'es':
			header("location: es/");
			break;

			case 'en':
			header("location: en/");
			break;

			case 'fr':
			header("location: fr/");
			break;

			default:
			header("location: es/");
		}
	
	
	die();
}
?>
*/

// RUTAS
/*
$css = 'css/';
$fonts = 'fonts/';
$img = 'img/';
$inc = 'includes/';
$media = 'media/';
  $media_doc = 'media/doc/';
  $media_img = 'media/img/';
  $media_audio = 'media/audio/';
  $media_video = 'media/video/';
$plugins = 'plugins/';
$js = 'js/';
*/

define("CSS","css/"); 
define("FONTS","fonts/"); 
define("IMG","img/"); 
define("INCLUDES","includes/"); 
define("MEDIA","media/"); 
define("PLUGINS","plugins/"); 
define("JS","js/"); 




//PAGINAS
// Declaro array sub paginas (paginas usuario)

//$paginas = Array();

// Select paginas
/*
$rows = $conexion->prepare("SELECT * FROM paginas");
$rows->execute();
$rows = $rows->fetchAll();

//print_r($row_pagina);
// Recorro resultados
/*
foreach ($rows as $row) { 
  $id_pagina      = $row['ID'];
  $nombre_pagina  = $row['nombre'];

  $paginas[$nombre_pagina] = $id_pagina; 

}*

foreach ($rows as $row_pagina) {
  $row_pagina['nombre'];
}

*/

$paginas = 'inicio|articulo|tabs|tablas|parallax|acordeon|contacto';



/*
//LIMPIAR STRING
function limpiarString($texto){
  $textoLimpio = preg_replace('([^A-Za-z0-9])', ' ', $texto);	     					
  return $textoLimpio;
}



// MINY HTML
function html($buf){
	return preg_replace(
		array('//Uis',"/[[:blank:]]+/"),array('',' '),
		str_replace(array("\n","\r","\t"),'',$buf)
	);
}


// UTF8 
function utf8($txt){
	if(mb_detect_encoding($txt, 'UTF-8', true)){
		return $txt;
	}else{
		return utf8_encode($txt);
	}
}



// IP
function get_real_ip()
    {
 
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            return $_SERVER["REMOTE_ADDR"];
        }
 
    }
    


// REEMPLAZAR ACENTOS
function Tit($var){ //replace for accents catalan spanish and more
		$a = array(' ','À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ','|','І',',','°','’');    
		 
		$b = array('-','A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o','/','/','','',''); 
	$var = rtrim($var);	
		
    $var= str_replace($a, $b, $var);
    return strtolower($var); 
	
}	



// SUBIR IMAGENES
function subeFoto($campo_name,$campo_tmp,$nombre,$num,$ancho_gd,$ancho_md,$ancho_ch,$ruta) {
	
	if ($campo_name != ""){		 
	
		$ext = strtolower(substr($campo_name, -4));
		
		$foto_temp = $nombre.$num.$ext;

		$foto_nombre = $nombre.$num.'.jpg';
		$md = 'md_'.$foto_nombre;
		$ch = 'ch_'.$foto_nombre;
	
		if (!move_uploaded_file($campo_tmp,$ruta.$foto_temp)){
		
			echo '<div class="unsuccess"><p>Ocurrió algún error al subir la foto '.$campo_name.'. no pudo guardarse.</p></div>';	
		}
		else{
			$thumb=new thumbnail($ruta.$foto_temp);
			
			$thumb->jpeg_quality(93);
			$thumb->size_width($ancho_gd);
			$thumb->save($ruta.$foto_nombre);	
			
			if ($ancho_md!=""){
			$thumb->jpeg_quality(93);
			$thumb->size_width($ancho_md);
			$thumb->save($ruta.$md);
			}
			
			if ($ancho_ch!=""){
				$thumb->jpeg_quality(93);
				$thumb->size_width($ancho_ch);
				$thumb->save($ruta.$ch);
			}
						
			//por ultimo elimino la foto que subi
			if ($ext!='.jpg' && file_exists($ruta.$foto_temp)){
				
				@unlink($ruta.$foto_temp);
			}
			
			return $foto_nombre;                
		}
	}
}

function subeFotoPagina($campo_name,$campo_tmp,$id,$ruta) {
  
  if ($campo_name != ""){    
  
    //$ext = strtolower(substr($campo_name, -4));
    
    $ext = pathinfo($campo_name,PATHINFO_EXTENSION);
     
    $foto_temp = $id.'.'.$ext;
    $foto_nombre = $id.'.jpg';
    $the_image = $ruta.$id.'.jpg';


    $gr = 'gr_'.$foto_nombre;
    $md = 'md_'.$foto_nombre;
    $ch = 'ch_'.$foto_nombre;
  
    if (!move_uploaded_file($campo_tmp,$ruta.$foto_temp)){
    
      echo '<div class="unsuccess"><p>Ocurri&oacute; algún error al subir la foto '.$campo_name.'. no pudo guardarse.</p></div>'; 
      
      return 'error';
    }
    else{
      
      if($ext!='jpg'){
        if($ext=='png'){
          $clon = imagecreatefrompng($ruta.$foto_temp);
          //echo 'png';
        }elseif($ext=='jpeg'){
          //echo 'jpeg';
          $clon = imagecreatefromjpeg($ruta.$foto_temp);
        }
        imagejpeg($clon, $the_image, 100);
        imagedestroy($clon);
      }else{
        //echo 'jpg';
        $the_image = $ruta.$foto_temp;
      }     
      
      $thumb = new thumbnail($the_image);
    
      $size = GetImageSize($the_image);

          
      if ($size[0] > 1900){
          $thumb->jpeg_quality(93);
          $thumb->size_width(1900);
          $thumb->save($ruta.$foto_nombre); 
      }       
      
      $thumb->jpeg_quality(93);
      $thumb->size_width(450);
      $thumb->save($ruta.$md);  

      $thumb->jpeg_quality(93);
      $thumb->size_width(180);
      $thumb->save($ruta.$ch);  
            
      //por ultimo elimino la foto que subi
      if ($ext!='jpg' && file_exists($ruta.$foto_temp)){
        
        @unlink($ruta.$foto_temp);
      }
      
      return $foto_nombre;                
    }
  }
}


// SUBIR ARCHIVO
function subeArchivo($campo_archivo, $ruta, $size, $permitidos) {
	    // Función para subir archivos mediante PHP
	    // USO: SubirArchivos($campo_archivo, $ruta, $size, $permitidos);
	    // @param $campo_archivo = $_FILES['nombre_campo'];
	    // @param $ruta = "ruta_de_subida_del_archivo";
	    // @param $size = "tamaño máximo permitido en bytes"
	    // @param $permitidos = array(array con los tipos de archivos permitidos); (http://www.freeformatter.com/mime-types-list.html#mime-types-list)
	    // @return: Solo retorna en caso de error
     
       // Obtener el tipo MIME del archivo enviado por el usuario
       $finfo = new finfo(FILEINFO_MIME_TYPE);
       $mime_usuario = $finfo->file($campo_archivo['tmp_name']);
     
        // Contrastar los tipos MIME
        $permitidos = in_array($mime_usuario, $permitidos);  // Devolverá true o false
     
        if($permitidos == FALSE) {
          // Si el archivo no está en la lista de permitidos, devolvemos error.
          return "Error: El archivo enviado no se corresponde a un tipo permitido";
        }
     
        // Comprobar que el tamaño no excede el permitido
        if ( $campo_archivo['size'] > $size ) {
          return "Error: El archivo enviado es mayor de lo permitido";
        }
     
        // Si el archivo existe en la ruta, devolvemos error.
        if ( file_exists($ruta.$campo_archivo['name']) == TRUE ) {
          return "Error: Ya existe ese archivo en la ruta definida";
        }
     
        // Si el archivo no se puede mover a su ruta, devolvemos error.
        $mover_archivo = move_uploaded_file($campo_archivo['tmp_name'], $ruta.$campo_archivo['name'].remplaza_acentos($campo_archivo));
        if ( $mover_archivo === FALSE ) {
          return "Error: Problema al subir el archivo";
        } elseif ( $mover_archivo === FALSE ) {
          return "Error: " . $mover_archivo;
        }
     
      return true;
    }


//Soporta repetir el mismo nombre de archivo. Agrega "-#" al nombre de archivo siendo # el número de la copia. Ej.: Si el archivo "prueba.txt" ya exciste, se sube como "prueba-1.txt" 
function subeArchivo($campo_name,$campo_tmp,$ruta) {

	$ext = '.'.pathinfo($campo_name, PATHINFO_EXTENSION);//Extrae la extención
	$nombre = pathinfo($campo_name, PATHINFO_FILENAME);//Extrae el nombre
	$file = remplaza_acentos($nombre).$ext; // Crea el nombre de archivo

	if(file_exists($ruta.$file)){//Revisa la excistencia del archivo
		$i=1;
		$filename=remplaza_acentos($nombre)."-".$i.$ext;//Creo nueva nombre con indicador numérico
		while(file_exists($ruta.$filename)){//Reviso si este archivo ya exciste y  si es asi, continuo aumentado el identifiador numérico
		 $filename=remplaza_acentos($nombre)."-".$i.$ext;
		 $i++;
		}		
		
		$file = $filename;//Redefino el nombre del archivo.
	
	}

	
	if ($campo_name != ""){
	
		if (!move_uploaded_file($campo_tmp,$ruta.$file)){
		
			die ('<div class="unsuccess"><p>Ocurri&oacute; algún error al subir el archivo '.$campo_name.'.<br/> No pudo guardarse.</p></div>');	//Error de subida de archivo
		}
		else{
	
			return $file;//Regresa el nombre del archivo ya formateado                
		}
	}
}





//paso la fecha de mysql a fecha normal
function MySQLDateToDate($MySQLFecha) { 
if (($MySQLFecha == "") or ($MySQLFecha == "0000-00-00") ) 
    {return "";} 
else 
    {return date("d.m.Y",strtotime($MySQLFecha));} 
}


// de normal a MYSQL
function DateToQuotedMySQLDate($Fecha) { 
if ($Fecha<>""){ 
   $trozos=explode(".",$Fecha,3); 
   return "".$trozos[2]."-".$trozos[1]."-".$trozos[0].""; } 
else 
   {return "NULL";} 
} 


// LIMITAR LINK
function limitarLink($string, $length = 12, $ellipsis = "..."){

    $chars = strlen($string);
    $much=round($length/2);
	
	if ($chars > $length)
    {
       return substr($string, 0, $much).$ellipsis.substr($string, -($much));
    }
    else
    {
       return $string;
    }
}


// LIMITAR PALABRAS
function limitarPalabras($cadena, $longitud=20, $elipsis = "...") {  
        $palabras = explode(' ', $cadena);  
        if (count($palabras) > $longitud){  
            return strip_tags(implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis);  
        }else{  
            return strip_tags($cadena);  
        }  
    }  



function Enlace($link) { 

 if ($link<>""){ 
 
  $http = 'http://';
  $url = str_replace($http,"",$link);
  
  return 'http://'.$url;
  }
}


//FECHA ACTUAL
date_default_timezone_set("America/Montevideo");
$hoy=date("Y-m-d");




//ENCRIPTAR CORREO
function email($email) {
    $partes = str_split(trim($email));
    $nuevo = '';
    foreach ($partes as $valor) {
        $nuevo .= '&#'.ord($valor).';';
    }
    return $nuevo;
}
*/

/*
// IDIOMA TEXTOS
function idioma($lg,$txt_en,$txt_fr,$txt_gr,$txt_it,$txt_es,$txt_ca,$txt_ne){ 

	switch ($lg) {

		case 'en':
			$txt = $txt_en;
			break;

		case 'es':
			$txt = $txt_es;
			break;
	} 
	return $txt; 	
}

// ACTIVO
$es = null;
$en = null;
$activo='activo';

switch($lg) {
	
	case 'en':
	$en = $activo;
	break;
	
	case 'fr':
	$ca = $activo;
	break;
	
	case 'gr':
	$fr = $activo;
	break;
	
	case 'it':
	$es = $activo;
	break;
	
	case 'es':
	$es = $activo;
	break;
	
	case 'ca':
	$nd = $activo;
	break;
	
	case 'nd':
	$gr = $activo;
	break;
	
	default:
	//echo '';
}


*/

?>



