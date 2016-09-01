
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
              	
              		$("#fechaPago").datepicker(
              		{
              			dateFormat: "yy-mm-dd"
              		}
              		);	
              		
                      $( "#nombrePersona" ).autocomplete({
					      source: "../accion/auto_complete.php",
					      minLength: 4,
					      select: function( event, ui ) {
					      id=ui.item.id;
					      $.ajax(
					  			{
					  				url: "../consultas/consultaPersonaPro.php",
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
					   
					   
					  $('#myModal').on('hide.bs.modal',function()
					  {
					  		$("#fechaPago").val("");
					  		$("#importePago").val("");
					  });
					   
					   
					  $('#myModal').on('show.bs.modal', function (event) {
						  var button = $(event.relatedTarget); // Button that triggered the modal
						  id = button.data('id'); // Extract info from data-* attributes
						  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						  /*
						  modal.find('.modal-title').text('New message to ' + recipient)
						  modal.find('.modal-body input').val(recipient)
						  */
						 
						});
						 
						 
					  $("#btnBuscarPersona").click(function()
					  {
					  		$.ajax(
					  			{
					  				url: "../consultas/consultaPersonaPro.php",
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
   