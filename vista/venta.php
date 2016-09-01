<?
	include '../Clases/base.php';
	$objeto=(object)$_GET;
	$base=new base();
	$consulta="select * from persona where id=$objeto->id";
	$arr=$base->consultar($consulta);
	$persona=$arr[0];
?>

        <style>
            .panel-default
            {
            	width: 45%;
            	margin: 5% auto auto auto;
            }
            .table
            {
                width: 50%;
                margin:5% auto auto auto;
            }
            h1{
            	width: 25%;
            }
            
            #resultadoPersona
            {
            	width: 60%;
            } 
            
            .modal-dialog{
     
            	margin: 15% auto auto auto	;
            }   
        </style>

        <script>
        	$(function()
        	{
        		var producto=null;
        		$( "#autoProducto" ).autocomplete({
					      source: "../accion/auto_producto.php",
					      minLength: 3,
					      select: function( event, ui ) {
					      	producto=ui.item;
					      id=ui.item.id;
					      	$("#tdPrecio").text(ui.item.precio);
					      }
					    });
				$("#addProducto").click(function()
				{
					var total=parseFloat($("#cantidad").val())*parseFloat(producto.precio);
					$("#productos").prepend("<tr class='trProducto'><td>"+producto.value+"<input type='hidden' name='producto[]' value='"+producto.id+"'></td><td class='text-center'>"+producto.precio+"</td><td class='text-center'>"+$("#cantidad").val()+"<input type='hidden' name='cantidad[]' value='"+$("#cantidad").val()+"'></td><td class='text-center'>"+total+"<input type='hidden' name='total[]' value='"+total+"' ></td></tr>");
					producto=null;
					$("#autoProducto").val("");
					$("#tdPrecio").text("");
					$("#cantidad").val(1);
				});
				
				$("#btnGuardarVenta").click(
					function()
					{
						if($(".trProducto").length==0)
						{
							$("#modal-mensaje p").html("Favor de agregar al menos un articulo");	
								$("#modal-mensaje").modal("show");
							return false;
						}
						 
						$.ajax({
							url: "../accion/grabaVenta.php",
							data: $("form").serialize(),
							type: 'post',
							success: function(response)
							{
								$("#modal-mensaje p").html("Venta Agregada");	
								$("#modal-mensaje").modal("show");
								$("#contenido").html("");	
							}
						});
					}
				);
        	});
        </script>

    <form id="formVenta">
    	<input type="hidden" name="id" value="<?=$objeto->id?>">
    	<table class="table table-striped">
    	<thead>
    		<tr>
    			<th>Cliente: &nbsp; <?=$persona->nombre." ".$persona->apellido_paterno." ".$persona->apellido_materno?></th>	
    		</tr>
    		
    		
    		<tr>
    			<th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th>
    		</tr>
    	</thead>
    	<tbody id="productos">
    		<tr>
    			<td><input type="text" size='40' id="autoProducto"></td><td id='tdPrecio' class="text-center">&nbsp;</td><td class="text-center"><input type='text' class="text-center numero" size="3" id='cantidad' value="1" ></td><td class="text-center"><span id="addProducto" class=" 	glyphicon glyphicon-plus"></span></td>
    		</tr>
    	</tbody>
    	<thead>
    		<tr>
    			<td colspan="4" class="text-right"><input type='button' value='guardar' class="btn btn-success" id="btnGuardarVenta"></td>
    		</tr>
    	</thead>	
    	</table>
    	</form>	
