<?php
include('../class/classAsistencias.php');
$clase = new sistema;
$clase->conexion();

$cod = $_POST['codigo'];
$codigo = substr($cod,1,-1);
$cero = 0;

$producto = mysql_fetch_assoc(mysql_query("SELECT * FROM producto WHERE id_prod = '$codigo' "));
$_SESSION['id_produc'] = $producto['id_prod'];


					if ($producto['cod_ref']== ''){
						$cod_ref = "----";
					}else{
						$cod_ref = $producto['cod_ref'];
						}
					if ($producto['cant_total']== ''){
						$cant_total = "----";
					}else{
						$cant_total = $producto['cant_total'];
						}
					
					
						
echo '<div class="modal-content">
            	<div class="modal-body">
					<h2><div align="center"><p class="alert alert-warning"><input type="text" value="'.$producto['descrip'].'" class="form-control" id="Descrip" style="text-transform:uppercase;"/></p></div></h2>
						<table class="table table-bordered table-condensed table-hover">
							<tr>
								<th><div align="center">Codigo:<p class="alert alert-success"><input type="text" value="'.$producto['id_prod'].'" class="form-control" id="id_prod" disabled/></p></div></th>
								<th><div align="center">Tipo:<p class="alert alert-warning"><select class="form-control" id="Tipo" class="form-control" id="Descrip">
                            	  <option value="'.$producto['tipo'].'" selected="selected"><b>'.$producto['tipo'].'</b></option>
                                  <option value="ABARROTES">ABARROTES</option>
                                  <option value="CARNICOS">CARNICOS</option>
                                  <option value="LACTEOS">LACTEOS</option>
								  <option value="CONGELADOS">CONGELADOS</option>
								  <option value="ASEO">ASEO</option>
                                  <option value="ESCRITORIO">ESCRITORIO</option>
                                  <option value="OTROS">OTROS</option>
                                </select></p></div></th>  
								<th><div align="center">Cod-Ref:<p class="alert alert-warning"><input type="text" value="'.$cod_ref.'" class="form-control" id="cod_ref" class="form-control" id="Descrip" style="text-transform:uppercase;"/></p></div></th>
								<th><div align="center">Creado el:<p class="alert alert-success"><input type="text" value="'.$producto['creacion'].'" class="form-control" id="creacion" disabled/></p></div></th>
								<th><div align="center">Cantidad Total:<p class="alert alert-success"><input type="text" value="'.$cant_total.'" class="form-control" id="cant_total" disabled/></p></div></th>
							</tr>
							<tr>
								<th colspan="5"><div align="center"><input type="button" class="btn btn-success" value="Actualizar Item" onclick="ActItem();"/></div></th>
							</tr>
  						</table>
						</br>
   


		</div>
		  </div>';
?>						