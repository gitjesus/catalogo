<script>
	$(function()
	{
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
		$("#txtDel").datepicker();
		$("#txtAl").datepicker();
		$("#txtDel").change(
			function()
			{
				var valor=$(this).val();
				$("#txtAl").datepicker('option','minDate',valor);
			}
		);
		
		$("#btnReporteFecha").click(function()
		{
			var ini=$("#txtDel").val();
			var fin=$("#txtAl").val();
			$("#contenido").load("../consultas/consultaMovimientoUtilidad.php?fini="+ini+"&ffin="+fin);
		});
	});
</script>
<style>
		#dvReporteFechas
	{
		width: 35%;
		margin: 5% auto auto auto;
	}
</style>
<div class="panel panel-default" id="dvReporteFechas">
    		<div class="panel-heading">Reporte utilidad por fechas</div>	
    	<div class=" panel-body">
    		<table class="table">
    			<thead>
    				<tr>
    					<th>Inicio</th><td><input type='text' id='txtDel' name='fini'></td><th>Fin</th><td><input type='text' id='txtAl' name='fal'></td>
    				</tr>
    				<tr>
    					<td colspan="4" class="text-center"><input type='button' class='btn btn-success' value='Buscar' id="btnReporteFecha"></td>
    				</tr>
    			</thead>
    		</table>
    	</div>
</div>    		