		<?php
		include_once 'header.php';

			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');
			
			
				$_SESSION['Freser']= $_REQUEST['Freser'];
				// echo $_SESSION['Freser'];
				// echo $_SESSION['id_user'];
		?>
		

		<form action="ReservaporHora.proc.php" method="GET">

			<div style="margin-left: 10%; margin-top: 5%" >
				<table border >
					
					<tr>
						<th>&nbsp Horas &nbsp </th>
						<th>&nbsp Seleccionar &nbsp</th>					
					</tr>
					</div>

					<?php
						for ($x = 8; $x <= 22; $x++) {
							echo "<tr><th><div style= 'background-color: #c1bbbb'>";

								echo "&nbsp $x:00 a $x:55 &nbsp";
								$sql = "SELECT * FROM reserva WHERE dateini = '$_SESSION[Freser]' && horareserva = '$x' && id_recurso = '$_SESSION[id_recurso_reserva]'";
								//Consultar en la BBDD
								$datos = mysqli_query($con, $sql);
								if(mysqli_num_rows($datos)<=0){
					?>
							</th></div><td>
								<div style= "background-color:lightgrey">
								<input type="checkbox" align = "center" name="ch<?php echo "$x"; ?>" value="<?php echo "$x"; ?>">
								<div>
					<?php
							}
							echo "</td></tr>"; 
						}
					?>
				</table>
			</div>
			<br/>
			<div style= "margin-left: 10%">
				<input type="submit" value="Enviar" class="btn btn-success">
				<div class="btn btn-danger">
						<a href="user.php">Volver</a>
				</div>
			</div>
		</form>
		
		<?php
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
<?php
	include_once 'footer.php';
?>