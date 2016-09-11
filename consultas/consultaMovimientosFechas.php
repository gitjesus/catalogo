<?
	include '../Clases/base.php';
	$objeto=(object)$_GET;
	$base=new base();
	$arr=explode('/',$objeto->fini);
	$del=$arr[2]."-".$arr[1]."-".$arr[0];
	
	$arr=explode('/',$objeto->ffin);
	$al=$arr[2]."-".$arr[1]."-".$arr[0];
	
	
	$consulta="
	SELECT 'pago' as tipo,date_format(fecha,'%d/%m/%Y') as fecha,importe,(select concat(nombre,' ',apellido_paterno,' ',apellido_materno) from persona where id=id_per) as cliente
  FROM pago
 where fecha between '$del' and '$al'
  
  union 
select 'venta' as tipo,date_format(fecha,'%d/%m/%Y') ,total,(select concat(nombre,' ',apellido_paterno,' ',apellido_materno) from persona where id=id_per) as cliente 
from venta_detalle
where
fecha between '$del' and '$al'
order by fecha,tipo
	";
$arr=$base->consultar($consulta);	

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
    					<th>Fecha</th><th>Tipo</th><th>Cliente</th><th>Cargo</th><th>Abono</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?
    			foreach($arr as $mov)
				{
					?>
					<tr>
						<td><?=$mov->fecha?></td><td><?=$mov->tipo?></td><td><?=$mov->cliente?></td>
						<?
							if($mov->tipo=='pago')
								echo "<td></td><td>".number_format($mov->importe,2)."</td>";
							else
								echo "<td>".number_format($mov->importe,2)."</td><td></td>";	
						?>
					</tr>
					
					<?
				}	
    				
    				?>
    			</tbody>
    		</table>
    	</div>
</div>    		