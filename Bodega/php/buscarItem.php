<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();	

$buscar = $_POST['buscar'];

$resultado = mysql_query("SELECT * FROM producto WHERE id_prod LIKE '%$buscar%' OR descrip LIKE '%$buscar%' OR tipo LIKE '%$buscar%' OR cod_ref LIKE '%$buscar%'");

echo '<table class="table table-bordered table-condensed table-hover">
		<tr>
			<th><div align="center">Codigo</div></th>
			<th><div align="center">Item</div></th>  
			<th><div align="center">Tipo</div></th>
			<th><div align="center">Cod-Ref</div></th>
			<th><div align="center">Cantidad</div></th>
			<th><div align="center">Asignar</div></th>
		</tr>';	

	if(mysql_num_rows($resultado)>0){
		while($row = mysql_fetch_array($resultado)){
					
					if ($row['cod_ref']== ''){
						$cod_ref = "----";
					}else{
						$cod_ref = $row['cod_ref'];
						}
					if ($row['cant_total']== ''){
						$cant_total = "0";
					}else{
						$cant_total = $row['cant_total'];
						}	
						
						echo '<tr">
								<td><div align="center">'.$row['id_prod'].'</div></td>
								<td><div align="center">'.$row['descrip'].'</div></td>								
								<td><div align="center">'.$row['tipo'].'</div></td>
								<td><div align="center">'.$cod_ref.'</div></td>
								<td><div align="center">'.$cant_total.'</div></td>
								<td><div align="center"><input type="button" value="Asignar" class="btn btn-primary" onClick="Asignar(/'.$row['id_prod'].'/)"></div></td>								
							</tr>';
				}
			}else{
				echo '<tr><td colspan="6"><div align="center"><p class="alert alert-info">No se encontraron Item con ese nombre...</p></div></td></tr>';
			}	

echo '</table>';
		
?>