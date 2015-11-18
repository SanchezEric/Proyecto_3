<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	    <!-- full d'estils per a fer servir fonts d'icons -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	    <style>
	    	a {color: blue;}
	    </style>
	</head>
	<body>
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
			<table border>
				<tr>
					<th>Nombre</th>
					<th>Rol</th>
					<th>Imagen</th>
					<th>Estado</th>
					<th>Operaciones</th>
				</tr>

				<?php

					while ($prod = mysqli_fetch_array($datos)){
					echo "<td>";

					echo "<a href='verDetallesUser.php?id=$prod[id_user]'>$prod[nom]</a>";
					echo "</td><td>";

					if($prod['rol']==1){
						echo "Administrador";
					} else {
						echo "Usuario";
					}

					echo "</td><td>$prod[img]</td><td>";

					if($prod['Activo']==1){
						echo "Activado";
					} else {
						echo "Desactivado";
					}



					echo "</td><td>";
					
					//enlace a la página que modifica el producto pasándole la id (clave primaria)
					if($prod['Activo']==1){
						echo "<a href='modificarUser.php?id=$prod[id_user]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
					}

					//enlace a la página que elimina el producto pasándole la id (clave primaria)
					if($prod['Activo']==1){
						echo "<a href='eliminarUser.php?id=$prod[id_user]'><i class='fa fa-trash fa-2x fa-pull-left fa-border' title='borrar'></i></a>";
					}

					//enlace a la página que modifica el producto (poniendo el campo pro_actiu a 0 o a 1, lo activa o lo desactiva) pasándole la id (clave primaria)
					if($prod['Activo']==1){
						echo "<a href='ac_desacUser.proc.php?id=$prod[id_user]'><i class='fa fa-eye-slash fa-2x fa-pull-left fa-border' title='desactivar'></i></a>";
					} else {
						echo "<a href='ac_desacUser.proc.php?id=$prod[id_user]'><i class='fa fa-eye fa-2x fa-pull-left fa-border' title='activar'></i></a>";
					}

					echo "</td></tr>";
				}




				?>
				
				

			</table>

			<a href="insertUser.php"><i class='fa fa-plus-square fa-2x fa-pull-left fa-border'></i></a>

				<?php
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
	</body>
</html>