<!DOCTYPE html>
<html>
<head>
	<title>Bodega</title>
	<meta charset="utf-8">
	<script src="js/jquery.colorbox.js"></script>
	<script src="js/jquery.colorbox-es.js"></script>
	<script src="js/jquery-2.1.4.js"></script>
	<link rel="stylesheet" href="css/estilos.css" type="text/css" media="all"/>
</head>
<body>
	<div id="wrapper">
		<?php
			//conectado, seleccionando la base de datos
			$enlace = mysql_connect('localhost', 'root', '')
				or die('conexion fallida: ' . mysql_error());
			echo 'Conectado exitosamente';
			mysql_select_db('progra4') or die('no se pudo conectar la base de datos');	
			//realizar una consulta mysql
			$consulta = "SELECT * FROM `bodega`";
			$resultado = mysql_query($consulta) or die('Consulta fallida: ' . mysql_error());
			 // imprimir los resultados en html
		?>
			<table border="1">
				<thead>
					<tr>
						<th>Descripción</th>
						<th>Ubicación</th>
						<th>N° Bodega</th>
					</tr>
				</thead>
		<?php
			while($linea = mysql_fetch_array($resultado)){
				echo "\t<tr>\n";
				echo "\t\t<td><a href='prod.php?cbod=".$linea['codBodega']."'>".$linea['descripcion']."</td>";
				echo "\t\t<td>".$linea['ubicacion']."</td>";
				echo "\t\t<td>".$linea['numero']."</td>";
				echo "\t</tr>\n";
			}
			echo "</table>\n";
			mysql_free_result($resultado);
			mysql_close($enlace);
		?>
	</div><!--div wrapper-->
</body>
</html>