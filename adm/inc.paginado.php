<div class="row paginado">
	<ul>
		<!-- Establecemos cuando el boton de "Anterior" estara desabilitado -->
		<?php if ($pag == 1): ?>
			<li class="disabled">&laquo;</li>
		<?php else: ?>
			<li><a href="index.adm.php?p=pagina&pagina=<?php echo $pagina; ?>&pag=<?php echo $pag - 1 ?>">&laquo;</a></li>
		<?php endif; ?>

		<!-- Ejecutamos un ciclo para mostrar las paginas -->
		<?php 
		for ($i=1; $i <= $numeroPaginas ; $i++) { 
			if ($pag == $i) {
				echo "<li class='active'><a href='index.adm.php?p=pagina&pagina=$pagina&pag=$i'>$i</a></li>";
			} else {
				echo "<li><a href='index.adm.php?p=pagina&pagina=$pagina&pag=$i'>$i</a></li>";
			}
		}
		?>

		<!-- Establecemos cuando el boton de "Siguiente" estara desabilitado -->
		<?php if ($pag == $numeroPaginas): ?>
			<li class="disabled">&raquo;</li>
		<?php else: ?>
			<li><a href="index.adm.php?p=pagina&pagina=<?php echo $pagina; ?>&pag=<?php echo $pag + 1 ?>">&raquo;</a></li>
		<?php endif; ?>
	</ul>
</div>