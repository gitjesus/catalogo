<?
		include '../Clases/base.php';
	$objeto=(object)$_GET;
	$base=new base();
	$consulta="select * from producto where id=$objeto->id_pro";

	$arr=$base->consultar($consulta);
	$producto=$arr[0];
	
?>
        <style>
            .table
            {
                width: auto;
                margin: auto;
            }
            
            .panel-default
            {
            	width: 45%;
            	margin: 5% auto auto auto;
            }
            
            h1{
            	width: 25%;
            }
        </style>
        
        <script>
            $(function()
              {
                 $("#btnActualizaProducto").click(function()
                 {
                 	
                 	var validar=true;
                 	$("form input").each(
                 		function(i,e)
                 		{
                 			if($(e).val()=="")
                 			{
                 				validar=false;
                 				return false;
                 			}		
                 		}
                 	);
                 	
                 	if(!validar)
                 	{
                 		$("#modal-mensaje p").html("Favor de llenar todos los campos");
                 		$("#modal-mensaje").modal("show");
                 		return false;
                 	}

                 	//console.log($("form").serialize());
                 	$.ajax({
                 		url : "../accion/actualizaProducto.php",
                 		type: 'post',
                 		data: $("form").serialize(),
                 		success: function(response)
                 		{
                 			if(response=="ok")
                 			{
                 				$("#modal-mensaje p").html("Producto Actualizado");
                 				$("#modal-mensaje").modal("show");
                 				$("#contenido").html("");
                 			}
                 		}
                 	});
                 }); 
              });
        </script>

    <form>
    	<input type="hidden" name="id_pro" value="<?=$producto->id?>">
    	<div class="panel panel-default">
    		<div class="panel-heading">Actualiza Producto&nbsp; <span class="glyphicon glyphicon-tag"></span></div>	
    	<div class=" panel-body">	
        <table class="table table-striped dialog">
            <tbody>
                <tr>
                    <th>Nombre</th>
            		<td><input type="text" name="nombre" size="50" value="<?=$producto->nombre?>"></td>
            	</tr>
            	            

            	
            	            	<tr>
            		<th>Descripcion</th>


            		<td><textarea cols="50" rows="10" name="descripcion" value="<?=$producto->descripcion?>"></textarea></td>
            	</tr>   
            	            	<tr>
            		<th>costo</th>


            		<td><input type="text" name="costo" class="numero" size="20" value="<?=$producto->costo?>"></td>
            	</tr> 
            	<tr>
            		<th>Precio</th>


            		<td><input type="text" name="precio" class="numero" size="20" value="<?=$producto->precio?>"></td>
            	</tr>              	            	
            </tbody>
            <tfoot>
            	<tr>
            		<th class="text-left"><input type="button" class="btn xs-btn btn-success" id="btnActualizaProducto" value="Actualizar"></th>
            		<th class="text-right"><input type="reset" class="btn xs-btn btn-warning" id="btnCancelar" value="Cancelar"></th>
            	</tr>
            </tfoot>
        </table>
        </div>
        </div>
    </form>	
