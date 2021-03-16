<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();	

$pass = $_POST['pass3'];
$user = $_SESSION["user"];

$act = mysql_query("UPDATE usuarios_lab SET pass_lab='$pass' WHERE user_lab='$user'");
	if($act){
 	echo '<p class="alert alert-success">Clave modificada correctamente <span class="glyphicon glyphicon-ok alert-success"></span></p>';
	}else{
	echo '<p class="alert alert-danger">Ocurrio un Problema</p>';	
}
?>