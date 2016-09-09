<?
	include '../Clases/base.php';
	$base=new base();
	$objeto=(object)$_POST;
	
	if(isset($objeto->id))
	{
		$consulta="select id,concat(nombre,' ',apellido_paterno,' ',apellido_materno) as nombre ,concat(colonia,' ',calle,' ',numero) as direccion from persona per join direccion dir on per.id_dir=dir.id_dir where id=$objeto->id order by id";
	}
	else {
		$consulta="select id,concat(nombre,' ',apellido_paterno,' ',apellido_materno) as nombre ,concat(colonia,' ',calle,' ',numero) as direccion from persona per join direccion dir on per.id_dir=dir.id_dir where concat(nombre,' ',apellido_paterno,' ',apellido_materno) like '%$objeto->busqueda%' order by id";
	}
	
	$arr=$base->consultar($consulta);
	if($arr)
	{
?>
<script>
	$(function()
	{
		$(".btnActualizaPersona").click(
			function()
			{
				var id=$(this).attr("data-id");
				$("#contenido").load("actualizaPersona.php?id="+id);
			}
		);
	});
</script>
<div id="resultadoPersona" class="panel panel-default">
    		<table class="table striped-table">
    			<thead>
    				<tr>
    					<th>ID</th><th>Nombre</th> <th>Direccion</th> <th>  Accion  </th>
    				</tr>
    			</thead>
    			<tbody>
    			<?
    				foreach($arr as $persona)
					{
    			?>
    				<tr>
    					<td><?=$persona->id?></td><td class="text-left" nowrap><?=$persona->nombre?></td><td nowrap><?=$persona->direccion?></td><td><input type="button"  value="Actualizar Persona" class="btn btn-info btn-sm btnActualizaPersona"  data-id="<?=$persona->id?>" /></td>
    					
    				</tr>
    			
    			<?
					}
    			?>	
    			</tbody>
    		</table>
</div>
<?
	}
?>