<?
$result=mysql_db_query($base,"SELECT * FROM envios WHERE id = 1");
$row=mysql_fetch_array($result);

if($row['ultimo']==1){
	$num_email = 2;
}
else{
	$num_email = 1;	
}
	
$MailTo = $emails_consultas[$num_email];

mysql_free_result ($result);

mysql_db_query($base,"UPDATE envios SET ultimo = '".$num_email."' WHERE id = '1'") or die ('No se pudo modificar el último');
?>