
		<?php
		include_once 'header.php';
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');
			
			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM reserva";
			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			// echo "$sql<br/>"
				$_SESSION['id_recurso_reserva']= $_REQUEST['id_recurso'];
				// echo $_SESSION['id_user'];
				// echo $_SESSION['id_recurso_reserva'];
				$recursop = $_REQUEST['id_recurso'];
			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
		?>


		<!-- Cambiar la action a ReservaporHora.proc.php -->
		<div style= "margin-left: 10%; margin-top: 5%">
			<h1>Fecha Reserva:</h1>

			<form action="ReservaporHora.php" method="GET">

				
				<input type="date" name="Freser" required/><br><br>
				<input type="submit" value="Enviar" class="btn btn-success">
				<div class="btn btn-danger">
					<a href="user.php">Volver</a>
				</div>


			</form>

		</div>


	

<!-- 
				<?php
				// $sql_recurso = "SELECT * FROM recurso, reserva WHERE 'id_recurso' = $recursop ORDER BY dateini DESC";
				// $sql_usuario = "SELECT * FROM usuario";
				// $datos_recurso = mysqli_query($con, $sql_recurso);
				// $datos_usuario = mysqli_query($con, $sql_usuario);
				// $recurso = mysqli_fetch_array($datos_recurso);
				// $usuario = mysqli_fetch_array($datos_usuario);
		

				?> -->








		<br/><br/>
		
<?php
	include_once 'footer.php';
?>