<?
	include_once 'inc/conexion.php';
	include_once 'inc/funciones.php';
	include_once 'inc/listas.php';
	
	header('Content-type: application/xml');
?>
<?='<?xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url><loc>http://www.nyr.com.uy/</loc><changefreq>weekly</changefreq><priority>1.00</priority></url>
<url><loc>http://www.nyr.com.uy/inicio</loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<url><loc>http://www.nyr.com.uy/quienes-somos</loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<url><loc>http://www.nyr.com.uy/locales</loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<? 
//Categorias
foreach($secciones as $sid => $snom){
if($totales_s[$sid]>0){  
if(!empty($cates_list[$sid]) ){ 
foreach($cates_list[$sid] as $cid=>$cnom ){
if(isset($totales[$cid]) && $totales[$cid]>0){
if(empty($subcates_list[$cid])){ ?>
<url><loc><?=$url?>productos/<?=Tit($snom)?>/<?=$cid?>/<?=Tit($cnom)?></loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<? }

if(!empty($subcates_list[$cid])  && isset($totales[$cid]) && $totales[$cid]>0){
foreach($subcates_list[$cid] as $scid=>$scnom ){
if(isset($totales[$scid])){?>
<url><loc><?=$url?>productos/<?=Tit($snom)?>/<?=Tit($cnom)?>/<?=$scid?>/<?=Tit($scnom)?></loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<? }
} 
}
}

}
}
}
}
//Productos
$productos=mysql_db_query($base,"SELECT * FROM productos WHERE outlet = 0 ORDER BY nombre_ord ASC, orden ASC");
while($producto=mysql_fetch_array($productos)){
?>
<url><loc>http://www.nyr.com.uy/producto/<?=$producto['id']?>/<?=Tit($producto['nombre'])?></loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<?		
}
mysql_free_result($productos);

//Ofertas
foreach($ofertas as $id_of=>$tit_of){
?>
<url><loc>http://www.nyr.com.uy/oferta/<?=$id_of?>/<?=Tit($tit_of)?></loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<?		
//Productos Ofertas
$productos_of = mysql_db_query($base,"SELECT * FROM productos WHERE oferta = $id_of ORDER BY nombre_ord ASC, orden ASC");
while($producto_of = mysql_fetch_array($productos_of)){ 
?>
<url><loc>http://www.nyr.com.uy/oferta/<?=$id_of?>/<?=$producto_of['id']?>/<?=Tit($producto_of['nombre'])?></loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<? }
mysql_free_result($productos_of);
}



?>
<url><loc>http://www.nyr.com.uy/nacionales</loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<?
//Nacionales
$sql = "SELECT * FROM productos WHERE dispo = 0 AND outlet = 0 ORDER BY nombre_ord ASC, orden ASC";

$result = mysql_db_query($base,$sql);
while($row=mysql_fetch_array($result)){ 
?>
<url><loc>http://www.nyr.com.uy/nacionales/<?=$row['id']?>/<?=Tit($row['nombre'])?></loc><changefreq>weekly</changefreq><priority>0.69</priority></url>        
<? }
?>
<url><loc>http://www.nyr.com.uy/importados</loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<?
//Importados
mysql_free_result($result);

$sql = "SELECT * FROM productos WHERE dispo = 1 AND outlet = 0 ORDER BY nombre_ord ASC, orden ASC";

$result = mysql_db_query($base,$sql);
while($row=mysql_fetch_array($result)){ 
?>
<url><loc>http://www.nyr.com.uy/importados/<?=$row['id']?>/<?=Tit($row['nombre'])?></loc><changefreq>weekly</changefreq><priority>0.69</priority></url>        
<? }
mysql_free_result($result);

?>
<url><loc>http://www.nyr.com.uy/outlet</loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<? 
//Outlet
$sql = "SELECT * FROM productos WHERE outlet = 1 ORDER BY nombre_ord ASC, orden ASC";
$result = mysql_db_query($base,$sql);
while($row=mysql_fetch_array($result)){ 
?>
<url><loc>http://www.nyr.com.uy/outlet/<?=$row['id']?>/<?=Tit($row['nombre'])?></loc><changefreq>weekly</changefreq><priority>0.85</priority></url>
<? 			}
mysql_free_result($result);	
?>
</urlset>
 
