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

			//lanzamos la sentencia sql que devuelve el producto en cuestión
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$prod=mysqli_fetch_array($datos);
				?>
				<form name="formulario1" action="modificarUser.proc.php" method="get">
				<input type="hidden" name="id" value="<?php echo $prod['id_user']; ?>">
				Nombre:<br/>
				<input type="text" name="nom" size="20" maxlength="25" value="<?php echo $prod['nom']; ?>"><br/>
				Password:<br/>
				<input type="text" name="passw" size="20" maxlength="25" value="<?php echo $prod['pass']; ?>"><br/>
				
				Rol:<br/>
				<input type="text" name="tip" size="20" maxlength="25" value="<?php echo $prod['rol']; ?>"><br/>
				<br/>
				Precio:<br/>
				<input type="text" name="imag" size="5" maxlength="8" value="<?php echo $prod['img']; ?>"><br/>
				<input type="submit" value="Guardar">
				</form>
				<?php
			} else {
				echo "Producto con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<a href="index.php">Volver</a>
	</body>
</html>