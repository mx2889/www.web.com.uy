
<?php

$host = $_SERVER['HTTP_HOST'];


if ($host=="localhost"):

	define('RUTA', 'http://localhost/www.web.com.uy/');

	$base = 'mysql:dbname=mx;host=localhost';
	$usuario = 'root';
	$contrasena = '';

else:

	define('RUTA', 'http://www.maximilianolopez.uy/proyectos/web/');

	$base = 'mysql:dbname=mx28891_testweb;host=localhost';
	$usuario = 'mx28891_testweb';
	$contrasena = '-aVJ[5e8o]Bw';

endif;

// Si no quiero que se conecte comento las siguientes lineas
/*
try {
    $conexion = new PDO($base, $usuario, $contrasena,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
} catch (PDOException $e) {
    //$e = 'Ups! error en la conexión: ' . $e->getMessage();
    $errores = 'Ups! error en la conexión';
    die();
}
*/
?>