<?php

	$mysqli=new mysqli("localhost","root","sargentoaldea660","g1"); //servidor, usuario de base de datos, contrase�a del usuario, nombre de base de datos

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

	$sql = "SELECT * FROM producto";
	$result=$mysqli->query($sql);






?>
