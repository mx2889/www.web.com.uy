<?php

// VARIABLES
$p      = isset($_GET['p'])         ? $_GET['p'] : 'inicio' ;
$pagina = isset($_GET['pagina'])    ? $_GET['pagina'] : null ;
$buscar = isset($_GET['buscar'])    ? $_GET['buscar'] : null ;
$por    = isset($_GET['por'])       ? $_GET['por'] : null ;
$id     = isset($_GET['id'])        ? (int)$_GET['id'] : null ;
$tipo   = isset($_SESSION['tipo'])  ? $_SESSION['tipo'] : null ;
$pag    = isset($_GET['pag'])       ? (int)$_GET['pag'] : 1 ;

$correo = 'info@maximilianolopez.uy';



//FECHA ACTUAL
date_default_timezone_set("America/Montevideo");
$hoy=date("Y-m-d");





//SELECT CONFIGURACIONES
$sql = $conexion->prepare(
  'SELECT * FROM configuracion'
);
$sql->execute();
$row_config = $sql->fetch();


$inactivo = $row_config['tiempo_sesion'];
/*
if (!isset($_SESSION['username'])) {
  //header('Location:index.php');
} else {

  if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
    if($vida_session > $inactivo){
      session_destroy();
      //header("Location: index.php"); 
    }
  }
  $_SESSION['tiempo'] = time();
}
*/

// RUTAS
define("CSS","css/"); 
define("FONTS","../fonts/"); 
define("IMG","img/"); 
define("INCLUDES","includes/"); 
define("MEDIA","../media/"); 
define("PLUGINS","../plugins/"); 
define("JS","../js/"); 




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

}*/

/*
foreach ($rows as $row_pagina) {
  $row_pagina['nombre'];
}

*/

$paginas = 'inicio|configuracion|multimedia|add|delete|edit|paginas';




//LIMPIAR STRING
function limpiarString($datos){
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}



// IP
function get_real_ip(){

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
// REEMPLAZAR ACENTOS
function remplaza_acentos($var){ //replace for accents catalan spanish and more
		$a = array(' ','À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ','°','º'); 
		$b = array('_','A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o','',''); 
    $var= str_replace($a, $b, $var);
    return $var; 
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


/*
function subeArchivo($campo_name,$campo_tmp,$ruta_adjunto) {

	if ($campo_name != ""){
	
		if (!move_uploaded_file($campo_tmp,$ruta_adjunto.remplaza_acentos($campo_name))){
		
			echo '<div class="unsuccess"><p>Ocurri&oacute; algÃºn error al subir el archivo '.$campo_name.'. No pudo guardarse.</p></div>';	
		}
		else{
	
			return $campo_name;                
		}
	}
}
*/



//paso la fecha de mysql a fecha normal
function MySQLDateToDate($MySQLFecha) { 
if (($MySQLFecha == "") or ($MySQLFecha == "0000-00-00") ) 
    {return "";} 
else 
    {return date("d/m/Y",strtotime($MySQLFecha));} 
}



// de normal a MYSQL
function DateToQuotedMySQLDate($Fecha) { 
if ($Fecha<>""){ 
   $trozos=explode("/",$Fecha,3); 
   return "".$trozos[2]."/".$trozos[1]."/".$trozos[0].""; } 
else 
   {return "NULL";} 
}



// de normal a MYSQL
function DateToCalendario($MySQLFecha) { 
if (($MySQLFecha == "") or ($MySQLFecha == "0000-00-00") ) 
    {return "";} 
else 
    {return date("m/d/Y",strtotime($MySQLFecha));} 
}





function Enlace($link) { 

 if ($link<>""){ 
 
  $http = 'http://';
  $url = str_replace($http,"",$link);
  
  return 'http://'.$url;
  }
}




//ENCRIPTAR CORREO
function email($email) {
    $partes = str_split(trim($email));
    $nuevo = '';
    foreach ($partes as $valor) {
        $nuevo .= '&#'.ord($valor).';';
    }
    return $nuevo;
}



?>



