<?
	include '../Clases/base.php';
	$objeto=(object)$_GET;
	$base=new base();
	$arr=explode('/',$objeto->fini);
	$del=$arr[2]."-".$arr[1]."-".$arr[0];
	
	$arr=explode('/',$objeto->ffin);
	$al=$arr[2]."-".$arr[1]."-".$arr[0];
	
	
	$consulta="
	SELECT date_format(fecha,'%d/%m/%Y') as fecha_,
(select concat(nombre,' ',apellido_paterno,' ',apellido_materno) from persona where id=vd.id_per) as nombre,
concat((select nombre from producto where id=vd.id_pro),' x ',cantidad) as observacion
,vd.*
    FROM venta_detalle vd
   WHERE fecha BETWEEN '$del' AND '$al'
ORDER BY fecha;
	";
$arr=$base->consultar($consulta);	
$costo_total=0;
$venta_total=0;
$utilidad_total=0;

?>
<style>
	#dvMovimientoFecha
	{
		width: 75%;
		margin: 5% auto auto auto;
	}
	table
	{
		width: 100%;
	}
</style>
<div class="panel panel-default" id="dvMovimientoFecha">
    		<div class="panel-heading">Movimientos&nbsp; <span class="glyphicon glyphicon-time"></span></div>	
    	<div class=" panel-body">
    		<table class="table table-striped">
    			<thead>
    				<tr>
    					<th>Fecha</th><th>Cliente</th><th>Observacion</th><th class="text-center">Costo</th><th class="text-center">Venta</th><th class="text-center">Utilidad</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?
    			foreach($arr as $mov)
				{
					$costo_total+=$mov->costo;
					$venta_total+=$mov->total;
					$utilidad_total+=($mov->total-$mov->costo);
					?>
					<tr>
						<td><?=$mov->fecha_?></td><td><?=$mov->nombre?></td><td><?=$mov->observacion?></td><td class="text-center"><?=number_format($mov->costo,2)?></td><td class="text-center"><?=number_format($mov->total,2)?></td><td class="text-center"><?=number_format(($mov->total-$mov->costo),2)?></td>

					</tr>
					
					<?
				}	
    				
    				?>
    			</tbody>
    			<tfoot>
    				<tr>
    					<th class="text-left" colspan="3">Total</th><td class="text-center"><?=number_format($costo_total,2)?></td><td class="text-center"><?=number_format($venta_total,2)?></td><td class="text-center"><?=number_format($utilidad_total,2)?></td>
    				</tr>
    			</tfoot>
    		</table>
    	</div>
</div>    		