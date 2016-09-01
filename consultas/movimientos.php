<?
	include '../Clases/base.php';
	$objeto=(object)$_GET;
	$base=new base();

$consulta="select  fecha,importe,'pago' as tipo  from pago where id=$objeto->id
union
select fecha,total,'venta' from venta_detalle where id_per=$objeto->id

order by fecha asc,tipo desc ;";
$arr=$base->consultar($consulta);
?>
<table class="table table-stripeds">
	<thead>
		<tr>
			<th>Num</th><th>Tipo</th><th>Fecha</th><th>Cargo</th><th>Abono</th>
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
				echo "	<td>".$count."</td><td>".$value->tipo."</td><td>".$value->fecha."</td>";
				if($value->tipo=='pago')
				{
					echo "<td></td><td>".$value->importe."</td>";
					$totalPago+=floatVal($value->importe);
					
				}
				else
				{
					echo "<td>".$value->importe."</td><td></td>";	
					$totalVenta+=floatval($value->importe);
				}
					
				echo "</tr>";
			}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th>Total</th><td></td><td></td><td><?=number_format($totalVenta,2)?></td><td><?=number_format($totalPago,2)?></td>
		</tr>
	</tfoot>
</table>