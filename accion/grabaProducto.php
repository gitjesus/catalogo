<?php
include '../Clases/base.php';
$objeto=(object)$_POST;

$sentencia="insert into producto  values(null,'".trim($objeto->nombre)."','".trim($objeto->descripcion)."',".trim($objeto->costo).",".trim($objeto->precio).")";

$base= new base();
if($base->ejecutar($sentencia))
{
	echo "ok";	
}

?>