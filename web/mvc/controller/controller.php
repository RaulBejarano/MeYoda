<?php 
	include '../model/model.php';

	$linkbd = new mysqli("mysql.manu.juanlu.is","talentum","hypernova", "meyodadb");
		
	if(!$linkbd->select_db("meyodadb")){
		
		exit;
	}
		
		
	$op = $_GET["op"];

	if ($op == "login"){ //OPERACION DE LOGIN

		if (isset($_GET["email"]) && isset($_GET["contrasena"])){
			
			$sql="SELECT id FROM Usuario WHERE email = '".$_GET["email"]."' AND contrasena = MD5('".$_GET["contrasena"]."') ";
			
			$result = $linkbd->query($sql);
			
			 // Solo devolverá una linea porque email es clave unica
			if ($linkbd->affected_rows == 1) {
				$row = mysqli_fetch_array($result);
				echo $row['id'];
				exit;
			}else{
				// echo "FAIL: " . $linkbd->error;
				echo "";
				exit;
			}
			
			
		}

									
	} else if ($op == "registro"){

		if (isset($_GET["nombre"]) && isset($_GET["apellidos"]) && isset($_GET["email"]) && isset($_GET["contrasena"])){
			$sql="INSERT INTO Usuario (nombre, apellidos, email, contrasena) VALUES (
			'".$_GET['nombre']."',
			'".$_GET['apellidos']."',
			'".$_GET['email']."',
			MD5('".$_GET['contrasena']."')
			)";
		
			

			
			if ($linkbd->query($sql)) {
				echo "true";
			
			}else{
				echo "false";
			
			}	
			exit;
		}
		
		echo "false";
		exit;
		
	} else if ($op = "misVentas"){
		if (isset($_GET["id"])){
			
			$sql="SELECT V.*, C.* FROM Venta V, Carta C WHERE V.idCarta=C.id AND V.idUsuario = ".$_GET['id'];
			$result = $linkbd->query($sql);
			
			// id, idUsuario, idCarta, valordeseado, aprobada, vendida, pago_enviado, nombre, descripcion, url
			
			$venta ;
			$ventas = array();
			while($row = mysqli_fetch_array($result)){
				$venta = new Venta();
				$venta->id=$row['id'];
				$venta->carta = new Carta();
				
				
				array_push($ventas,$venta);
				
				
				$row['id']
			}
			
			
		}			
	}


?>