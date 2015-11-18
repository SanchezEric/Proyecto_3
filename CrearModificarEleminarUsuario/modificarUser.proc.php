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
			$sql = "UPDATE usuario SET nom='$_REQUEST[nom]', pass='$_REQUEST[passw]', rol='$_REQUEST[tip]', img='$_REQUEST[imag]' WHERE id_user='$_REQUEST[id]'";

			// echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: AdministrarUser.php")
		?>
	</body>
</html>