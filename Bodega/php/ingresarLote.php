<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$prod = $_SESSION['id_produc'];
$nom = $_SESSION['nombre'];
$ape = $_SESSION['apellido'];
$todo = $nom." ".$ape; 
$lote = $_POST['lote'];
$barras = $_POST['barras'];
$cantidad = $_POST['cantidad'];
$venci = $_POST['venci'];
$fechalote = date('Y-m-d');

$insert = mysql_query("INSERT INTO lote (id_prod, vencimiento, lote, cod_bar, ingreso, cant_actual, cant_inicial)VALUES('$prod','$venci','$lote','$barras','$fechalote','$cantidad','$cantidad')");

$insertmov = mysql_query("INSERT INTO movimiento (id_prod, id_lote, fecha, user, tipo_mov, cant_ent)VALUES('$prod',LAST_INSERT_ID(),'$fechalote','$todo','Entrada','$cantidad')");

if ($insert){
	$cant = mysql_query("SELECT * FROM producto WHERE id_prod = '$prod' ");
	while($total = mysql_fetch_array($cant)){
		$suma = ($total['cant_total']+$cantidad);
	}
	mysql_query("UPDATE producto SET cant_total='$suma' WHERE id_prod='$prod'"); 

//DEVOLVER TABLA DE LOTES REGISTRADOS
$cero = 0;	
	$resultado = mysql_query("SELECT * FROM lote WHERE id_prod = '$prod' AND cant_actual > '$cero'");
	echo '<table class="table table-bordered table-condensed table-hover">			
  			<tr>
				<th><p align="center"><strong>Lote</p></strong></th>
				<th><p align="center"><strong>Vencimiento</p></strong></th>
				<th><p align="center"><strong>Cod.Barras</p></strong></th>
				<th><p align="center"><strong>Cantidad</p></strong></th>
				<th><p align="center"><strong>Ingreso</p></strong></th>																
			</tr>';
	while($mostrar = mysql_fetch_array($resultado)){
					if ($mostrar['lote']== ''){
						$lotes = "----";
					}else{
						$lotes = $mostrar['lote'];
						}
					if ($mostrar['vencimiento']== '0000-00-00'){
						$vencimiento = "----";
					}else{
						$vencimiento = $mostrar['vencimiento'];
						}
					if ($mostrar['cod_bar']== ''){
						$cod_bar = "----";
					}else{
						$cod_bar = $mostrar['cod_bar'];
						}					
		echo '<tr onmouseover="this.style.backgroundColor=\'#ffff66 \';" onmouseout="this.style.backgroundColor= \'#FFFFFF \';">
								<td><p align="center">'.$lotes.'</p></td>
								<td><p align="center">'.$vencimiento.'</p></td>
								<td><p align="center">'.$cod_bar.'</p></td>
								<td><p align="center">'.$mostrar['cant_actual'].'</p></td>
								<td><p align="center">'.$mostrar['ingreso'].'</p></td>							  							
							  </tr>';
	}
	echo '<tr>
								<td colspan="3"><p align="center"><strong>Total</strong></p></td>								
								<td><p align="center"><strong>'.$suma.'</strong></p></td>
								<td><p align="center"></p></td>
								</tr>
	
		
	</table>';
}else{
	echo '<p class="alert alert-danger">Ocurrio un Problema!</p>';
}
?>