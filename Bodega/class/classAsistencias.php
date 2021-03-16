<?php

class sistema{
		public function conexion(){
			$host        = 'localhost';
			$usuario    = 'root';
			$password = 'sargentoaldea660';
			$dataBase  = 'g1';

			$conexion = mysql_connect($host, $usuario, $password);
			$seleccion = mysql_select_db($dataBase, $conexion);
			//$seleccion = mysqli_select_db($conexion,"g1");

		}

		function ResumenPorVencer(){
			$FechaActual = date('Y-m-d');
			$MenosUnMes = strtotime ('+2 month', strtotime($FechaActual));
			$DifVenci = date('Y-m-d', $MenosUnMes);
			$fecha = "0000-00-00";
			$cant = "0";
			$sql = mysql_query("SELECT * FROM lote l INNER JOIN producto p WHERE p.id_prod=l.id_prod AND l.vencimiento<>'$fecha' AND l.cant_actual<>'$cant' AND l.vencimiento BETWEEN '$FechaActual' AND '$DifVenci'");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$item = $item+1;
				}
			}else{
					$item = "0";
			}
			echo '<tr>
					<td><strong>Cantidad de Lotes por vencer dentro de 2 meses</strong></td>
					<td><div align="center"><strong><a href="xvencer.php">'.$item.'</a></strong></div></td>
				  </tr>';
		}


		function ResumenVencidas(){
			$fecha1 = date('Y-m-d');
			$fecha2 = "0000-00-00";
			$cant1 = "0";
			$sql = mysql_query("SELECT * FROM lote l inner join producto p where p.id_prod=l.id_prod and l.vencimiento<='$fecha1' and l.vencimiento<>'$fecha2' and l.cant_actual<>'$cant1'");
			$item2 = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$item2 = $item2+1;
				}
			}else{
					$item2 = "0";
			}
			echo '<tr>
					<td><strong>Cantidad de Lotes Vencidos</strong></td>
					<td><div align="center"><strong><a href="vencidos.php">'.$item2.'</a></strong></div></td>
				  </tr>';
		}



}
