<?php

	$Iden=date('U');
?>

<div class="row" style="margin-top: 10px;">
	<div class="col-md-12">
		
		<table class="table table-bordered" style="width: 100%" id="table-iden-<?=$Iden;?>">
			<thead>
				<tr>
				<?php
				if(isset($Thead)){
					foreach ($Thead as $key => $th) {
					echo '<th>'.$th.'</th>';	
					}
				}

				?>	
				</tr>
			</thead>
			<tbody>
				<?php
					if(isset($Tbody)){
						echo $Tbody;
					}
				?>
			</tbody>
		</table>


	</div>
</div>

<script src="<?=base_url();?>assets/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script>
	$(document).ready(function(){
	

		$('#table-iden-<?=$Iden;?>').dataTable({
			language: {
					"decimal": "",
					"emptyTable": "No hay información",
					"info": "Mostrando _START_ de _END_ de _TOTAL_ Entradas",
					"infoEmpty": "Mostrando 0 de 0 of 0 Entradas",
					"infoFiltered": "(Filtrado de _MAX_ total entradas)",
					"infoPostFix": "",
					"thousands": ",",
					"lengthMenu": "Mostrar _MENU_ Entradas",
					"loadingRecords": "Cargando...",
					"processing": "Procesando...",
					"search": "Buscar:",
					"zeroRecords": "Sin resultados encontrados",
					"paginate": {
						"first": "Primero",
						"last": "Ultimo",
						"next": "Siguiente",
						"previous": "Anterior"
					}
				},
			
		});
	})
	$(".select2-hidden-accessible").hide()
</script>
