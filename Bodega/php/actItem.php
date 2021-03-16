<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$Descrip = $_POST['Descrip'];
$id_prod = $_POST['id_prod'];
$Tipo = $_POST['Tipo'];
$cod_ref = $_POST['cod_ref'];

$comprobar = mysql_num_rows(mysql_query("SELECT * FROM producto WHERE descrip = '$Descrip'"));

if($comprobar == 0){
	$act = mysql_query("UPDATE producto SET descrip='$Descrip' WHERE id_prod='$id_prod'"); 
	$act = mysql_query("UPDATE producto SET tipo='$Tipo' WHERE id_prod='$id_prod'");
	$act = mysql_query("UPDATE producto SET cod_ref='$cod_ref' WHERE id_prod='$id_prod'");

	if ($act){
		
		echo '<p class="alert alert-success"><strong>'.$Descrip.'</strong> actualizado Correctamente</p>'; 
		
	}else{
		echo '<p class="alert alert-danger">Ocurrio un Problema!</p>';
	}
}else{
	
 	echo 'existe';
 
}
	
?>