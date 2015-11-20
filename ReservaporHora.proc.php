<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');
			
			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			

				session_start();
				
				// echo $_SESSION['Freser'];
				// echo $_SESSION['id_user'];
				// echo $_SESSION['id_recurso_reserva'];
				

				for ($x = 8; $x <= 22; $x++) {

				$hore[$x]=$_REQUEST['ch'.$x];	
				echo $hore[$x];
				echo "<br>";
							if($hore[$x] == $x){
			 	$sql = "INSERT INTO reserva (id_user, id_recurso, dateini, horareserva) VALUES ('$_SESSION[id_user]', '$_SESSION[id_recurso_reserva]', '$_SESSION[Freser]', '$x')";
			  	echo "$sql<br/>";
				// echo "$hore1<br/>";
				$datos = mysqli_query($con, $sql);
				//echo"ha entrado<br>";
			}	

				}

		header("location:user.php");
		?>
		<a href="resultados.php">To reserva hora</a>
	</body>
</html>