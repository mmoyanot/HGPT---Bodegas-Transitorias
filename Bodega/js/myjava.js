$(function() {
	$('#cerrar').on('click', function(){
		var url = document.URL;
		location.href=url;
	});

//******************//

	$('#Nuevo').on('click', function(){
		document.location.href = "nuevoitem.php";
	});


//******************//

	$('#CerrarPass').on('click', function(){
		document.location.href = "user.php";
	});


//******************//

	$('#nuevaAsistencia').on('click', function(){
		$('#modalAsistencia').modal({
			show:true,
			backdrop:'static',
		});
	});

//******************//

	$('#CrearItem').on('click', function(){
		var descrip = $('#Descrip').val();
		var tipo = $('#Tipo').val();
		var codref = $('#CodRef').val();
		if(descrip.length>0 & tipo.length>0){
			$.ajax({
				type: 'POST',
				data: 'descrip='+descrip+'&tipo='+tipo+'&codref='+codref,
				url: 'php/generarRegistro.php',
				success: function(data){
					if(data == 'existe'){
						$('#mensaje').html('<p class="alert alert-danger">Espere!!, este Item ya fue ingresado anteriormente, revise porfavor.</p>');
					}else{
					$('#mensaje').html(data);
					$('#Lote').removeAttr('disabled').focus();
					$('#Cantidad').removeAttr('disabled');
					$('#Barras').removeAttr('disabled');
					$('#Venci').removeAttr('disabled');
					$('#guardar').removeAttr('disabled');
					$('#agregarlote').removeAttr('disabled');
					$('#Nuevo').removeAttr('disabled');

					$('#Descrip').attr('disabled','disabled');
					$('#Tipo').attr('disabled','disabled');
					$('#CodRef').attr('disabled','disabled');
					$('#CrearItem').attr('disabled','disabled');

					}
				}
			});
		}else{
			$('#mensaje').html('<p class="alert alert-danger">Espere!!, tiene que ingresar datos del Item.</p>');
		}
	});

//******************//

$('#BusquedaItemMod').on('keyup', function(){
		var buscar = $('#BusquedaItemMod').val();
		if(buscar.length>2){
			$.ajax({
				type: 'POST',
				data: 'buscar='+buscar,
				url: 'php/buscarmodart.php',
				success: function(data){
					$('#mensaje').html(data);
					$('#modificar').html('');
					$('#comprobacion').html('');
				}
			});
			}else{
			$('#mensaje').html('<div align="Center"><p class="alert alert-warning">Para buscar ingrese minimo 3 caracteres...</p></div>');
		}
	});



//******************//

$('#BusquedaIngreso').on('keyup', function(){
		var buscar = $('#BusquedaIngreso').val();
		if(buscar.length>2){
			$.ajax({
				type: 'POST',
				data: 'buscar='+buscar,
				url: 'php/buscarItem.php',
				success: function(data){
					$('#mensaje').html(data);
					$('#resultado').html('');
					$('#mensajelote').html('');

					$('#Lote').val('');
					$('#Cantidad').val('');
					$('#Barras').val('');
					$('#Venci').val('');

					$('#Lote').attr('disabled','disabled');
					$('#Cantidad').attr('disabled','disabled');
					$('#Barras').attr('disabled','disabled');
					$('#Venci').attr('disabled','disabled');

					$('#guardar').attr('disabled','disabled');
					$('#asignarlote').attr('disabled','disabled');
				}
			});
			}else{
			$('#mensaje').html('<div align="Center"><p class="alert alert-warning">Para buscar ingrese minimo 3 caracteres...</p></div>');
		}
	});


//******************//


	$('#agregarlote').on('click', function(){

		var lote = $('#Lote').val();
		var barras = $('#Barras').val();
		var cantidad = $('#Cantidad').val();
		var venci = $('#Venci').val();
		if(cantidad.length>0 & cantidad>0){
			$.ajax({
				type: 'POST',
				data: 'lote='+lote+'&barras='+barras+'&cantidad='+cantidad+'&venci='+venci,
				url: 'php/ingresarLote.php',
				success: function(data){
					$('#Lote').val('').focus();
					$('#Cantidad').val('');
					$('#Barras').val('');
					$('#Venci').val('');
					$('#contenidoRegistro').html(data);
					$('#mensajelote').html('<p class="alert alert-success">Ingresado Correctamente</p>');
				}
			});
		}else{
			$('#mensajelote').html('<p class="alert alert-danger">Espere!!, Revise la cantidad</p>');
		}
	});


//******************//
//**Comprobacion cambio Password Usuario**//
//******************//

$('#Pass1').on('keyup', function(){
		var pass1 = $('#Pass1').val();
			$.ajax({
				type: 'POST',
				data: 'pass1='+pass1,
				url: 'php/verpass.php',
				success: function(data){
					if(data == 'Si'){
						$('#ComproPass1').html('<span class="glyphicon glyphicon-ok alert-success"></span>');
						$('#Pass2').removeAttr('disabled').focus();
						$('#Pass1').attr('disabled','disabled');
					}
					if(data == 'No'){
						$('#ComproPass1').html('<span class="glyphicon glyphicon-remove alert-danger"></span>');
					}
				}
			});
	});

//******************//

$('#Pass2').on('keyup', function(){
		var pass2 = $('#Pass2').val();
			if(pass2.length>3){
				$('#ComproPass2').html('<span class="glyphicon glyphicon-ok alert-success"></span>');
				$('#Pass3').removeAttr('disabled');
			}else{
				$('#ComproPass2').html('<span class="glyphicon glyphicon-remove alert-danger"></span>');
				$('#Pass3').attr('disabled','disabled');
			}
	});

//******************//

$('#Pass3').on('keyup', function(){
		var pass2 = $('#Pass2').val();
		var pass3 = $('#Pass3').val();
			if(pass2 == pass3){
				$('#ComproPass3').html('<span class="glyphicon glyphicon-ok alert-success"></span>');
				$('#Pass2').attr('disabled','disabled');
				$('#Pass3').attr('disabled','disabled');
				$('#CambioPass').removeAttr('disabled');
			}else{
				$('#ComproPass3').html('<span class="glyphicon glyphicon-remove alert-danger"></span>');
			}
});

//******************//

$('#CambioPass').on('click', function(){
		var pass3 = $('#Pass3').val();
			$.ajax({
				type: 'POST',
				data: 'pass3='+pass3,
				url: 'php/cambiopass.php',
				success: function(data){
					$('#PassOK').html(data);
					$('#CerrarPass').attr('value','Cerrar');
					$('#CambioPass').attr('disabled','disabled');
				}
			});
});

//******************//
//**Fin Comprobacion cambio Password Usuario**//
//******************//

//******************//

	$('#asignarlote').on('click', function(){
		var id_prod = $('#id_prod').val();
		var lote = $('#Lote').val();
		var barras = $('#Barras').val();
		var cantidad = $('#Cantidad').val();
		var venci = $('#Venci').val();
		console.log(id_prod);
		if(cantidad.length>0 & cantidad>0){
			$.ajax({
				type: 'POST',
				data: 'lote='+lote+'&barras='+barras+'&cantidad='+cantidad+'&venci='+venci+'&id_prod='+id_prod,
				url: 'php/asignarLote.php',
				success: function(data){
					$('#Lote').val('').focus();
					$('#Cantidad').val('');
					$('#Barras').val('');
					$('#Venci').val('');
					$('#resultado').html(data);
					$('#mensajelote').html('<p class="alert alert-success">Ingresado Correctamente</p>');
				}
			});
		}else{
			$('#mensajelote').html('<p class="alert alert-danger">Espere!!, Revise la cantidad</p>');
		}
	});

//******************//

});

//******************//



//Calendario
window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"Venci",
			dateFormat:"%Y-%m-%d"
		});
	};

//******************//

function verDetalle(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/verDetalle.php',
				success: function(data){
						$('#datosAqui').html(data);

				}
			});
		return false;
}

//******************//

function verParaSalida(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/verParaSalida.php',
				success: function(data){
						$('#myModalLabel').html('Seleccione para Rebajar');
						$('#tablax').html('');
						$('#datosAqui').html(data);
						$('#botonregreso').html('<br><br><input type="button" class="btn btn-info" value="Buscar Nuevo Item" onclick="BuscarRebajaNueva()">');
				}
			});
		return false;
}

//******************//

function Asignar(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/asignar.php',
				success: function(data){
						$('#resultado').html(data);
						$('#mensaje').html('');
						$('#BusquedaIngreso').val('');
						$('#Lote').removeAttr('disabled').focus();
						$('#Cantidad').removeAttr('disabled');
						$('#Barras').removeAttr('disabled');
						$('#Venci').removeAttr('disabled');
						$('#guardar').removeAttr('disabled');
						$('#asignarlote').removeAttr('disabled');
				}
			});
		return false;
}

function PrepMod(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/ModificarItem.php',
				success: function(data){
						$('#modificar').html(data);
						$('#mensaje').html('');
						$('#BusquedaItemMod').val('');
						document.getElementById("Descrip").focus();

				}
			});
		return false;
}

function ActItem(){
		var Descrip = $('#Descrip').val();
		var id_prod = $('#id_prod').val();
		var Tipo = $('#Tipo').val();
		var cod_ref = $('#cod_ref').val();

		var x = confirm("¿Estás seguro de que deseas modificar este item?");
  	if (x){
			if(Descrip.length>3){
			$.ajax({
					type: 'POST',
					data: 'Descrip='+Descrip+'&id_prod='+id_prod+'&Tipo='+Tipo+'&cod_ref='+cod_ref,
					url: 'php/actItem.php',
					success: function(data){
						if(data == 'existe'){
							$('#mensaje').html('<p class="alert alert-danger">Espere!!, este Item ya fue ingresado anteriormente, revise porfavor.</p>');
						}else{
							$('#mensaje').html('');
							$('#modificar').html(data);
						}
					}
			});
			}else{
			$('#mensaje').html('<p class="alert alert-danger">Espere!!, El Nombre del Item debe contener almenos 4 caracteres</p>');
			}
		}else{
		    return false;
			}
}


function RebajaLote(){
		var id_lote = $('#idlote').val();
		var id_prod = $('#idprod').val();
		var menos = $('#menos').val();
		var actual = $('#actual').val();
		var motivo = $('#motivo').val();
		if (menos.length>0){
			if (Number(menos)>0){
					if(Number(actual)>=Number(menos)){
						if (motivo.length>0){
									if (confirm("Esta Correcto?") == true) {
										$.ajax({
											type: 'POST',
											data: 'id_lote='+id_lote+'&id_prod='+id_prod+'&menos='+menos+'&actual='+actual+'&motivo='+motivo,
											url: 'php/actSalida.php',
											success: function(data){
													$('#datosAqui').html(data);
													$('#datosModalSalida').html('<p class="alert alert-success">Rebajado Correctamente!</p>');
													setTimeout(function()
													{
														$('#modalDetalle').modal("hide");
													}, 3000);
											}
										});

									} else {
										return false;
									}
						}else{
							$('#mensaje').html('<p class="alert alert-danger">Espere!!, Debe seleccionar un motivo</p>');
						}
					}else{
						$('#mensaje').html('<p class="alert alert-danger">Espere!!, Debe Ingresar una Cantidad menor o igual a la actual</p>');
					}
			}else{
				$('#mensaje').html('<p class="alert alert-danger">Espere!!, Debe Ingresar una Cantidad mayor a 0</p>');
			}
		}else{
			$('#mensaje').html('<p class="alert alert-danger">Espere!!, Debe Ingresar una Cantidad</p>');
		}
}



function VerenModal(lote, prod){
		$.ajax({
				type: 'POST',
				data: 'lote='+lote+'&prod='+prod,
				url: 'php/verLoteSalida.php',
				success: function(data){
						$('#datosModalSalida').html(data);
						$('#modalDetalle').modal({
								show:true,
								backdrop:'static',

						});
				}
			});
		return false;
}


function BuscarRebajaNueva(){

	document.location.href = "salida.php";

	}

//******************//

function verHistorial(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'php/verHistorial.php',
				success: function(data){
						$('#datosAqui').html(data);

				}
			});
		return false;
}

//******************//
