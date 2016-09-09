<?
	include '../Clases/base.php';
	$objeto=(object)$_GET;
	$base=new base();
	$consulta="select per.*,dir.*,date_format(fecha_registro,'%d/%m/%Y') as fechaf from persona per join direccion dir on  per.id_dir=dir.id_dir where id=$objeto->id";

	$arr=$base->consultar($consulta);
	$persona=$arr[0];
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
                 $("#btnActualizaPersona").click(function()
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
                 		url : "../accion/actualizaPersona.php",
                 		type: 'post',
                 		data: $("form").serialize(),
                 		success: function(response)
                 		{
                 			if(response=='ok')
                 			{
                 				$("#modal-mensaje p").html("Persona Actualizada");
                 				$("#modal-mensaje").modal("show");
                 				$("#contenido").html("");
                 			}	
                 		}
                 	});
                 }); 
              });
        </script>

    <form>
    	<input type="hidden" name="id_per" value="<?=$persona->id?>">
    	<input type="hidden" name="id_dir" value="<?=$persona->id_dir?>">
    	<div class="panel panel-default">
    		<div class="panel-heading">Actualiza Persona&nbsp; <span class="glyphicon glyphicon-user"></span></div>	
    	<div class=" panel-body">	
        <table class="table table-striped dialog">
            <thead>
                <tr>
                    <th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th>
                </tr>
            </thead>
            <tbody>
            	<tr>
            		<td><input type="text" name="nombre" value="<?=$persona->nombre?>"></td><td><input type="text" name="aPaterno" value="<?=$persona->apellido_paterno?>"></td><td><input type="text" name="aMaterno"  value="<?=$persona->apellido_materno?>"></td>
            	</tr>
            	            
            	<tr>
            		<th>Direccion</th>
            	</tr>
            	<tr>
            		<th>Colonia</th><th>Calle</th><th>Numero</th>            	
            	</tr>
            	<tr>
            		<td><input type="text" name="colonia"  value="<?=$persona->colonia?>"></td><td><input type="text" name="calle" value="<?=$persona->calle?>"></td><td><input type="text" name="numero" value="<?=$persona->numero?>"></td>
            	</tr>            	            	
            </tbody>
            <tfoot>
            	<tr>
            		<th class="text-center"><input type="button" class="btn xs-btn btn-success" id="btnActualizaPersona" value="Actualizar"></th>
            		<th></th>
            		<th class="text-center"><input type="reset" class="btn xs-btn btn-warning" id="btnCancekar" value="Cancelar"></th>
            	</tr>
            </tfoot>
        </table>
        </div>
        </div>
    </form>	
