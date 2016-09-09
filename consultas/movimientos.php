<?
	include '../Clases/base.php';
	$objeto=(object)$_GET;
	$base=new base();

$consulta="select fecha as fecha_,date_format(fecha,'%d/%m/%Y') as fecha,importe,'pago' as tipo, '' as observacion  from pago where id_per=$objeto->id
union
select fecha,date_format(fecha,'%d/%m/%Y'),total,'venta', concat((select nombre from producto where id=id_pro ),' x ',cantidad)as observacion from venta_detalle where id_per=$objeto->id

order by fecha_ asc,tipo desc ;";

$arr=$base->consultar($consulta);
?>
<style>
	.reporte{
		width: 75%;
		margin-bottom: 10%;
		margin-top: 2%;
	}
	
	.reporte table{
		width: 100%;
		margin-top: 0%;
	}
</style>
<div class="panel panel-default reporte">
	<div class="panel-heading">Movimientos</span></div>
<div class=" panel-body">
<table class="table table-striped ">
	<thead>
		<tr>
			<th>Num</th><th>Tipo</th><th>Fecha</th><th class="text-center">Observacion</th><th class="text-right">Cargo</th><th class="text-right">Abono</th>
		</tr>
	</thead>
	<tbody>
		<?
			$count=0;
			$totalVenta=0.00;
			$totalPago=0.00;
			foreach($arr as $value)
			{	
				$count++;
				echo "<tr>";
				echo "	<td>".$count."</td><td>".$value->tipo."</td><td>".$value->fecha."</td><td class='text-center'>".$value->observacion."</td>";
				if($value->tipo=='pago')
				{
					echo "<td></td><td class='text-right'>".number_format($value->importe,2)."</td>";
					$totalPago+=floatVal($value->importe);
					
				}
				else
				{
					echo "<td class='text-right'>".number_format($value->importe,2)."</td><td></td>";	
					$totalVenta+=floatval($value->importe);
				}
					
				echo "</tr>";
			}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th>Total</th><td colspan='3'></td><td class="text-right"><?=number_format($totalVenta,2)?></td><td class="text-right"><?=number_format($totalPago,2)?></td>
		</tr>
		<tr>
			<th>Saldo</th><td colspan='4'></td><td class="text-right"><?=number_format($totalVenta-$totalPago,2)?></td>
		</tr>
	</tfoot>
</table>
</div>
</div>