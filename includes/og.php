<? 
	$tabla=$pg=='calendario' ? 'actividades' : 'noticias';
	$link=$pg=='calendario' ? idioma($lg,'actividad','activity') : (isset($se) ? Tit($secciones[$se]).'/' : '').idioma($lg,'noticia','new');
	$query=mysql_db_query($base,"SELECT * FROM $tabla WHERE id = $id");
	$og_data=mysql_fetch_array($query);
	
?>

<meta property="og:site_name" content="<?=idioma($lg,'Colegio Stella Maris','Stella Maris College')?>" />
<meta name="title" content="<?=$og_data['tit_'.$lg]?>"/>
<meta property="og:title" content="<?=$og_data['tit_'.$lg]?>" />
<meta name="description" content="<?=$og_data['cope_'.$lg]?>"/> 
<meta property="og:description" content="<?=$og_data['cope_'.$lg]?>" />

<meta property="og:type" content="article" />
<meta property="og:locale" content="<?=$lg?>_<?=strtoupper($lg)?>" />
<meta property="og:url" content="<?=$url.$lg.'/'.$link.'/'.Tit($og_data['tit_'.$lg])?>" />
<? 
	if($pg=='calendario'){
		$foto=check_file($ruta_actividades.$id.'_1.jpg',true);
	}else{
		$fotos=mysql_db_query($base,"SELECT * FROM fotos_noti WHERE rel = $id ORDER BY orden ASC LIMIT 1");
		$f=mysql_fetch_array($fotos);
		$foto=check_file($ruta_noticias.$f['id'].'.jpg',true);
	}
	
	if($foto){
		$size=GetImageSize(preg_replace('/\?([0-9]+)/','',$foto));
?>

<meta property="og:image" content="<?=$url.$foto?>" />
<meta property="og:image:width" content="<?=$size[0]?>" />
<meta property="og:image:height" content="<?=$size[1]?>" />
<? 
	}
?>
<meta property="twitter:card" content="summary"/>