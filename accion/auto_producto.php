<?php
	include '../Clases/base.php';
	$base=new base();
$term=$_GET["term"];
$arr=array();
$sentencia=" select id,nombre as label,nombre as value, precio,costo from producto  where nombre like '%$term%'";

$arr=$base->consultar($sentencia);

echo json_encode($arr);
?>
