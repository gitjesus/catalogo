<?php
include '../Clases/base.php';
$objeto=(object)$_POST;

$sentencia="update  direccion set calle='".trim($objeto->calle)."',colonia='".trim($objeto->colonia)."',numero='".trim($objeto->numero)."' where id_dir=$objeto->id_dir";

$base= new base();
if($base->ejecutar($sentencia))
{
	
	$sentencia="update persona set nombre='".trim($objeto->nombre)."', apellido_paterno='".trim($objeto->aPaterno)."', apellido_materno='".trim($objeto->aMaterno)."' where id=$objeto->id_per";
	if($base->ejecutar($sentencia))
	{
		echo "ok";
	}
	else {
		echo "ok";
	}
}

?>
