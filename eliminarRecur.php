		<?php
			include_once 'header_admin.php';
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');

			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT * FROM recurso WHERE id_recurso=$_REQUEST[id]";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				?>
				<div style= " margin-left: 5%; margin-top: 2% ">
				<h3>Usuarios</h3>
				</div>
				<div style= "margin-left: 10%; margin-top: 1% ">
					<table border style= "background-color:lightgrey">
						<tr style= "background-color:#c1bbbb">
							<th> &nbsp Nombre &nbsp </th>
							<th> &nbsp IMG &nbsp </th>
							<th> &nbsp Categoria &nbsp </th>
						</tr>


						<?php
							//recorremos los resultados y los mostramos por pantalla
							//la función substr devuelve parte de una cadena. A partir del segundo parámetro (aquí 0) devuelve tantos carácteres como el tercer parámetro (aquí 25)
							$prod = mysqli_fetch_array($datos);
							echo "<tr><td>&nbsp $prod[nombre] &nbsp</td><td>&nbsp $prod[img] &nbsp</td>";

							if($prod['categoria']==1){
							echo "<td>&nbsp Aula &nbsp</td></tr>";
							} else if($prod['categoria']==2){
							echo "<td>&nbsp Sala &nbsp</td></tr>";
							}else if($prod['categoria']==3){
							echo "<td>&nbsp Hard y Soft &nbsp</td></tr>";
							}else if($prod['categoria']==4){
							echo "<td>&nbsp Otros &nbsp</td></tr>";
							};
		
						?>
					

						<tr>
							<td>&nbsp Eliminar? &nbsp</td>
							<td>
								<?php
									echo "<a style='color: blue' href='eliminarRecur.proc.php?id=$prod[id_recurso]'>&nbsp Si &nbsp</a>";
								?>
							</td>
							<td><a style='color: blue' href="AdministrarRecur.php">&nbsp No &nbsp </td>
						</tr>

					</table>
				</div>
				<?php
			} else {
				echo "Producto con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
					mysqli_close($con);
				?>
			<br/><br/>
			<div class="btn btn-danger" style = "margin-left: 10%">
						<a font color= "black" href="AdministrarRecur.php">Volver</a>
				</div>
		
		<?php
			include_once 'footer.php';
		?>