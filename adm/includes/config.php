

<?php

$host = $_SERVER['HTTP_HOST'];


if ($host=="localhost"):

	define('RUTA', 'http://localhost/www.web.com.uy/adm/');

	$base = 'mysql:dbname=test;host=localhost';
	$usuario = 'root';
	$contrasena = '';

else:

	define('RUTA', 'http://www.maximilianolopez.uy/proyectos/web/adm/');

	$base = 'mysql:dbname=mx28891_test;host=localhost';
	$usuario = 'mx28891_test';
	$contrasena = '-aVJ[5e8o]Bw';

endif;

// Si no quiero que se conecte comento las siguientes lineas

try {
    $conexion = new PDO($base, $usuario, $contrasena,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //echo 'conectado!';
    
} catch (PDOException $e) {
    //$e = 'Ups! error en la conexión: ' . $e->getMessage();
    $errores = 'Ups! Existe un error en la conexión';
    die();
}

?>