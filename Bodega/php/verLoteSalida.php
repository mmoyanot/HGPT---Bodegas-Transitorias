<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['lote'];
$codigo = substr($cod,1,-1);
$prod = $_POST['prod'];

$producto = mysql_fetch_assoc(mysql_query("SELECT * FROM lote l INNER JOIN producto p WHERE l.id_lote = '$codigo' AND p.id_prod = '$prod'"));


					
					if ($producto['lote']== ''){
						$lotes = "----";
					}else{
						$lotes = $producto['lote'];
						}
					if ($producto['cod_bar']== ''){
						$cod_bar = "----";
					}else{
						$cod_bar = $producto['cod_bar'];
						}
					if ($producto['ingreso']== '0000-00-00'){
						$ingreso = "----";
					}else{
						$ingreso = $producto['ingreso'];
						}
					if ($producto['vencimiento']== '0000-00-00'){
						$vencimiento = "----";
					}else{
						$vencimiento = $producto['vencimiento'];
						}
					
						
echo '<div class="modal-content">
            	<div class="modal-body">
					<h4><div align="center"><p class="alert alert-success">'.$producto['descrip'].'</p></div></h4>
						<table class="table table-bordered table-condensed table-hover">
							<tr>
								<th><div align="center">Codigo:<p class="alert alert-success">'.$producto['id_prod'].'</p><input type="hidden" id="idprod" class="form-control" value="'.$producto['id_prod'].'"><input type="hidden" id="idlote" class="form-control" value="'.$producto['id_lote'].'"></div></th>
								<th><div align="center">Tipo:<p class="alert alert-success">'.$producto['tipo'].'</p></div></th>							
							</tr>							
  						</table>
						</br>
						
		<table class="table table-bordered table-condensed table-hover">
		<tr>
			<th><div align="center">Lote</div></th>
			<th><div align="center">Cod. Barras</div></th>  
			<th><div align="center">Ingresado</div></th>
			<th><div align="center">Vencimiento</div></th>
			<th><div align="center">Cantidad Actual</div></th>
		</tr>
		<tr>
			<th><div align="center">'.$lotes.'</div></th>
			<th><div align="center">'.$cod_bar.'</div></th>  
			<th><div align="center">'.$ingreso.'</div></th>
			<th><div align="center">'.$vencimiento.'</div></th>
			<th><div align="center">'.$producto['cant_actual'].'<input type="hidden" id="actual" class="form-control" value="'.$producto['cant_actual'].'"></div></th>
		</tr>
		</table>		
		<table class="table table-bordered table-condensed table-hover">
		<tr>			
			<th width="28%"><div align="center">Monto a Rebajar</div></th>
			<td width="14%"><div align="center"><input type="text" class="form-control" id="menos"></div></td>
			<th width="20%"><div align="center">Motivo</div></th>
			<td><div align="center"><select class="form-control" id="motivo">
                                  <option value="" selected="selected"><b>--SELECCIONE UN TIPO--</b></option>
                                  <option value="USO NORMAL">USO NORMAL</option>
                                  <option value="ERROR DE INGRESO">ERROR DE INGRESO</option>
                                  <option value="VENCIDO">VENCIDO</option>
                                  <option value="PARA DONACION">PARA DONACION</option>
                                  <option value="OTROS">OTROS</option>
                                </select</div></td>	
		</tr>		
		<tr>
		<td colspan="4"><div align="center"><input type="button" class="btn btn-success" value="Aceptar" onclick="RebajaLote();">
		</tr>
		</table>
		 <div id="mensaje" align="center"></div>';	


						
?>