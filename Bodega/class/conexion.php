<?php
session_start();
class sistema{
		public function conexion(){
			$host        = 'localhost';
			$usuario    = 'root';
			$password = 'sargentoaldea660';
			$dataBase  = 'g1';

			$conexion = mysql_connect($host, $usuario, $password);
			$seleccion = mysql_select_db($dataBase, $conexion);
		}
		function ListadoCompleto(){
			$sql = mysql_query("SELECT * FROM producto");
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					if ($mostrar['creacion']== '0000-00-00'){
						$creacion = "----";
					}else{
						$creacion = $mostrar['creacion'];
						}
					if ($mostrar['cod_ref']== ''){
						$cod_ref = "----";
					}else{
						$cod_ref = $mostrar['cod_ref'];
						}
					if ($mostrar['cant_total']== ''){
						$cant_total = "0";
					}else{
						$cant_total = $mostrar['cant_total'];
						}
					echo '<tr>
								<td>'.$mostrar['id_prod'].'</td>
								<td>'.$mostrar['descrip'].'</td>
								<td>'.$mostrar['tipo'].'</td>
								<td>'.$cod_ref.'</td>
								<td>'.$creacion.'</td>
								<td>'.$cant_total.'</td>
								<td><input type="button" value="Detalle" class="btn btn-success" onClick="verDetalle(/'.$mostrar['id_prod'].'/)"></td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="7"><div align="center"><p class="alert alert-info">No se encontraron registros...</p></div></td></tr>';
			}
		}



		function PorVencer(){
			$FechaActual = date('Y-m-d');
			$MenosUnMes = strtotime ('+2 month', strtotime($FechaActual));
			$DifVenci = date('Y-m-d', $MenosUnMes);
			$fecha = "0000-00-00";
			$cant = "0";
			$sql = mysql_query("SELECT * FROM lote l INNER JOIN producto p WHERE p.id_prod=l.id_prod AND l.vencimiento<>'$fecha' AND l.cant_actual<>'$cant' AND l.vencimiento BETWEEN '$FechaActual' AND '$DifVenci'");
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					echo '<tr>
								<td>'.$mostrar['id_prod'].'</td>
								<td>'.$mostrar['descrip'].'</td>
								<td>'.$mostrar['lote'].'</td>
								<td>'.$mostrar['vencimiento'].'</td>
								<td>'.$mostrar['cant_actual'].'</td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="5"><div align="center"><p class="alert alert-info">No hay Insumos por vencer dentro de los proximos 2 meses...</p></div></td></tr>';
			}
		}


		function Vencidas(){
			$fecha1 = date('Y-m-d');
			$fecha2 = "0000-00-00";
			$cant1 = "0";
			$sql = mysql_query("SELECT * FROM lote l inner join producto p where p.id_prod=l.id_prod and l.vencimiento<='$fecha1' and l.vencimiento<>'$fecha2' and l.cant_actual<>'$cant1'");
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					echo '<tr>
								<td>'.$mostrar['id_prod'].'</td>
								<td>'.$mostrar['descrip'].'</td>
								<td>'.$mostrar['lote'].'</td>
								<td>'.$mostrar['vencimiento'].'</td>
								<td>'.$mostrar['cant_actual'].'</td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="5"><div align="center"><p class="alert alert-info">No se encontraron registros...</p></div></td></tr>';
			}
		}



		function ListadoSalida(){
			$sql = mysql_query("SELECT * FROM producto");
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					if ($mostrar['creacion']== '0000-00-00'){
						$creacion = "----";
					}else{
						$creacion = $mostrar['creacion'];
						}
					if ($mostrar['cod_ref']== ''){
						$cod_ref = "----";
					}else{
						$cod_ref = $mostrar['cod_ref'];
						}
					if ($mostrar['cant_total']== ''){
						$cant_total = "0";
					}else{
						$cant_total = $mostrar['cant_total'];
						}
					echo '<tr>
								<td>'.$mostrar['id_prod'].'</td>
								<td>'.$mostrar['descrip'].'</td>
								<td>'.$mostrar['tipo'].'</td>
								<td>'.$cod_ref.'</td>
								<td>'.$creacion.'</td>
								<td>'.$cant_total.'</td>
								<td><input type="button" value="Ver lotes" class="btn btn-success" onClick="verParaSalida(/'.$mostrar['id_prod'].'/)"></td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="7"><div align="center"><p class="alert alert-info">No se encontraron registros...</p></div></td></tr>';
			}
		}



		function ListadoHistorial(){
			$sql = mysql_query("SELECT * FROM producto");
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					if ($mostrar['creacion']== '0000-00-00'){
						$creacion = "----";
					}else{
						$creacion = $mostrar['creacion'];
						}
					if ($mostrar['cod_ref']== ''){
						$cod_ref = "----";
					}else{
						$cod_ref = $mostrar['cod_ref'];
						}
					if ($mostrar['cant_total']== ''){
						$cant_total = "0";
					}else{
						$cant_total = $mostrar['cant_total'];
						}
					echo '<tr>
								<td>'.$mostrar['id_prod'].'</td>
								<td>'.$mostrar['descrip'].'</td>
								<td>'.$mostrar['tipo'].'</td>
								<td>'.$cod_ref.'</td>
								<td>'.$creacion.'</td>
								<td>'.$cant_total.'</td>
								<td><input type="button" value="Historial" title="BindCard" class="btn btn-success" onClick="verHistorial(/'.$mostrar['id_prod'].'/)"></td>
							</tr>';
				}
			}else{
				echo '<tr><td colspan="7"><div align="center"><p class="alert alert-info">No se encontraron registros...</p></div></td></tr>';
			}
		}



}
?>
