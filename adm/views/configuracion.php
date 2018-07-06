<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$id = $_POST['ID'];
	$title = limpiarString($_POST['title']);
	$keywords = limpiarString($_POST['keywords']);
	$description = limpiarString($_POST['description']);
	$tiempo_sesion = filter_var($_POST["tiempo_sesion"], FILTER_SANITIZE_NUMBER_INT);
	//Lo paso de minutos a segundos
	$tiempo_sesion = $tiempo_sesion * 60;
	$correo_destino = filter_var($_POST["correo_destino"], FILTER_SANITIZE_EMAIL);


	$sql = $conexion->prepare(
		'UPDATE configuracion SET 
            title = :title, 
            keywords = :keywords, 
            description = :description, 
            tiempo_sesion = :tiempo_sesion, 
            correo_destino = :correo_destino 
        WHERE ID = :id'   
	);

	$sql->execute(array(
        ':id' => $id,
		':title' => $title,
		':keywords' => $keywords,
		':descripcion' => $description,
		':tiempo_sesion' => $tiempo_sesion,
		':correo_destino' => $correo_destino
	));
    
    $row_config = $statement->fetch();
    
	if (isset($_POST['guardar'])) {
		header('Location:index.adm.php?p=configuracion');
	} else {
		header('Location:index.adm.php');	
	}
}
?>



<div class="cabezal">
   <div class="cont">
       <div class="cols-12">
           <h2>Configuración del sitio</h2>
       </div>
   </div>
</div>



<div class="cont">
    <section>
			
			<form class="form" action="" method="POST" accept-charset="utf-8">

			<!-- cols-3 -->		
			<div class="cols-3">
				
				<input type="number" name="id" value="<?php echo $row_config['ID'] ?>" hidden>
				
				<div class="caja-form">
				<h6>Duracion de la sesion (en minutos)</h6>
				<small class="aviso">Se recomienda un máximo de 60 minutos</small>
				<input type="number" name="tiempo_sesion" maxlength="3" value="<?php echo $row_config['tiempo_sesion']; ?>">
				</div>
				
				<div class="caja-form">
                <h6>Correo electrónico de destino</h6>
                <input type="email" name="correo_destino" value="<?php echo $row_config['correo_destino']; ?>" placeholder="ejemplo@midominio.com">
                </div>

			</div>
			<!-- FIN cols-3 -->




			<!-- cols-9 -->
			<div class="cols-6">

				

				<div class="row mb-30">
					
					<div class="caja-form">
                    <h6>Nombre del sitio</h6>
					<small class="aviso">* Asegúrese de que el título es explícito y contiene las palabras clave más importantes. Max. 60 caracteres</small>
				    <input type="text" name="title" maxlength="90" value="<?php echo $row_config['title']; ?>">   
					</div>
					
                    <div class="caja-form">
					<h6>Palabras clave</h6>
					<small class="aviso">* Frases o palabras separadas por coma. Ejemplo: palabra clave, keywords</small>
                    <input type="text" name="keywords" value="<?php echo $row_config['keywords']; ?>">
                    </div>
					
                    <div class="caja-form">
					<h6>Descripción</h6>
					<small class="aviso">* Ideal: entre 70 y 160 caracteres incluyendo espacios.</small>
                    <textarea name="description" maxlength="300"><?php echo $row_config['descripcion']; ?></textarea>
                    </div>

                   
                    
				
				</div>


			</div>
			<!-- FIN cols-9 -->
			

        
        

        </form>
    </section>
</div>
