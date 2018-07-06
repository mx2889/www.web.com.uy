<!--
DISEÑO & DESARROLLO: Maximiliano López
Montevideo, Uruguay
info@maximilianolopez.uy
-->

<?php 

$errores = '';
session_start();

if (isset($_SESSION['username'])) {
	//header('Location:index.adm.php');
    //echo 'existe sesion' . $_SESSION["username"];
} else {
    header('Location:index.php');
}

require ('includes/config.php');
require ('includes/funciones.php'); 
?>

<!DOCTYPE html>
<?php ob_start(); ?>
<html lang="es-ES">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="format-detection" content="telephone=no" />
<meta name="author" content="Maximiliano López">

<base href="<?php echo RUTA ?>" />

<title>Administrador de contenidos</title>
 
<link rel="shortcut icon" href="<?php echo IMG ?>favicon/favicon.ico" type="image/x-icon" />

<link rel="dns-prefetch" href="//ajax.googleapis.com">
<link rel="dns-prefetch" href="//fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">

<link href="<?php echo PLUGINS ?>/ckeditor/skins/minimalist/editor.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo CSS ?>styles.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo CSS ?>responsive.css" rel="stylesheet" type="text/css"/>

<script src="<?php echo JS ?>/jquery-1.10.2.min.js" language="javascript" type="text/javascript"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../<?php echo PLUGINS ?>jquery-migrate-1.4.1.min.js" type="text/javascript"></script>-->

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--<script src="_plugins/ckeditor/ckeditor.js"></script>-->
<script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>

<?php include(INCLUDES.'scripts.php') ?>

</head>




	
	<body class="page-<?php echo $p ?>">
		
		
		<!--
		//// HEADER
		-->
		<?php include ('inc.header.php') ?>
		<?php include ('inc.acciones.php') ?>




		<!--
		//// MAIN
		-->
		<?php include ('inc.main.php') ?>




	
	</body>
</html>
<?php ob_end_flush();  ?>	



