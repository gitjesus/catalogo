<?php
include '../Clases/base.php';
$objeto=(object)$_POST;

$sentencia="update producto  set nombre='".trim($objeto->nombre)."',descripcion='".trim($objeto->descripcion)."',costo=".trim($objeto->costo).",precio=".trim($objeto->precio)." where id=$objeto->id_pro";

$base= new base();
if($base->ejecutar($sentencia))
{
	echo "ok";	
}

?>