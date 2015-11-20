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
			$sql = "UPDATE recurso SET nombre='$_REQUEST[nom]', descr='$_REQUEST[descrip]', img='$_REQUEST[imag]', estado=0, categoria='$_REQUEST[tip]' WHERE id_recurso='$_REQUEST[id]'";

			 echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			
			 header("location: AdministrarRecur.php")
		?>
	</body>
</html>