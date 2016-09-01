
        <style>
            .panel-default
            {
            	width: 45%;
            	margin: 5% auto auto auto;
            }
            .table
            {
                width: auto;
                margin:auto;
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
              	var id=0;
              	
              		
              		
                      $( "#nombrePersona" ).autocomplete({
					      source: "../accion/auto_complete.php",
					      minLength: 4,
					      select: function( event, ui ) {
					      id=ui.item.id;
					      $.ajax(
					  			{
					  				url: "../consultas/consultaPersonaRepo.php",
					  				type: "post",
					  				data: { id: id},
					  				success: function(response)
					  				{
					  					$("#resultado").html(response);
					  				}
					  			}
					  		); 
					      }
					    });
					   
					
						 
					  $("#btnBuscarPersona").click(function()
					  {
					  		$.ajax(
					  			{
					  				url: "../consultas/consultaPersonaRepo.php",
					  				type: "post",
					  				data: { busqueda: $("#nombrePersona").val()},
					  				success: function(response)
					  				{
					  					$("#resultado").html(response);
					  				}
					  			}
					  		);
					  }); 

              });
        </script>

    <div class="panel panel-default">	
    	<div class="panel-heading">Busqueda Persona</div>
    	<div class="panel-body">
    	<table class="table striped-table">
    		<tr>
    			<th>Nombre </th><td><input type='text' name='nombrePersona' id='nombrePersona' size="50"></td><td><input class="btn btn-success" type='button' value="Buscar" id="btnBuscarPersona"></td>
    		</tr>
    	</table>
    	</div>
    </div>	
    
  
    
    <div id="resultado">
    	
  </div>  