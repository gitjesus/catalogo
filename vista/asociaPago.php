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
         $.datepicker.regional['es'] = {
			 closeText: 'Cerrar',
			 prevText: '<Ant',
			 nextText: 'Sig>',
			 currentText: 'Hoy',
			 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			 weekHeader: 'Sm',
			 dateFormat: 'dd/mm/yy',
			 firstDay: 1,
			 isRTL: false,
			 showMonthAfterYear: false,
			 yearSuffix: ''
			 };
			 $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function()
              {
              	var id=0;
              	
              		$("#fechaPago").datepicker();	
              		
                      $( "#nombrePersona" ).autocomplete({
					      source: "../accion/auto_complete.php",
					      minLength: 4,
					      select: function( event, ui ) {
					      id=ui.item.id;
					      $.ajax(
					  			{
					  				url: "../consultas/consultaPersona.php",
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
					   
					   /*
					  $('#myModal').on('hide.bs.modal',function()
					  {
					  		$("#fechaPago").val("");
					  		$("#importePago").val("");
					  });
					   
					   */
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
					  				url: "../consultas/consultaPersona.php",
					  				type: "post",
					  				data: { busqueda: $("#nombrePersona").val()},
					  				success: function(response)
					  				{
					  					$("#resultado").html(response);
					  				}
					  			}
					  		);
					  }); 
					  
					  $("#btnGuardarPago").click(function()
					 {
					 	$.ajax(
					 	{
					 		url: '../accion/grabaPago.php',
					 		type: 'post',
					 		data: { id: id, fecha: $("#fechaPago").val(),importe: $("#importePago").val()},
					 		success: function(response)
					 		{
					 			if(response=='ok')
					 				
					 				$('#myModal').modal('hide');
					 				$("#modal-mensaje p").html("Pago Agregado");
                 				$("#modal-mensaje").modal("show");
                 				
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
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Pago</h4>
      </div>
      <div class="modal-body">
       	<table class="table striped-table">
       		<tr>
       			<th>fecha</th><td><input type='text' id="fechaPago" ></td>
       		</tr>
       		<tr>
       			<th>importe</th><td><input type='text' id="importePago" class="numero" /></td>
       		</tr>
       	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarPago">Guardar Pago</button>
      </div>
    </div>
  </div>
</div>
    
    <div id="resultado">
    	
    </div>	
    