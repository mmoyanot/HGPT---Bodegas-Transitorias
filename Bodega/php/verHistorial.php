<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);


$producto = mysql_fetch_assoc(mysql_query("SELECT * FROM producto WHERE id_prod = '$codigo' "));
$resultado = mysql_query("SELECT * FROM movimiento WHERE id_prod = '$codigo'");
$in = 0;
$out = 0;
					if ($producto['cod_ref']== ''){
						$cod_ref = "----";
					}else{
						$cod_ref = $producto['cod_ref'];
						}
					if ($producto['cant_total']== ''){
						$cant_total = "0";
					}else{
						$cant_total = $producto['cant_total'];
						}


echo '<div class="modal-content">
            	<div class="modal-body">
					<h2><p class="alert alert-success">'.$producto['descrip'].'</p></h2>
						<table class="table table-bordered table-condensed table-hover">
							<tr>
								<th><div align="center">Codigo:<p class="alert alert-success">'.$producto['id_prod'].'</p></div></th>
								<th><div align="center">Tipo:<p class="alert alert-success">'.$producto['tipo'].'</p></div></th>
								<th><div align="center">Cod-Ref:<p class="alert alert-success">'.$cod_ref.'</p></div></th>
								<th><div align="center">Creado el:<p class="alert alert-success">'.$producto['creacion'].'</p></div></th>
								<th><div align="center">Cantidad Total:<p class="alert alert-success">'.$cant_total.'</p></div></th>
							</tr>
  						</table>
						</br>';



echo '<table class="table table-bordered table-condensed table-hover">
		<tr>
			<th><div align="center">Lote</div></th>
			<th><div align="center">Cod. Barras</div></th>
			<th><div align="center">Fecha</div></th>
			<th><div align="center">Entradas</div></th>
			<th><div align="center">Salidas</div></th>
			<th><div align="center">Responsable</div></th>
			<th><div align="center">Motivo</div></th>
		</tr>';

		$fondo_entrada = array(
				"Entrada" => "#dff0d8",
						);
		$letra_entrada = array(
				"Entrada" => "#3c763d",
						);
		$fondo_salida = array(
		"Rebaja" => "#e57373"
						);
		$letra_salida = array(
		"Rebaja" => "#fafafa"
						);

if(mysql_num_rows($resultado)>0){
while($lotee = mysql_fetch_array($resultado)){
	$compa = $lotee['id_lote'];
	$adj = mysql_fetch_array(mysql_query("SELECT * FROM lote WHERE id_lote = '$compa'"));
	$in = ($lotee['cant_ent']+$in);
	$out = ($lotee['cant_sal']+$out);

					if ($adj['lote']== ''){
						$lotes = "----";
					}else{
						$lotes = $adj['lote'];
						}
					if ($adj['cod_bar']== ''){
						$cod_bar = "----";
					}else{
						$cod_bar = $adj['cod_bar'];
						}
					if ($lotee['fecha']== '0000-00-00'){
						$fecha = "----";
					}else{
						$fecha = $lotee['fecha'];
						}
					if ($adj['vencimiento']== '0000-00-00'){
						$vencimiento = "----";
					}else{
						$vencimiento = $adj['vencimiento'];
						}

						echo '<tr>
								<td><div align="center">'.$lotes.'</div></td>
								<td><div align="center">'.$cod_bar.'</div></td>
								<td><div align="center">'.$fecha.'</div></td>
								<td style="background-color:'.$fondo_entrada['Entrada'].'; color:'.$letra_entrada['Entrada'].';"><div align="center"><strong>'.$lotee['cant_ent'].'</strong></div></td>
								<td style="background-color:'.$fondo_salida["Rebaja"].'; color:'.$letra_salida['Rebaja'].';"><div align="center"><strong>'.$lotee['cant_sal'].'</strong></div></td>

								<td><div align="center">'.$lotee['user'].'</div></td>
								<td><div align="center">'.$lotee['motivo'].'</div></td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="7"><div align="center"><p class="alert alert-info">No se encontraron registros...</p></div></td></tr>';
			}

echo '<tr>
								<td colspan="3"><p align="right"><strong>Totales: </strong></p></td>
								<td><p align="center"><strong>'.$in.'</strong></p></td>
								<td><p align="center"><strong>'.$out.'</strong></p></td>
								</tr>
								</table>
		</div>
		  </div>';
?>
