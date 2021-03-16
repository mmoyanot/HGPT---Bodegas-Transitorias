<?php
session_start();
if (isset($_SESSION["user"])) {
  header("location:../index.php");
}
?>
<style>
h1 {
    background-color: #02223a;
    bottom: 0;
    color: rgba(255, 255, 255, 0.8);
    display: block;
    font-size: 5em;
    font-weight: bold;
    margin-top: 3em;
    opacity: 0.76;
    text-align: center;
    text-shadow: 1px 1px 1px #FFF;
    text-transform: uppercase;
    width: 100%;
}
</style>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="../js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="../bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post">
            <br><br>
            <h2><p class="text-center"><img src='../img/logosinfondo.png' height="100px" width="100px"></p></h2>
            <h1 align="center">Bodega Geriatría 1</h1>
            <br><br>
            <div class="form-group">
              <label for="user">Usuario</label>
              <input type="text" name="user" id="user" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" name="pass" id="pass" class="form-control" required>
            </div>
            <br><br>
            <div class="form-group">
              <input type="button" name="login" id="login" value="Ingresar" class="btn btn-success">
            </div>
            <br>
            <span id="result"></span>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<script>
  $(document).ready(function() {
    $('#login').click(function(){
      var user = $('#user').val();
      var pass = $('#pass').val();
	  if(user.length>0 & pass.length>0){
      if($.trim(user).length > 0 && $.trim(pass).length > 0){
        $.ajax({
          url:"logueame.php",
          method:"POST",
          data:{user:user, pass:pass},
          cache:"false",
          beforeSend:function() {
            $('#login').val("Conectando...");
          },
          success:function(data) {
            $('#login').val("Login");
            if (data=="1") {
              $(location).attr('href','../index.php');
            } else {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button><strong>¡Error!</strong> Revise su Usuario o Contraseña.</div>");
            }
          }
        });
      };
	  }else{
		  $("#result").html("<div class='alert alert-dismissible alert-info'><button type='button' class='close' data-dismiss='alert'>×</button><strong>¡Espere!</strong> Ingrese su Usuario y Contraseña.</div>");}
    });
  });
</script>
