
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
                 $("#btnGrabaPersona").click(function()
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
                 		url : "../accion/grabaCaptura.php",
                 		type: 'post',
                 		data: $("form").serialize(),
                 		success: function(response)
                 		{
                 			if(response=='ok')
                 			{
                 				$("#modal-mensaje p").html("Persona Agregada");
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
    		<div class="panel-heading">Captura Persona&nbsp; <span class="glyphicon glyphicon-user"></span></div>	
    	<div class=" panel-body">	
        <table class="table table-striped dialog">
            <thead>
                <tr>
                    <th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th>
                </tr>
            </thead>
            <tbody>
            	<tr>
            		<td><input type="text" name="nombre"></td><td><input type="text" name="aPaterno"></td><td><input type="text" name="aMaterno" ></td>
            	</tr>
            	            
            	<tr>
            		<th>Direccion</th>
            	</tr>
            	<tr>
            		<th>Colonia</th><th>Calle</th><th>Numero</th>            	
            	</tr>
            	<tr>
            		<td><input type="text" name="colonia" ></td><td><input type="text" name="calle"></td><td><input type="text" name="numero"></td>
            	</tr>            	            	
            </tbody>
            <tfoot>
            	<tr>
            		<th class="text-center"><input type="button" class="btn xs-btn btn-success" id="btnGrabaPersona" value="Grabar"></th>
            		<th></th>
            		<th class="text-center"><input type="reset" class="btn xs-btn btn-warning" id="btnCancekar" value="Cancelar"></th>
            	</tr>
            </tfoot>
        </table>
        </div>
        </div>
    </form>	
