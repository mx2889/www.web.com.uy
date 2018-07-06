
<form class="form" action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">



<?php include ('_cabezal.php'); ?>



<div class="cont">

	<section>
		


	<?php 

	$nomre_pagina = limpiarString($_POST['titulo']);

	$sql = $conexion->prepare(
	'INSERT INTO paginas (id, nombre)
	VALUES (null, :nombre)'
	);

	$sql->execute(array(
		':nombre' => $nombre_pagina,
	));

	header('Location: '. RUTA );

	?>



		<!-- cols-3 -->		
		<div class="cols-3 caja form-2">
			
			<div class="cols-6 pl-0 pt-0 pb-0">
				<h6>Estado*</h6>
				<select name="estado" required="required">
					<option value="0">Despublicado</option>
					<option value="1">Publicado</option>
				</select>
			</div>


			<div class="cols-6 pr-0 pt-0 pb-0">
				<h6>Orden*</h6>
				<input type="number" name="orden" required="required" placeholder="0">
			</div>

			<h6>Fecha creación</h6>
			<input type="text" name="fecha_publicacion" value="<?php echo $hoy; ?>" disabled="disabled">

			<h6>Categoria</h6>
			<select name="categoria" required="required">
				<option value="0">Sin categoria</option>
				<option value="1">Web</option>
				<option value="0">Gráfico</option>
			</select>

			<?php if ($p !='usuarios') { ?>
			<h6>Link</h6>
			<input type="text" name="link" value="" placeholder="www.dominio.com">

			<div class="acordeon archivos">
				<h6 class="item-acordeon">Subir imagenes</h6>
				<div class="info">
					<input type="file" name="foto[]">
				</div>

				<h6 class="item-acordeon">Subir adjuntos</h6>
				<div class="info">
					<input type="file" name="adjunto[]">
				</div>
			</div>
			<?php } ?>
			

			

			
	


		</div>
		<!-- FIN cols-3 -->




		<!-- cols-8 -->
		<div class="cols-8 cols-off-1 caja">


			<div class="row mb-30">
				<?php if ($p !='usuarios') { ?>
				<h6>Titulo*</h6>
				<input type="text" name="titulo" required="required">

				<h6>Sub titulo</h6>
				<input type="text" name="titulo" placeholder="Completar este campo en caso de ser necesesario">


				<h6>Descripción</h6>
				<div class="cont-textarea">
				<textarea id="editor1" name="descripcion"></textarea>
				</div>	
				<?php } else { ?>
				<h6>Nombre de usuario*</h6>
				<input type="text" name="nombre_usuario" required="required">

				<h6>Contraseña*</h6>
				<input type="text" name="pass_usuario" required="required">
				<?php } ?>
			</div>


		</div><!-- FIN cols-9 -->
		



	</section>
</div>
</form>