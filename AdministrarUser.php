		
		<?php
			include_once 'header_admin.php';
		?>
		
	    
	    
	
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');

			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM usuario ORDER BY Activo DESC";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

		?>
		<div style= " margin-left: 5%; margin-top: 2% ">
			<h1>Usuarios</h1>
		</div>
		<div>
			<a style='color: blue' href="insertUser.php"><i class='fa fa-plus-square fa-2x fa-pull-left fa-border'></i></a>
		<div>
		<div style= "margin-left: 10%; margin-top: 1% ">
			<table border style= "background-color:lightgrey">
				<tr style= "background-color:#c1bbbb">
					<th>&nbsp Nombre &nbsp</th>
					<th>&nbsp Rol &nbsp</th>
					<th>&nbsp Imagen &nbsp</th>
					<th>&nbsp Estado &nbsp</th>
					<th>&nbsp Operaciones &nbsp</th>
				</tr>

				<?php

					while ($prod = mysqli_fetch_array($datos)){
						echo "<td>";

						echo "&nbsp <a style='color: blue' href='verDetallesUser.php?id=$prod[id_user]'>$prod[nom]</a>&nbsp";
						echo "</td><td>";

						if($prod['rol']==1){
							echo "&nbsp Administrador &nbsp";
						} else {
							echo "&nbsp Usuario &nbsp";
						}

						echo "</td><td>&nbsp $prod[img] &nbsp</td><td>";

						if($prod['Activo']==1){
							echo "&nbsp Activado &nbsp";
						} else {
							echo "&nbsp Desactivado &nbsp";
						}



						echo "</td><td>";
						
						//enlace a la página que modifica el producto pasándole la id (clave primaria)
						if($prod['Activo']==1){
							echo "<a style='color: blue' href='modificarUser.php?id=$prod[id_user]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
						}

						//enlace a la página que elimina el producto pasándole la id (clave primaria)
						if($prod['Activo']==1){
							echo "<a style='color: blue' href='eliminarUser.php?id=$prod[id_user]'><i class='fa fa-trash fa-2x fa-pull-left fa-border' title='borrar'></i></a>";
						}

						//enlace a la página que modifica el producto (poniendo el campo pro_actiu a 0 o a 1, lo activa o lo desactiva) pasándole la id (clave primaria)
						if($prod['Activo']==1){
							echo "<a style='color: blue' href='ac_desacUser.proc.php?id=$prod[id_user]'><i class='fa fa-eye-slash fa-2x fa-pull-left fa-border' title='desactivar'></i></a>";
						} else {
							echo "<a style='color: blue' href='ac_desacUser.proc.php?id=$prod[id_user]'><i class='fa fa-eye fa-2x fa-pull-left fa-border' title='activar'></i></a>";
						}

						echo "</td></tr>";
					}

				?>
				
			</table>
		</div>


		
		<br><br>
		<div class="btn btn-danger" style = "margin-left: 10%">
						<a font color= "black" href="contBBDD.php">Volver</a>
				</div>
		<?php
			//cerramos la conexión con la base de datos
			mysqli_close($con);
			include_once 'footer.php';
		?>
