

<section role="contentinfo" id="contacto">  
    
    <div class="row cont-mapa">
        <div class="mapa" id="mapa"></div>
    </div>
    
    <div class="cont">
    
    
        <div class="row mb-60">
            <form action="" method="post" id="enviado" class="form-contacto">
                    
    		<div class="cols-6">
                <div class="caja-form required">
                <input name="nombre" type="text" placeholder="Nombre" value="" required />
                </div>
                <div class="caja-form required">
                <input name="correo" type="email" value="" placeholder="Correo eletrónico" required />
                </div>
                <label for="verificacion" class="verif">¡Si ves esto, no llenes el siguiente campo!</label>
                <input name="verificacion" value="" class="verif" />
            </div>
            
            
            
            <div class="cols-6">
                <div class="caja-form required">
                <input name="tel" type="text" value="" placeholder="Teléfono" required />
                </div>
                <div class="caja-form required">
                <input type="date" name="fecha" placeholder="Fecha" required />
                </div>
            </div>
            
            <div class="cols-6">
                <div class="caja-form required">
                <input id="radio-1" name="tel" type="radio" value="" required />
                <label for="radio-1" class="radio ion">Radio</label>
                </div>
            </div>

            <div class="cols-6">  
                <div class="caja-form required">
                <input id="check-1" name="tel" type="checkbox" value="" required />
                <label for="check-1" class="check ion">Checkbox</label>
                </div>

            </div>
			
			<div class="cols-6">
				<input id="desde" class="desde" name="desde_f" type="text" placeholder="Desde" value="" required />
				<input id="hasta" class="hasta" name="hasta_f" type="text" placeholder="Hasta" value="" required />
			</div>

            <div class="cols-12">
                <select name="">
                    <option value="">Seleccione</option>
                    <option value="">A</option>
                    <option value="">A</option>
                </select>
            </div>
            
            
            <div class="cols-12">
                <div class="caja-form required">
                <textarea name="msj" placeholder="Mensaje" required></textarea>
                </div>
            <input type="submit" name="submit" class="submit" value="Enviar" />
            </div>
            
            
            
            <?php
			include 'inc/correo.php'; 
		
			if(!empty($errores)):
				echo $errores;
			elseif($enviado):
			   echo '<div class="cols-12"><div class="msj-ok">Mensaje enviado con éxito.</div></div>';
			?>
			<script type="text/javascript">
				$(document).ready(function(){

					/* hago scroll hasta el ancla */
					var y = $('#enviado').offset().top;
					$('html,body').animate({'scrollTop':y},1600);
					console.log(y);

				   /* o abro fancybox */
				   $('.btn-contacto-home').trigger('click');
				});
			</script>
		
			<?php 
			endif
			?>
    
            
        </form>
        </div>
    
    
    </div>
</section>





