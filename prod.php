<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Productos</title>
	</head>
	<body>
		<div id="wrapper">
			<?php
				$cbodega = $_GET['cbod'];
				$enlace = mysql_connect('localhost', 'root', '')
				or die('conexion fallida: ' . mysql_error());
				echo 'Conectado exitosamente';
				mysql_select_db('progra4') or die('no se pudo conectar la base de datos');	
				//realizar una consulta mysql
				$consulta = "SELECT producto, precio, stock FROM Producto Where CodBodega ='$cbodega'";
				$resultado = mysql_query($consulta) or die('Consulta fallida: ' . mysql_error());
			?>
			<table border="1">
				<thead>
					<tr>
						<th>Producto</th>
						<th>Precio</th>
						<th>Stock</th>
					</tr>
				</thead>
			<?php
				while($linea = mysql_fetch_array($resultado, MYSQL_ASSOC)){
				echo "\t<tr>\n";
				foreach ($linea as $valor_columna){
					echo "\t\t<td>$valor_columna</td>\n";
				}
				echo "\t</tr>\n";

				}
				echo "</table>\n";
				mysql_free_result($resultado);
				mysql_close($enlace);
			?>
		</div>
	</body>
</html>