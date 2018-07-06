<!--
DISEÑO & DESARROLLO: Maximiliano López
Montevideo, Uruguay
info@maximilianolopez.uy
-->

<?php
//ob_start("html");
include ('includes/funciones.php');
?>

<!DOCTYPE html>

<html lang="es-ES">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="format-detection" content="telephone=no" />
<meta name="author" content="Maximiliano López">
	
<meta name="theme-color" content="<?php echo $theme_color ?>" />
<meta name="msapplication-navbutton-color" content="<?php echo $theme_color ?>">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $theme_color ?>">

<link rel="dns-prefetch" href="//ajax.googleapis.com">
<link rel="dns-prefetch" href="//fonts.googleapis.com"> 
<link rel="dns-prefetch" href="//maps.googleapis.com">

<base href="<?php echo RUTA ?>" />

<title><?php echo $nombre_web ?></title>
 
<link rel="shortcut icon" href="<?php echo IMG ?>favicon/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo IMG ?>favicon/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo IMG ?>favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo IMG ?>favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo IMG ?>favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo IMG ?>favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo IMG ?>favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo IMG ?>favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo IMG ?>favicon/apple-touch-icon-152x152.png" />
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo IMG ?>favicon/apple-touch-icon-180x180.png" />

<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

<!-- CSS -->
<link href="<?php echo PLUGINS ?>fbox/jquery.fancybox.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS ?>owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS ?>owl-carousel/owl.theme.css?" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGINS ?>jquery-ui/jquery-ui.min.css?" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="<?php echo CSS ?>styles.css?<?php echo filesize(CSS.'styles.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo CSS ?>responsive.css?<?php echo filesize(CSS.'responsive.css') ?>" rel="stylesheet" type="text/css"/>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo JS ?>jquery-migrate-1.4.1.min.js" type="text/javascript"></script>

<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
<![endif]-->

</head>



<body class="body-<?=$p; ?>">
<? //include($inc.'analytics.php'); ?>

  <div id="cont">


  <!-- Preloader 
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
	-->

   
   
    <!--
    //// HEADER 
    -->
    <?php include ('inc.header.php'); ?>


    
   
     
    
    
    
    <!--
    //// MAIN 
    -->
    <?php include ('inc.main.php'); ?>

      
     
     
     
     
     
    <!--
    //// FOOTER 
    -->
    <?php include ('inc.footer.php'); ?>



      
      

  	<!-- JS -->
    <script src="<?php echo PLUGINS ?>owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script src="<?php echo PLUGINS ?>fbox/jquery.fancybox.min.js" type="text/javascript"></script>
    <script src="<?php echo PLUGINS ?>smoove/jquery.smoove.min.js" type="text/javascript"></script>
    <script src="<?php echo PLUGINS ?>masonry/masonry.min.js" type="text/javascript"></script>
    <script src="<?php echo PLUGINS ?>masonry/imageLoaded.min.js" type="text/javascript"></script>
    <script src="<?php echo PLUGINS ?>parallax/parallax.min.js" type="text/javascript"></script>
    <script src="<?php echo PLUGINS ?>zoom/jquery.zoom.min.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <?php if($host=='localhost'){ ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN1e_h118zAFTYM6A-ejcYhnj4aameF3I" type="text/javascript"></script>
    <?php } else { ?>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
    <?php } ?>

    <?php
    include (INCLUDES.'scripts.php');
    if($p=='contacto'){ include (INC.'mapa.php'); } 
    ?>




  <?php 
  //echo $_SESSION['preload'];
  //ob_end_flush();
  ?>

  </div>
</body>
</html>