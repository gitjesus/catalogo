<?
	include '../Clases/base.php';
	$base=new base();
	$consulta="select * from producto order by nombre";

	$arr=$base->consultar($consulta);
	$productos=array();
	foreach($arr as $producto)
	{
		
		$indice=substr($producto->nombre,0,1);
		$productos[strtoupper($indice)][]=$producto;	
	}
?>	
<script>
	$(".btnActualizaProducto").click(
		function()
		{
			var id_pro=$(this).attr("id_pro");
			$("#contenido").load("actualizaProducto.php?id_pro="+id_pro);
		}
	);
</script>
<style>
	#dvCatalogo
	{
		width: 75%;
		margin: 5% auto auto auto;
	}
</style>
<div class="panel panel-default" id="dvCatalogo">
    		<div class="panel-heading">Catalogo Productos</div>	
    	<div class=" panel-body">
    		<table class="table">
    			<thead>
    				<tr>
    					<th>Letra</th><th>Nombre</th><th class="text-center">Descripcion</th><th class="text-right">Costo</th><th class="text-right">Precio</th><th class="text-right">Ganancia</th><th class="text-right">Editar</th>
    				</tr>
    			</thead>
			<?
				foreach($productos as $key => $value)
				{
			?>
				<tr>
					<th><?=$key?></th>
				</tr>
			<?		
					foreach($value as $producto)
					{
			?>
					<tr>
						<td></td><td><?=$producto->nombre?></td><td class="text-center"><?=$producto->descripcion?></td><td class="text-right"><?=number_format($producto->costo,2)?></td><td class="text-right"><?=number_format($producto->precio,2)?></td><td class="text-right"><?=number_format(($producto->precio-$producto->costo),2)?></td><td class="text-right"><input type='button' class="btn btn-success btnActualizaProducto" value='Editar' id_pro="<?=$producto->id?>"> </td>
					</tr>
			<?			
					}
				}
			?>
			</table>
    	</div>
</div>    	
    		

