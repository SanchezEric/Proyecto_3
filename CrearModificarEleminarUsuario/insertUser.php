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

			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM usuario ";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			// echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			?>
		<form action="insertUser.proc.php" method="GET">
			Nombre:<br/>
			<input type="text" name="nom" size="20" maxlength="30"><br/>
			Password:<br/>
			<!-- <textarea name="des" cols="20" rows="5"></textarea><br/> -->
			<input type="text" name="passw" size="20" maxlength="30"><br/>
			Rol:<br/>
			<select name="tip">
				<option value="0" selected>User</option>
				<option value="1">Admin</option>	
			</select><br/>

			Estado:<br/>
			<select name="estad">
				<option value="0">Desactivado</option>
				<option value="1" selected>Activado</option>	
			</select><br/>

			IMG:<br/>
			<input type="text" name="imag" size="5" maxlength="8"><br/><br/>

			<input type="submit" value="Enviar">
		</form>
		<br/><br/>
		<a href="AdministrarUser.php">Volver</a>
	</body>
</html>