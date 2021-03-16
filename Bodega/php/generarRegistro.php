<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();	

$descrip = $_POST['descrip'];
$tipo = $_POST['tipo'];
$codref = $_POST['codref'];
$fechaitem = date('Y-m-d');

$comprobar = mysql_num_rows(mysql_query("SELECT * FROM producto WHERE descrip = '$descrip'"));

if($comprobar == 0){
	
	mysql_query("INSERT INTO producto (descrip, tipo, cod_ref, creacion)VALUES('$descrip','$tipo','$codref','$fechaitem') ");
	
	$resultado = mysql_query("SELECT * FROM producto WHERE descrip = '$descrip'");		
		while($mostrar = mysql_fetch_array($resultado)){
			$_SESSION['id_produc'] = $mostrar['id_prod'];
			echo '<p class="alert alert-success">Ingresado Correctamente, su Codigo para este producto es el <strong>'.$mostrar['id_prod'].'</strong></p>';
			
		}		

}else{
	
 	echo 'existe';
 
}
?>