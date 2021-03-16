$(document).ready(function() {
				$('#example').DataTable({
					"pagingType": "full_numbers",
					"order": [[ 0, "asc" ]],
					"language": {
						"lengthMenu": "Mostar _MENU_ registros por pagina",
						"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No se encuentran Item",
						"sZeroRecords": "<p class='alert alert-info'>No se encontraron Item para ese nombre</p>",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"search": "Buscar:",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior",
							"first":       "Primera",
							"last":       "Ultima",
						},
					}
				});
				
				
				
				$('#example2').DataTable({
					"pagingType": "full_numbers",
					"order": [[ 0, "asc" ]],
					"language": {
						"lengthMenu": "Mostar _MENU_ registros por pagina",
						"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No se encuentran Item",
						"sZeroRecords": "<p class='alert alert-info'>No se encontraron Item para ese nombre</p>",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"search": "Buscar:",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior",
							"first":       "Primera",
							"last":       "Ultima",
						},
					}
				});
			} );