<header class="row header-acciones">
    <div class="cont">
        
        <div class="cols-4">
            <form action="" method="post">
                <input type="search" placeholder="Buscar">
                <input type="submit" hidden id="submit-search">
                <label for="submir-search"></label>
            </form>
        </div>
        
        
        <div class="cols-8">
            <div class="acciones">
                <?php if ($p=='pagina' || $p=='usuarios') { ?>
				<!-- BOTONES LISTADO -->
				<a href="" class="btn btn-despublicar" title="Despublicar">Despublicar</a>
				<a href="" class="btn btn-publicar" title="Pblicar">Publicar</a>
				<input type="submit" name="despublicar" hidden="hidden">
				<input type="submit" name="piblicar" hidden="hidden">





				<?php 
				if ($_SESSION['tipo'] == 1) { ?>

				<a href="" class="btn btn-borrar" title="Borrar">Borrar</a>	
				<input type="submit" name="borrar" hidden="hidden">
				<a href="index.adm.php?p=edit&pagina=<?php echo $pagina; ?>" clas="btn btn-editar" title="Editar">Editar</a>
				<a href="index.adm.php?p=add&pagina=<?php echo $pagina; ?>" class="btn btn-nuevo" title="Nuevo">Nuevo</a>

				<?php 
				} 
				?>





				<?php } else { ?>

				<!-- BOTONES NUEVO - EDIT -->
				<a class="btn btn-guardar" title="Guardar">Guardar</a>
				<a class="btn btn-guardar-salir" title="Guardar y salir">Guardar y salir</a>
				<a href="index.adm.php?p=usuarios" class="btn btn-cancelar" title="Cancelar">Cancelar</a>

				<input id="guardar" type="submit" name="guardar" hidden="hidden">
				<input id="guardar-salir" type="submit" name="guardar_salir" hidden="hidden">

				<?php } ?>
            </div>
        </div>
        
        
    </div>
</header>