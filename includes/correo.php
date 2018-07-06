
<!-- VALIDAR INPUT EMAIL HTML5 (MEJORADO) -->
<script type="text/javascript" charset="utf-8">
if($('input[type="email"]').length>0){
	function validateEmail(email) {
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}		
	$('input[type="email"]').change(function(e){
		var email = $(this).val();
		if(!validateEmail(email)){
			e.target.setCustomValidity("El correo ingreaso no es válido");
		}else{
			e.target.setCustomValidity("");
		}
	});
}
</script>


<?php
/*
if (headers_sent()) {
    echo 'las cabeceras ya se han enviado';
}
else {
    echo 'es posible añadir nuevas cabeceras HTTP';
}
*/

$errores = '';
$enviado = '';


if (isset($_POST["submit"])){ 

	include('inc/inc_google_conversion.php');
		
		
	$nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
	$tel = filter_var($_POST["tel"], FILTER_SANITIZE_NUMBER_INT);
	$msj = filter_var($_POST["msj"], FILTER_SANITIZE_STRING);
	
	$desde = filter_var($_POST["desde"], FILTER_SANITIZE_STRING);
	$hasta = filter_var($_POST["hasta"], FILTER_SANITIZE_STRING);
	
	
	// acá se define el mailto, una vez a cada uno
	include('inc/inc_selecc_email.php');	


	// CORREO DE DESTINO
	//$MailTo = 'maxi@cygnus.com.uy';
	
	//echo '<h1>'.$MailTo.'</h1>';



	// VERIFICO SI ES SPAM
	if ($_POST['verificacion'] != ""){
		$errores = '<div class="cols-12"><div class="msj-error">¡Spam!</div></div>';
	}

	if($nombre == "" && $email == ""){
		$errores = '<div class="cols-12"><div class="msj-error">Complete todos los campos.</div></div>';
	}

	//VERIFICO SI ES UN EMAIL VÁLIDO
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores = '<div class="cols-12"><div class="msj-error">Ingrese un email valido.</div></div>';
	}
	
	// VERIFICO SI ES UN TELÉFONO VÁLIDO
	if(!filter_var($tel, FILTER_VALIDATE_INT)) {
		$errores = '<div class="cols-12"><div class="msj-error">Ingrese un teléfono valido.</div></div>';
	}


	if(!$errores){
		
		$contenido='
		<html>
		<body>
		<table width="100%" border="0" cellspacing="20" cellpadding="5">
		  <tr>
			<td style="font-size:12px; font-family:arial, helvetica; color:#333;">
			Nombre: <strong>'.$nombre.'</strong><br /><br />
			Correo: <strong><a style="color:#333" href="mailto:'.$email.'">'.$email.'</a></strong><br /><br />
			Tel: <strong>'.$tel.'</strong><br /><br />
			Desde: <strong>'.$desde.'</strong><br /><br />
			Hasta: <strong>'.$hasta.'</strong><br /><br />
			Mensaje: <strong>'.nl2br($msj).'</strong>
			</td>
		  </tr>
		</table>
		</body>
		</html>';
		 
		//para el envío en formato HTML
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		
		//dirección del remitente
		$headers .= "From: $nombre <$email>\r\n";
		
		//dirección de respuesta, si queremos que sea distinta que la del remitente
		$headers .= "Reply-To: $email\r\n";
		
		//ruta del mensaje desde origen a destino
		$headers .= "Return-path: $email\r\n";
		
		//direcciones que recibirán copia
		$headers .= "Cc: $correo\r\n";
		//$headers .= "Bcc: $email\r\n";

		//asunto
		$asunto = 'Contacto web - Lloret de Mar Propiedades '.$MailTo;
		
		//envia al usuario
		@mail($MailTo,$asunto,$contenido,$headers);
		
		$enviado = 'true';
	}	

} 
?>
	