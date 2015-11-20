<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');

			$sql = "INSERT INTO recurso (nombre, descr, img, estado, categoria) VALUES ('$_REQUEST[nom]', '$_REQUEST[descrip]', '$_REQUEST[imag]', 0, '$_REQUEST[tip]')";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			
			header("location: AdministrarRecur.php")
			
		?>
	</body>
</html>