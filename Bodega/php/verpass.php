<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();	

$pass1 = $_POST['pass1'];
$user = $_SESSION["user"];

$comprobar = mysql_num_rows(mysql_query("SELECT * FROM usuarios_lab WHERE user_lab =  '$user' AND pass_lab = '$pass1'"));

if($comprobar == 0){
	
	echo 'No';
			
}else{
	
 	echo 'Si';
 
}
?>