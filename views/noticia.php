<? 
    if(!isset($id)){
        $noticias = mysql_db_query($base,"SELECT id FROM noticias ORDER BY fecha DESC LIMIT 1");
        $noticia = mysql_fetch_array($noticias);
        $id = $noticia['id'];
        mysql_free_result($noticias);
    }


?>


<section role="contentinfo" class="contenido">
	<div class="cont-mini">
    	
        
        
        
        <!-- sidebar -->
        <div class="cols-3">
        	<aside role="complementary">
            	<ul>
                	<li><a href="">Noticia 1</a></li>
                    <li><a class="activo" href="">Titulo de prueba</a></li>
                    <li><a href="">Noticia 1</a></li>
                    <li><a href="">Noticia 1</a></li>
                    <li><a href="">Noticia 1</a></li>
                </ul>
            </aside>
        </div>
        
       
        
        
        
        
        <div class="cols-8 cols-off-1">
        
        	<article role="contentinfo">
            	<? 
                    $noticias = mysql_db_query($base,"SELECT *, tit_".$lg." AS tit, cope_".$lg." AS cope, txt_".$lg." AS txt FROM noticias WHERE id = $id");
                    $noticia = mysql_fetch_array($noticias);
                
                    $fotos=array();
                    for($i=1; $i<=10; $i++){
                        $ch = check_file($ruta_noticias.'ch_'.$id.'_'.$i.'.jpg',true);
                        $gr = check_file($ruta_noticias.$id.'_'.$i.'.jpg',true);
                        if($ch && $gr){
                            $fotos[$i]=array('ch'=>$ch,'gr'=>$gr);
                        }
                    }
                ?>
               
                <!-- TITULO -->
            	<header class="tit">
                	<h3><?=$noticia['tit']?></h3>
                    <span class="fecha"><?=idioma($lg,'Publicado el','Published at').' '.formato_fecha($noticia['fecha'])?></span>
                </header>
                
                
                <!-- COPETE -->
                <div class="row copete">
                    <p><?=$noticia['cope']?></p>
                </div> 
                
                <? 
                    if(count($fotos)>0){
                    
                        reset($fotos);
                        $primera = key($fotos);
                        $img = $fotos[$primera]['gr'];
                ?>
                <!-- IMG -->
                <div class="row row-img">
                	<img src="<?=$img?>" alt="" title="" />
                </div>
                <? 
                    }
                ?>
                
                <!-- INFO -->
                <?=$noticia['txt']?>
                
            
            
            </article>
            
            
            
			<?
			for($num=1; $num<=5; $num++){
				if ($noticia['video'.$num]!=""){
					//VIMEO
					if(is_numeric($noticia['video'.$num])) { ?>
            <!-- VIDEOs -->
            <div class="row row-video">
            	
            	<div class="video">
            		<iframe src="https://player.vimeo.com/video/<?=$noticia['video'.$num]?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            	</div>
            	
            </div>
            <? 
					} 
				}
			}
			?>
            
            
            <? 
                if(count($fotos)>0){
            ?>
                <div class="row galeria mt-60">
                <? 
                    foreach($fotos as $data){
                ?>                    
                    <div class="cols-2-5">
                        <div class="ratio-75">
                            <a href="<?=$data['gr']?>" class="foto absolute" data-fancybox="galeria" style="background-image:url(<?=$data['ch']?>)"></a>
                        </div>
                    </div>
                <? 
                    }
                ?>    
                </div>            
            <?
                }
            ?>
            
            <? 
                $adjuntos=array();
                for($i=1; $i<=5; $i++){
                    $adj = check_file($ruta_noticias.$noticia['adjunto'.$i]);
                    if($adj){
                        $adjuntos[$i]=array('nom'=>$noticia['adjunto'.$i],'href'=>$adj);
                    }
                }  
                        
                if(count($adjuntos)>0){        
            ?>
            <!-- ADJUNTOS -->
            <div class="row row-adjuntos">
            	<h6><?=idioma($lg,"Descargas","Downloads") ?></h6>
                <? 
                    foreach($adjuntos as $data){
                ?>
                    <a class="adjunto" href="<?=$data['href']?>" target="_blank"><?=$data['nom']?></a>
                <?
                    }
                ?>
            	
            </div>
            <? 
                }
            ?>
            
            
            <!-- GALERÍA -->
            
            
            
            
        </div>
    
    
    </div>
</section>






