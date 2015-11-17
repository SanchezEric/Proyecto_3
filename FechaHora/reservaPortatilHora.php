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
			$sql = "SELECT * FROM reserva, usuario";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			// echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			?>
		<form action="reservaPortatilHora.proc.php" method="GET">
			Fecha inicio:<br/>
			<input type="datetime-local" name="fechaini"><br/>
			Fecha final:<br/>
			<input type="datetime-local" name="fechafinal"><br/>


			Usuario:<br/>
				<select name="tipUsu">
					<?php
						//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
						$sql = "SELECT * FROM usuario ORDER BY id_user";
						//lanzamos la sentencia sql que devuelve todos los tipos de producto
						$tiposUsuario = mysqli_query($con, $sql);

						while ($tipoUsuario=mysqli_fetch_array($tiposUsuario)){
							echo "<option value='$tipoUsuario[id_user]'";

							echo ">$tipoUsuario[nom]</option>";
						}

					?>
				</select><br/><br/>

			Rol:<br/>


				<select name="tiprecur">
				<?php
					//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
					$sql = "SELECT * FROM recurso ORDER BY id_recurso";
					//lanzamos la sentencia sql que devuelve todos los tipos de producto
					$tipos = mysqli_query($con, $sql);

					while ($tipo=mysqli_fetch_array($tipos)){
						echo "<option value='$tipo[id_recurso]'";

						echo ">$tipo[nombre]</option>";
					}

				?>
				</select><br/><br/>


			IMG:<br/>
			<input type="text" name="imag" size="5" maxlength="8"><br/>

			<input type="submit" value="Enviar">
		</form>
		<br/><br/>
		<a href="index.php">Volver</a>
	</body>
</html>