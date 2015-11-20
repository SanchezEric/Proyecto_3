
		<?php
			include_once 'header_admin.php';
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');

			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT * FROM recurso WHERE id_recurso=$_REQUEST[id]";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql que devuelve el producto en cuestión
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$prod=mysqli_fetch_array($datos);
				?>
				<div style= "margin-left: 2%">
					<h3>Modificar Recurso</h3>
				</div>
				<div style= "background-color:lightgrey; margin-left: 5%; margin-top: 2%; width: 180px">
					<form name="formulario1" action="modificarRecur.proc.php" method="get">
					<input type="hidden" name="id" value="<?php echo $prod['id_recurso']; ?>">

					<strong>Nombre:</strong><br/>
					<input type="text" name="nom" size="20" maxlength="25" value="<?php echo $prod['nombre']; ?>"required/><br/><br/>

					<strong>Descrición:</strong><br/>
					<input type="text" name="descrip" size="20" maxlength="25" value="<?php echo $prod['descr']; ?>"required/><br/><br/>
					
					<?php
					if($prod['categoria']==1){		
						?>
							<select name="tip">
								<option value="1"selected>Aula</option>
								<option value="2">Sala</option>
								<option value="3">Hard y Soft</option>
								<option value="4">Otros</option>	
							</select>
						<?php
						} else if($prod['categoria']==2) {
							// echo "Es user";
						?>
							<select name="tip">
								<option value="1">Aula</option>
								<option value="2"selected>Sala</option>
								<option value="3">Hard y Soft</option>
								<option value="4">Otros</option>		
							</select>
						<?php
							} else if($prod['categoria']==3) {
							// echo "Es user";
						?>
							<select name="tip">
								<option value="1">Aula</option>
								<option value="2">Sala</option>
								<option value="3"selected>Hard y Soft</option>
								<option value="4">Otros</option>	
							</select>
						<?php
							} else if($prod['categoria']==4) {
							// echo "Es user";
						?>
							<select name="tip">
								<option value="1">Aula</option>
								<option value="2">Sala</option>
								<option value="3">Hard y Soft</option>
								<option value="4"selected>Otros</option>	
							</select>
						<?php
							};
						?>
							
					
					



					<br/><br/>
					<strong>IMG:</strong><br/>
					<input type="text" name="imag" size="5" maxlength="20" value="<?php echo $prod['img']; ?>"required/><br/><br/>					
					<input type="submit" value="Guardar" class="btn btn-success">
					</form>
				</div>

				<?php
			} else {
				echo "Recuso con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<div class="btn btn-danger" style = "margin-left: 2%">
			<a font color= "black" href="AdministrarRecur.php">Volver</a>
		</div>
		<?php
			include_once 'footer.php';
		?>