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

			$sql = "INSERT INTO usuario (nom, pass, rol, Activo, img) VALUES ('$_REQUEST[nom]', '$_REQUEST[passw]', '$_REQUEST[tip]', '$_REQUEST[estad]', '$_REQUEST[imag]')";

			// echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			header("location: AdministrarUser.php")
			
		?>
	</body>
</html>