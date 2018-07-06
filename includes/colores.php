
<? 
// COLORES
$nombreColor = array(
	1 => 'c3d53e',
	2 => 'a7c800', 
	3 => '83bf00', 
	4 => '3bbf9a',
	5 => '00b8ae', 
	6 => '00c5ee', 
	7 => 'beb7d9', 
	8 => 'c6a0ca', 
	9 => 'e096c1', 
	10 => 'ff7dae', 
	11 => 'ff9633', 
	12 => 'ffb432', 
	13 => 'ffcf2f', 
);

$colorHex = array(
	$nombreColor[1] => '#c3d53e',
	$nombreColor[2] => '#a7c800', 
	$nombreColor[3] => '#83bf00',
	$nombreColor[4] => '#3bbf9a',
	$nombreColor[5] => '#00b8ae',
	$nombreColor[6] => '#00c5ee',
	$nombreColor[7] => '#beb7d9',
	$nombreColor[8] => '#c6a0ca',
	$nombreColor[9] => '#e096c1',
	$nombreColor[10] => '#ff7dae',
	$nombreColor[11] => '#ff9633',
	$nombreColor[12] => '#ffb432',
	$nombreColor[13] => '#ffcf2f',
);

$color = $nombreColor[5]; 
?>

<style>

/* COLORES - <?="Actual: ".$color." ".$colorHex[$color]."\n"; ?>
*******************************************************/


/* textos */
.tx-<?=$color ?>, 
.tx-<?=$color ?> .current,
.slide-tabs .item:hover,
.prev-pro:hover, 
.next-pro:hover{
	color:<?=$colorHex[$color]?> !important;
}




/* backgrounds */
.bg-<?=$color ?>,
.slide-noti .owl-dot.active{
	background-color:<?=$colorHex[$color]?>;
}




/* border */
.border-<?=$color ?>,
.border-<?=$color ?> .current,
.slide-tabs .item:hover{
	border-color:<?=$colorHex[$color]?> !important;
}


</style>
