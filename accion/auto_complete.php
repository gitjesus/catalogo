<?php
	include '../Clases/base.php';
	$base=new base();
$term=$_GET["term"];
$arr=array();
$sentencia=" select id,concat(nombre,' ',apellido_paterno,' ',apellido_materno) as label,concat(nombre,' ',apellido_paterno,' ',apellido_materno) as value from persona  where concat(apellido_paterno,' ',apellido_materno,' ',nombre) like '%$term%'";

$arr=$base->consultar($sentencia);

echo json_encode($arr);
?>
