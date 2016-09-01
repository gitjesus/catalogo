<?php
include '../Clases/base.php';
$base=new base();

$objeto=(object)$_POST;
#print_r($objeto);

foreach($objeto->producto as $key => $value)
{
	$sentencia="insert into venta_detalle values(null,$objeto->id,{$objeto->producto[$key]},{$objeto->cantidad[$key]},now(),{$objeto->total[$key]})";
	$base->ejecutar($sentencia);
}
echo "ok";
/*
$sentencia="insert into pago values(null,'$objeto->fecha',$objeto->importe,$objeto->id)";

$base= new base();
if($base->ejecutar($sentencia))
{
		echo "ok";
}
 * 
 */
?>