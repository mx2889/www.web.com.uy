
<script language="JavaScript">
	function aviso(){
		if (!confirm("Si desea eliminar de click en ACEPTAR\n de lo contrario de click en CANCELAR.")) {
			return false;
		}
		else {
			document.location = url;
		return true;
		}
	}
	function checks(form,activa){
		for(i=0;i<form.elements.length;i++)
		if(form.elements[i].type=="checkbox")
		form.elements[i].checked=activa;
	}
</script>


<form action="" method="POST"  accept-charset="utf-8">

<?php include ('_cabezal.php'); ?>




<section>
<div class="cont">


	
	

	<?php 

	$pag = isset($_GET['pag']) ? (int)$_GET['pag'] : 1 ;
	$postPorPagina = 20;

	$inicio = ($pag> 1) ? ($pag * $postPorPagina - $postPorPagina) : 0;

	$sql = $conexion->prepare("
	  SELECT SQL_CALC_FOUND_ROWS * FROM USUARIOS
	  LIMIT $inicio, $postPorPagina
	  ");

	$sql->execute();
	$rows = $sql->fetchAll();
	//print_r($rows);
	//$colsumnCount = count($rows);

	$totalResults = $conexion->query('SELECT FOUND_ROWS() as total');
	$totalResults = $totalResults->fetch()['total'];

	$numeroPaginas = ceil($totalResults / $postPorPagina);

	?>


	


	<div class="row mb-10 mt-30">
		<div class="result">
			Total resultados: <b><?php echo $totalResults;  ?></b>
	    </div>
	</div>

	

	<div class="row contenido">
		<table width="100%" cellpadding="0" cellspacing="0">
            
            <tr class="titulo">
                
                <td class="chk"><input type=checkbox onclick="checks(this.form,this.checked);"></td>
                <td class="id">ID</td>
                                               
                <td class="orden">Orden
                	<a class="asc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=orden'; ?>"></a>
                	<a class="desc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=orden DESC'; ?>"></a>
                </td>
                
                <td class="pub">Estado
                	<a class="asc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=estado'; ?>"></a>
                	<a class="desc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=estado DESC'; ?>"></a>
                </td>

                <td class="tit">Usuario
                	<a class="asc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=tipo'; ?>"></a>
                	<a class="desc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=tipo DESC'; ?>"></a>
                </td>

                <td class="tit">Tipo
                	<a class="asc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=tipo'; ?>"></a>
                	<a class="desc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=tipo DESC'; ?>"></a>
                </td>

                <td class="tit">Fecha de creación
                	<a class="asc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=tipo'; ?>"></a>
                	<a class="desc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=tipo DESC'; ?>"></a>
                </td>

                <td class="tit">Ultimo acceso
                	<a class="asc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=tipo'; ?>"></a>
                	<a class="desc" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$p[1].'List&por=tipo DESC'; ?>"></a>
                </td>
                
            </tr>

            
            <?php 
            foreach ($rows as $row) { ?>
            <tr>
	            <td><input type="checkbox"></td>

	            <td class="td-id"><?php echo $row['id']; ?></td>

	            <td><?php echo $row['orden']; ?></td>

	            <td><?php if ($row['estado'] == 1){echo '<i class="si"></i>';} else { echo '<i class="no"></i>';} ?></td>
		
				<td><?php echo $row['username']; ?></td>

				<td><?php if ($row['tipo'] == 1){echo 'Super admin';} else { echo 'Admin';} ?></td>

	            <td>0000-00-00</td>

	            <td>0000-00-00</td>

            </tr>
			<?php } ?>

        </table>
	</div>						



	<!-- PAGINADO -->
	<?php include ('_paginado.php') ?>
	








    </form>



   </div>
</section>