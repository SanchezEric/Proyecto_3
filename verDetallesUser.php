		<?php
			include_once 'header_admin.php';
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
				<table border style= "background-color:lightgrey; margin-left: 10%; margin-top: 5%">
					<tr style= "background-color:#c1bbbb">
						<th>&nbsp Nombre &nbsp </th>
						<th>&nbsp Password &nbsp </th>
						<th>&nbsp IMG &nbsp </th>
						<th>&nbsp Rol &nbsp </th>
						<th>&nbsp Estado &nbsp </th>
					</tr>

					<?php

					//recorremos los resultados y los mostramos por pantalla
					//la función substr devuelve parte de una cadena. A partir del segundo parámetro (aquí 0) devuelve tantos carácteres como el tercer parámetro (aquí 25)
					while ($prod = mysqli_fetch_array($datos)){
						echo "<tr><td>&nbsp $prod[nom] &nbsp</td><td>&nbsp $prod[pass] &nbsp</td><td>&nbsp $prod[img] &nbsp</td>";


						echo "<td>";
						if($prod['rol']==1){
							echo " &nbsp Administrador &nbsp ";
						} else {
							echo " &nbsp Usuario &nbsp ";
						}


						echo "</td><td>";

						if($prod['Activo']==1){
							echo "&nbsp Activado &nbsp";
						} else {
							echo "&nbsp Desactivado &nbsp";
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
		<div class="btn btn-danger" style = "margin-left: 10%">
						<a href="AdministrarUser.php">Volver</a>
				</div>
		<?php
		include_once 'footer.php';
		?>