<?
	include '../Clases/base.php';
	$objeto=(object)$_GET;
	$base=new base();
	$consulta="select per.*,dir.*,date_format(fecha_registro,'%d/%m/%Y') as fechaf from persona per join direccion dir on  per.id_dir=dir.id_dir where id=$objeto->id";

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
        		$.ajax(
        			{
        				url: '../consultas/movimientos.php?id=<?=$persona->id?>',
        				success: function(response)
        				{
        					$("#resultadoMovs").html(response);
        				}
        			}
        		);
        	});
        </script>
<div class="panel panel-default">	
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre:</th><td nowrap=""><?=$persona->nombre." ".$persona->apellido_paterno." ".$persona->apellido_materno?></td>
		</tr>
		<tr>
			<th>Direccion</th><td nowrap=""><?=$persona->colonia." ".$persona->calle." ".$persona->numero?></td>
		</tr>
		<tr>
			<th nowrap="">Fecha Captura</th><td><?=$persona->fechaf?></td>
		</tr>
	</thead>
</table>
</div>
<div id="resultadoMovs">
	
</div>
