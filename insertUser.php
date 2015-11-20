		<?php
			include_once 'header_admin.php';
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');

			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM usuario ";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			// echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			?>
			<div style= "margin-left: 2%">
			<h3>Nuevo Usuario</h3>
		</div>
		<div style= "background-color:lightgrey; margin-left: 5%; margin-top: 2%; width: 180px">
			<form action="insertUser.proc.php" method="GET">
				<strong>Nombre:</strong><br/>
				<input type="text" name="nom" size="20" maxlength="30"required/><br/>
				<strong>Password:</strong><br/>
				<!-- <textarea name="des" cols="20" rows="5"></textarea><br/> -->
				<input type="text" name="passw" size="20" maxlength="30"required/><br/>

				<strong>Rol:</strong><br/>
				<select name="tip">
					<option value="0" selected>User</option>
					<option value="1">Admin</option>	
				</select><br/>

				<strong>Estado:</strong><br/>			
				<select name="estad">
					<option value="0">Desactivado</option>
					<option value="1" selected>Activado</option>	
				</select><br/>

				<strong>IMG:</strong><br/>
				<input type="text" name="imag" size="5" maxlength="8"required/><br/><br/>

				<input type="submit" value="Enviar" class="btn btn-success">
			</form>
		</div>
		<br/><br/>
		<div class="btn btn-danger" style = "margin-left: 2%">
			<a font color= "black" href="AdministrarUser.php">Volver</a>
		</div>
		<?php
			include_once 'footer.php';
		?>