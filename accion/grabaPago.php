<?php
include '../Clases/base.php';
$objeto=(object)$_POST;

$arr=explode( "/", $objeto->fecha);
$objeto->fecha_=$arr[2]."-".$arr[1]."-".$arr[0];

$sentencia="insert into pago values(null,'{$objeto->fecha_}',$objeto->importe,$objeto->id)";

$base= new base();
if($base->ejecutar($sentencia))
{
		echo "ok";
}
?>