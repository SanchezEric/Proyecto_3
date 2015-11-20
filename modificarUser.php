
		<?php
			include_once 'header_admin.php';
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
				<div style= "margin-left: 2%">
					<h3>Modificar Usuario</h3>
				</div>
				<div style= "background-color:lightgrey; margin-left: 5%; margin-top: 2%; width: 180px">
					<form name="formulario1" action="modificarUser.proc.php" method="get">
					<input type="hidden" name="id" value="<?php echo $prod['id_user']; ?>">

					<strong>Nombre:</strong><br/>
					<input type="text" name="nom" size="20" maxlength="25" value="<?php echo $prod['nom']; ?>"required/><br/><br/>

					<strong>Password:</strong><br/>
					<input type="text" name="passw" size="20" maxlength="25" value="<?php echo $prod['pass']; ?>"required/><br/><br/>
					
					<strong>Rol:</strong><br/>
					<?php
					if($prod['rol']==1){
							// echo "	Es admin";
						?>
							<select name="tip">
								<option value="0">Usuario</option>
								<option value="1" selected>Administrador</option>	
							</select>
						<?php
						} else {
							// echo "Es user";
						?>
							<select name="tip">
								<option value="0" selected>Usuario</option>
								<option value="1">Administrador</option>	
							</select>
						<?php
							}
						?>	
					
					



					<br/><br/>
					<strong>IMG:</strong><br/>
					<input type="text" name="imag" size="5" maxlength="8" value="<?php echo $prod['img']; ?>"required/><br/><br/>					
					<input type="submit" value="Guardar" class="btn btn-success">
					</form>
				</div>

				<?php
			} else {
				echo "Usuario con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<div class="btn btn-danger" style = "margin-left: 2%">
			<a font color= "black" href="AdministrarUser.php">Volver</a>
		</div>
		<?php
			include_once 'footer.php';
		?>