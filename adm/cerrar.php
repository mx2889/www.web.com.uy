<?php 

session_destroy();

$_SESSION['username'] = null;
$_SESSION['tipo'] = null;

header('Location:index.php')

?>