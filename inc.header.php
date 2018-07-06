

<header id="header" role="banner"> 
    <div class="cont">
    
      <!-- LOGO -->
                <h1 id="logo">
                    <a href=""><img src="img/logo.svg" onerror="this.src='img/logo.png'" title="<?=$nombre_web?>" alt="Logo <?=$nombre_web?>" /></a>
                     <?php 
					 switch($p) {
						case 'inicio':
						echo '<span>'.$nombre_web.'</span>';
						break;
						
						case 'directores':
						echo '<span>'.$nombre_web.' - Directores</span>';
						break;
						/*
						case 'director' && $id:
						echo '<span>'.$nombre_web.' - Director</span>';
						break;
						
						case 'servicios' && $id!=3:
						echo '<span>'.$nombre_web.' - Digital y servicios</span>';
						break;
						
						case 'servicios' && $id==3:
						echo '<span>'.$nombre_web.' - Servicios de producción</span>';
						break;
						*/
						case 'contacto':
						echo '<span>'.$nombre_web.' - Contacto</span>';
						break;

						default:
						echo '<span>'.$nombre_web.'</span>';
					}
				    ?>
                </h1>
      

      <!-- NAV -->
      <i class="btn-menu"></i>

      <nav role="navigation" class="main-menu">

            <i class="btn-cerrar-menu">Cerrar</i>

            <ul class="menu" role="menu">
               
                <li role="menuitem" <? if($p=='inicio'){ echo 'class="activo"'; } ?>>
                    <a href="inicio">Inicio</a>
                </li>


                <li role="menuitem" <? if($p=='articulo'){ echo 'class="activo"'; } ?>>
                    <a href="articulo">Articulo</a>
                </li>

                <li role="menuitem" <? if($p=='tablas'){ echo 'class="activo"'; } ?>>
                    <a href="tablas">Tablas</a>
                </li>


                <li role="menuitem" <? if($p=='productos'){ echo 'class="activo"'; } ?>>
                    <a class="a-sub" href="">Plugings</a>
                    <i class="ico-drop"></i>
                    <ul class="sub-menu">
                        <li role="menuitem"><a href="acordeon" title="">Acordeon</a></li>
                        <li role="menuitem"><a href="tabs" title="">Tabs</a></li>
                        <li role="menuitem"i><a href="parallax" title="">Parallax</a></li>
                    </ul>

                </li>


                <li role="menuitem" <? if($p=='contacto'){ echo 'class="activo"'; } ?>>
                    <a href="contacto">contacto</a>
                </li>
            </ul> 

      </nav>
      <!-- // -->
      
    </div> 
</header>
