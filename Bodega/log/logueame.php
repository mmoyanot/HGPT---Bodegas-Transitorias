<?php

session_start();
$connect = mysqli_connect("localhost","root","sargentoaldea660","g1");

if(isset($_POST["user"]) && isset($_POST["pass"])){
  $user = mysqli_real_escape_string($connect, $_POST["user"]);
  $pass = mysqli_real_escape_string($connect, $_POST["pass"]);
  $sql = "SELECT * FROM usuarios_uca WHERE user_uca='$user' AND pass_uca='$pass'";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
	$_SESSION["id_user"] = $data["id_user"];
    $_SESSION["user"] = $data["user_uca"];
	$_SESSION["nombre"] = $data["nombre"];
	$_SESSION["apellido"] = $data["apellido"];
	$_SESSION["correo"] = $data["correo"];
    echo "1";
  } else {
    echo "error";
  }
} else {
  echo "error";
}

?>
