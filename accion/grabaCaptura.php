<?php
include '../Clases/base.php';
$objeto=(object)$_POST;

$sentencia="insert into direccion(calle,colonia,numero) values('".trim($objeto->calle)."','".trim($objeto->colonia)."','".trim($objeto->numero)."')";

$base= new base();
if($base->ejecutar($sentencia))
{
	$dir_id=mysql_insert_id();
	$sentencia="insert into persona values(null,'".trim($objeto->nombre)."','".trim($objeto->aPaterno)."','".trim($objeto->aMaterno)."',now(),$dir_id)";
	if($base->ejecutar($sentencia))
	{
		echo "ok";
	}
}

?>