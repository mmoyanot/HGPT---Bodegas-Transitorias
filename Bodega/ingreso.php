<?php

session_start();
if(!isset($_SESSION["user"])){
  header("location:log/login.php");
}

?>
<?php
	include('class/classAsistencias.php');
	$clase = new sistema;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>HPDT - Bodega Geriatría 1 </title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jsDatePick_ltr.min.css" />
</head>
<body>
	<div class="container">
    	<br>
    	<header>
            <nav class="navbar navbar-default navbar-inverse">
            	<div class="container-fluid">
                	<div class="navbar-header">
                		<span class="navbar-brand"><em><strong> G1 - Hospital Geriátrico</strong></em></span>
                	</div>
                    <ul class="nav navbar-nav navbar-right">
                    	<span class="navbar-brand"> Bienvenido <em><strong><?php echo $_SESSION["nombre"];?> <?php echo $_SESSION["apellido"];?></strong></em></span>
                    	<li><a href="user.php">Perfil Usuario <span class="glyphicon glyphicon-wrench"></span></a></li>
                        <li><a href="log/logout.php">Cerrar <span class="glyphicon glyphicon-off"></span></a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="row">


            <div class="col-xs-12">
            	<div class="panel panel-primary">
                    <div class="panel-heading" align="center"><img src="img/logosinfondo.png" width="50px" height="50px"><strong> G1 -  Hospital Geriátrico</strong></div>
                        <div class="panel-body" align="center">
                        	<div class="row">
                            <a href="index.php" class="btn img-rounded" title="Inicio"><img src="img/inicio.png" onMouseOver="this.src='img/inicio2.png';" onMouseOut="this.src='img/inicio.png';" width="100px" height="100px" data-toggle="popover" data-placement="bottom" data-content="Inicio"></a>
                            <a href="listado.php" class="btn img-rounded" title="Buscar Producto"><img src="img/search.png" onMouseOver="this.src='img/search2.png';" onMouseOut="this.src='img/search.png';" width="100px" height="100px" data-toggle="popover" data-placement="bottom" data-content="Buscar"></a>
                            <a href="nuevoitem.php" class="btn img-rounded" title="Nuevo Producto"><img src="img/idea.png" onMouseOver="this.src='img/idea2.png';" onMouseOut="this.src='img/idea.png';" width="100px" height="100px" data-toggle="popover" data-placement="bottom" data-content="Nuevo item"></a>
                            <a href="ingreso.php" class="btn img-rounded" title="Ingreso"><img src="img/in.png" onMouseOver="this.src='img/in2.png';" onMouseOut="this.src='img/in.png';" width="100px" height="100px" data-toggle="popover" data-placement="bottom" data-content="Ingreso stock"></a>
                            <a href="salida.php" class="btn img-rounded" title="Salida"><img src="img/out.png" onMouseOver="this.src='img/out2.png';" onMouseOut="this.src='img/out.png';" width="100px" height="100px" data-toggle="popover" data-placement="bottom" data-content="Salidas"></a>
                            <a href="xvencer.php" class="btn img-rounded" title="Vencimientos Proximos"><img src="img/x.png" onMouseOver="this.src='img/x2.png';" onMouseOut="this.src='img/x.png';" width="100px" height="100px" data-toggle="popover" data-placement="bottom" data-content="Por Vencer"></a>
                            <a href="modificart.php"class="btn img-rounded" title="Modificar Producto"><img src="img/config2.png" onMouseOver="this.src='img/config22.png';" onMouseOut="this.src='img/config2.png';" width="100px" height="100px" data-toggle="popover" data-placement="bottom" data-content="Modificar"></a>
                            <a href="historial.php" class="btn img-rounded" title="Historial de Lote"><img src="img/contac.png" onMouseOver="this.src='img/contac2.png';" onMouseOut="this.src='img/contac.png';" width="100px" height="100px" data-toggle="popover" data-placement="bottom" data-content="Historial"></a>
               			</div>
            	</div>
                <br>
                <br>
                <br>


          	<div class="modal-content">
            <div class="modal-header">
             	<h4 class="modal-title" id="myModalLabel" align="center"><b>Ingreso de stock a bodega</b></h4>
            </div>
            <div class="modal-body">
                    <fieldset><legend>1. Buscar Item</legend>
                        <table class="tbl-registro" width="40%">
                            <tr>
                                <td width="44%"><strong>Buscar: </strong></td>
                                <td width="56%"><input type="text" class="form-control" id="BusquedaIngreso" autofocus style='text-transform:uppercase;'/></td>
                            </tr>
                        </table>
                    </fieldset>
                	<div id="mensaje" align="center"></div>
                    <div id="resultado" align="center"></div>
                    </br>
                    <fieldset><legend>2. Registrar Lote </legend>
                    <table class="tbl-registro" width="100%">
                        <tr>
                        	<td width="17%"><strong>Lote:</strong></td>
                            <td width="33%"><input type="text" class="form-control" id="Lote" disabled="disabled"/></td>
                            <td width="17%"><strong>Cod. Barras:</strong></td>
                            <td width="33%"><input type="text" class="form-control" id="Barras" disabled="disabled"/></td>
                        </tr>
                        <tr>
                            <td><strong>Vencimiento: </strong></td>
                            <td><input type="date" class="form-control" id="Venci" name="Venci" disabled="disabled"/></td>
                            <td><strong>Cantidad: </strong></td>
                            <td><input type="text" class="form-control" id="Cantidad" disabled="disabled"/></td>
                        </tr>
                        <tr>
                           	<td colspan="2">Ingresado el: <strong><?php echo date('d-m-Y');?></td>
                         	<td colspan="2"><div align="left"><input type="button" id="asignarlote" class="btn btn-success" value="Guardar" disabled="disabled"/></div></td>
                        </tr>
                    </table>
                </fieldset>
                <br />
                <div id="mensajelote" align="center"></div>
                <div id="contenidoRegistro" align="center"></div>
        	</div>
        	</div>



      </div>



	<script src="js/jquery.js"></script>
    <script src="js/myjava.js"></script>
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jsDatePick.jquery.min.1.3.js"></script>
    <script>
		$(document).ready(function(){
		$('[data-toggle="popover"]').popover('show');
		});
	</script>
</body>
</html>
