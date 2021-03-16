<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);
$cero = 0;

$producto = mysql_fetch_assoc(mysql_query("SELECT * FROM producto WHERE id_prod = '$codigo' "));
$resultado = mysql_query("SELECT * FROM lote WHERE id_prod = '$codigo' AND cant_actual > '$cero' ");
$suma = 0;

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
			<th><div align="center">Ingresado</div></th>
			<th><div align="center">Vencimiento</div></th>
			<th><div align="center">Cantidad Actual</div></th>
		</tr>';	


if(mysql_num_rows($resultado)>0){
while($lotee = mysql_fetch_array($resultado)){
	$suma = ($lotee['cant_actual']+$suma);
	
					if ($lotee['lote']== ''){
						$lotes = "----";
					}else{
						$lotes = $lotee['lote'];
						}
					if ($lotee['cod_bar']== ''){
						$cod_bar = "----";
					}else{
						$cod_bar = $lotee['cod_bar'];
						}
					if ($lotee['ingreso']== '0000-00-00'){
						$ingreso = "----";
					}else{
						$ingreso = $lotee['ingreso'];
						}
					if ($lotee['vencimiento']== '0000-00-00'){
						$vencimiento = "----";
					}else{
						$vencimiento = $lotee['vencimiento'];
						}
						
						echo '<tr>
								<td><div align="center">'.$lotes.'</div></td>
								<td><div align="center">'.$cod_bar.'</div></td>								
								<td><div align="center">'.$ingreso.'</div></td>
								<td><div align="center">'.$vencimiento.'</div></td>
								<td><div align="center">'.$lotee['cant_actual'].'</div></td>														
							</tr>';
				}
			}else{
				echo '<tr><td colspan="5"><div align="center"><p class="alert alert-info">No se encontraron registros...</p></div></td></tr>';
			}	

echo '<tr>
								<td colspan="4"><p align="right"><strong>Total: </strong></p></td>								
								<td><p align="center"><strong>'.$suma.'</strong></p></td>								
								</tr>
								</table>
		</div>
		  </div>';
?>