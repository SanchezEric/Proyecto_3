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

			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT * FROM usuario WHERE id_user=$_REQUEST[id]";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				?>
				<table border>
					<tr>
						<th>Nombre</th>
						<th>Password</th>
						<th>IMG</th>
						<th>Rol</th>
						<th>Estado</th>
					</tr>

					<?php

					//recorremos los resultados y los mostramos por pantalla
					//la función substr devuelve parte de una cadena. A partir del segundo parámetro (aquí 0) devuelve tantos carácteres como el tercer parámetro (aquí 25)
					while ($prod = mysqli_fetch_array($datos)){
						echo "<tr><td>$prod[nom]</td><td>$prod[pass]</td><td>$prod[img]</td>";


						echo "<td>";
						if($prod['rol']==1){
							echo "Administrador";
						} else {
							echo "Usuario";
						}


						echo "</td><td>";

						if($prod['Activo']==1){
							echo "Activado";
						} else {
							echo "Desactivado";
						}

						echo "</td></tr>";


					}

					?>

				</table>

					<?php
			} else {
				echo "Producto con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<a href="AdministrarUser.php">Volver</a>
	</body>
</html>