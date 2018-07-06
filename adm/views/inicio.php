<?php 

/*
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){

	$mime_permitidos = array(
      "image/png",
      "mage/tiff",
      "image/bmp",
      "image/gif",
      "image/jpeg",
      "image/jpg",
      "image/svg",
      "image/svg+xml"
    );
    // Definimos en una variable la ruta
    $ruta = "../$media_img";
    // Definimos en una variable el tamaño
    $size = 2097152; // 2MB
    // Comprobamos si el array $_FILES['nombre_del_campo'] está definido
    // y no está vacío y se lo asignamos a una variable local, que será un array
    // con todos los índices correspondientes al array $_FILES
    if ( isset($_FILES['foto']) && !empty($_FILES['foto']) ) {
         $archivo_captura = $_FILES['foto'];
    }
     
    subeArchivo($archivo_captura, $ruta, $size, $mime_permitidos);
}

*/
?>


<section class="<?php echo $pagina; ?>">
	<div class="cont">



		<div class="cols-4">

			<h4>Bienvenido: <?php echo $_SESSION['username'] ?></h4>

			<p>
			Este es su administrador de contenidos.<br>
			EN el el podrá editar la información necesario para el optimo uso de su sitio web<<br>
			Si desea puede descarar el siguiente manual para un correcto uso el administrador.
			</p>

			<a href="manual.pdf" title="Manual">Manual</a>

		</div>



		<div class="cols-6 cols-off-1">
			<h6>Accesos rapidos</h6>

			<div class="row">
			  <a href="" title="" class="btn-acceso">Configuración</a>
			  <a href="" title="" class="btn-acceso">Multimedia</a>
			  <a href="" title="" class="btn-acceso">Contenido</a>
			  <a href="" title="" class="btn-acceso">Usuarios</a>
			</div>
		</div>





	</div>	
</section>