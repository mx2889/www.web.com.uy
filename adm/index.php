
<!--
DISEÑO & DESARROLLO: Maximiliano López
Montevideo, Uruguay
info@maximilianolopez.uy
-->
<?php
session_start(); 

if (isset($_SESSION['username'])) {
	header('Location:index.adm.php');
    //echo 'existe sesion' . $_SESSION["username"];
} else {
    //echo 'no existe nada!!!!';
}

$errores = '';
if (!empty($e)) {
	echo $errores;
}

require ('includes/config.php');



?>

<!DOCTYPE html>

<html lang="es-ES">


	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<base href="<?php echo RUTA ?>" />
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
        
		<link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="css/styles.css?<?php echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="css/resposive.css?<?php echo time(); ?>">
		
	</head>


	
	<body class="login">
        
        
            <?php 
            // INICIO SESION
            if (isset($_POST['submit'])) {

                $username  = filter_var(strtolower($_POST['username']), FILTER_SANITIZE_STRING);
                $userpass = $_POST['userpass'];
                $userpass = hash('md5', $userpass);

                $sql = $conexion->prepare("
                    SELECT * FROM user 
                    WHERE username = :username
                    AND userpass = :userpass
                    ");

                $sql->execute(array(
                    ':username' => $username,
                    ':userpass' => $userpass,
                ));

                $row_login = $sql->fetch();
                //var_dump($login);

                if ($row_login !== false) {
                    $_SESSION['username'] = $username;
                    /*$tipo = $row_login['tipo'];
                    $_SESSION['tipo'] = $tipo;
                    $_SESSION["time"] = time();*/
                    echo $_SESSION['username'];
                    header('Location:index.adm.php');
                } else {

                    $errores.= 'Error de usuario y/o contraseña.';
                    //include ('_includes/envio-error.php');
                }
            }

            ?>

			<form class="form-login" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" accept-charset="utf-8">
				<h5>Administrador</h5>
				
				<div class="row">
					<input type="text" name="username"  maxlength="8" placeholder="Nombre de usuario" required="require" autocomplete="off">
					<input type="password" name="userpass"  maxlength="8" placeholder="Contraseña" required="require" autocomplete="off">

					<?php 
					if (!empty($errores)) {
						echo '<p>' . $errores . '</p>';
					} 
					?>

					<input type="submit" name="submit" value="Ingresar">
				</div>
			</form>


		
    </body>
</html>




