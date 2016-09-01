<?php
include '../Clases/base.php';
$objeto=(object)$_POST;

$sentencia="insert into pago values(null,'$objeto->fecha',$objeto->importe,$objeto->id)";

$base= new base();
if($base->ejecutar($sentencia))
{
		echo "ok";
}
?>