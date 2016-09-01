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
                 $("#btnGrabaProducto").click(function()
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
                 		url : "../accion/grabaProducto.php",
                 		type: 'post',
                 		data: $("form").serialize(),
                 		success: function(response)
                 		{
                 			if(response=="ok")
                 			{
                 				$("#modal-mensaje p").html("Producto Agregada");
                 				$("#modal-mensaje").modal("show");
                 				$("#contenido").html("");
                 			}
                 		}
                 	});
                 }); 
              });
        </script>

    <form>
    	<div class="panel panel-default">
    		<div class="panel-heading">Captura Producto&nbsp; <span class="glyphicon glyphicon-tag"></span></div>	
    	<div class=" panel-body">	
        <table class="table table-striped dialog">
            <tbody>
                <tr>
                    <th>Nombre</th>
            		<td><input type="text" name="nombre" size="50"></td>
            	</tr>
            	            

            	
            	            	<tr>
            		<th>Descripcion</th>


            		<td><textarea cols="50" rows="10" name="descripcion"></textarea></td>
            	</tr>   
            	            	<tr>
            		<th>costo</th>


            		<td><input type="text" name="costo" class="numero" size="20"></td>
            	</tr> 
            	<tr>
            		<th>Precio</th>


            		<td><input type="text" name="precio" class="numero" size="20"></td>
            	</tr>              	            	
            </tbody>
            <tfoot>
            	<tr>
            		<th class="text-left"><input type="button" class="btn xs-btn btn-success" id="btnGrabaProducto" value="Grabar"></th>
            		<th class="text-right"><input type="reset" class="btn xs-btn btn-warning" id="btnCancelar" value="Cancelar"></th>
            	</tr>
            </tfoot>
        </table>
        </div>
        </div>
    </form>	
