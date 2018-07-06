






<!-- CONTENIDO -->
<section role="contentinfo" class="contenido degrade-izq">
	<div class="cont-mini">

 		<div class="cols-12 tit">
            <h3>NOTICIAS</h3>

        </div>
        
        
        
 
		<!-- MASONRY -->
		<div class="row grid catalogo">
		
			<?
			$result=mysql_db_query ($base, "SELECT * FROM noticias" ) or die ("no se pudo hacer la consulta de noticias");
			while ($row=mysql_fetch_array ($result)){
			?>
			         
            
            <!-- NOTICIA -->
			<div class="grid-item">
            
                <a class="tx ico ico-lupa" href="<?=$lg?>/noticia-final"></a>
                
				<? 
				$img = check_file($ruta_noticias.'md_'.$row['id'].'_1.jpg',true);
				if($img){                         
				?>

				<img src="<?=$img?>" title="<?=$row['tit_'.$lg]?>" alt="<?=$row['tit_'.$lg]?>" />
				<? } ?> 
                
			</div>

       
            <? 
    		}
    		mysql_free_result($result);
			?>      
            
         

		</div><!-- FIN GRID MASONRY -->		




	</div>
</section>
