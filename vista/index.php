<html>
	<head>
		<link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" />
        <link href="../js/jquery-ui/jquery-ui.css" rel="stylesheet" />
        
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../css/bootstrap/js/bootstrap.js"></script>
        <script src="../js/jquery-ui/jquery-ui.min.js"></script>
        <style>
        	.btn-group
        	{
        		margin: 2% auto auto auto;
        	}
        	
        	#menu
        	{
        		width: auto;
        		margin : auto;
        	}
        	
        	#modal-mensaje{
        		margin: 10% auto;
        	}
        </style>
        <script>
        	$(function()
        	{
        		
        	  $('#contenido').on('keydown', '.numero', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
	
        		$("#menu ul li a").click(function(e)
        	{
        		e.preventDefault();
        	
        		$("#contenido").load( $(this).attr("destino")+".php" );	
        	});	
        	/*
        	$("#modal-mensaje").on('hide.bs.modal', function (event) {
						 $("#contenido").html("");
						});
			*/			
			$("#btnReporte").click(function()
			{
				
				$("#contenido").load("reporte.php");
			});
        	});
        </script>
    </head>
	<body>    
	<!-- Single button -->
<div id='menu'>	
<div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <span class="glyphicon glyphicon-user"></span> &nbsp;Persona <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#" destino="captura">Captura</a></li>
    <li><a href="#" destino="actualizaP">Actualizar</a></li>
    <li><a href="#" destino="asociaPago">Agrega Pago</a></li>
	<li><a href="#" destino="asociaProducto">Agrega Compra</a></li>
  </ul>
</div>
 <div class="btn-group"> 
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="glyphicon glyphicon-tag"></span> &nbsp;Producto <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#" destino="capturaProducto">Captura</a></li>
    <li><a href="#" destino="catalogo">Catalogo</a></li>
  </ul>
</div>
<div class="btn-group"> 
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="glyphicon glyphicon-tag"></span> &nbsp;Reporte <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#" destino="reporte">Cliente</a></li>
    <li><a href="#" destino="reporteFechas">Fechas</a></li>
    <li><a href="#" destino="utilidadFechas">utilidad</a></li>
  </ul>
</div>

</div>
<div class="modal info fade" id="modal-mensaje">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Mensaje</h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="contenido">
	
</div>
	</body>
	
</html>