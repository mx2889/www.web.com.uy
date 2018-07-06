<!--
//// MAIN
-->
<main role="main" id="main">
	<?php
	if(preg_match("^($paginas)$^",$p)) {
	  include ('views/'.$p.".php");
	  echo 'si';
	}else{
	  include "views/inicio.php";
	  echo 'no';
	}
	?>
</main>