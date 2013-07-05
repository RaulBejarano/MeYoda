<?php 
	include '../model/model.php';
	$linkbd = new mysqli("mysql.manu.juanlu.is","talentum","hypernova", "meyodadb");		
	if(!$linkbd->select_db("meyodadb")){		
		exit;
	}
		
		
	$op = $_GET["op"];
	
	if ($op == "login"){ //OPERACION DE LOGIN
		if (isset($_GET["email"]) && isset($_GET["contrasena"])){			
			$sql="SELECT * FROM Usuario WHERE email = '".$_GET["email"]."' AND contrasena = MD5('".$_GET["contrasena"]."') ";
			$result = $linkbd->query($sql);
			
			
			$usuario;
				
			// Solo devolverá una linea porque email es clave unica
			if ($linkbd->affected_rows == 1) {
				$row = mysqli_fetch_array($result);				
				$usuario = new Usuario();
				
				$usuario->id=$row['id'];
				$usuario->nombre=$row['nombre'];
				$usuario->apellidos=$row['apellidos'];
				$usuario->email=$row['email'];
				
				
				$sql="SELECT COUNT(*) AS numVentas FROM Venta WHERE idUsuario = ".$usuario->id;
				$result = $linkbd->query($sql);
				$row = mysqli_fetch_array($result);
				$usuario->contadorVenta=$row['numVentas'];
				
				$sql="SELECT COUNT(*) AS numPujas FROM Puja WHERE idUsuario = ".$usuario->id;
				$result = $linkbd->query($sql);
				$row = mysqli_fetch_array($result);
				$usuario->contadorPuja=$row['numPujas'];
			}
			
			echo json_encode($usuario);
			exit;
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
		
	} else if ($op == "misVentas"){
		if (isset($_GET["id"])){
			
			$sql="SELECT V.*, C.* FROM Venta V, Carta C WHERE V.idCarta=C.id AND V.idUsuario = ".$_GET['id'];
			$result = $linkbd->query($sql);
			
			// id, idUsuario, idCarta, valordeseado, aprobada, vendida, pago_enviado, nombre, descripcion, url
			
			$venta ;
			$ventas = array();
			while($row = mysqli_fetch_array($result)){
				$venta = new Venta();
				$venta->id = $row['id'];
				$venta->valordeseado = $row['valordeseado'];
				$venta->aprobada = $row['aprobada'];
				$venta->vendida = $row['vendida'];
				$venta->pago_enviado['pago_enviado'];
			
				$venta->carta = new Carta();
				$venta->carta->id = $row['idCarta'];
				$venta->carta->nombre = $row['nombre'];
				$venta->carta->descripcion = $row['descripcion'];
				$venta->carta->url = $row['url'];
				
				array_push($ventas, $venta);				
			}
			
			echo json_encode($ventas);
		}			
	} else if ($op == "enVenta"){
		if (isset($_GET["id"])){
			
			$sql="SELECT V.*, C.* FROM Venta V, Carta C WHERE V.idCarta=C.id AND V.idUsuario != ".$_GET['id'];
			$result = $linkbd->query($sql);
			
			// id, idUsuario, idCarta, valordeseado, aprobada, vendida, pago_enviado, nombre, descripcion, url
			
			$venta ;
			$ventas = array();
			while($row = mysqli_fetch_array($result)){
				$venta = new Venta();
				$venta->id = $row['id'];
				$venta->valordeseado = $row['valordeseado'];
				$venta->aprobada = $row['aprobada'];
				$venta->vendida = $row['vendida'];
				$venta->pago_enviado['pago_enviado'];
			
				$venta->carta = new Carta();
				$venta->carta->id = $row['idCarta'];
				$venta->carta->nombre = $row['nombre'];
				$venta->carta->descripcion = $row['descripcion'];
				$venta->carta->url = $row['url'];
				
				array_push($ventas, $venta);				
			}
			
			echo json_encode($ventas);
		}			
	} else if ($op == "misPujas"){
		if (isset($_GET["id"])){
			
			$sql="SELECT P.*, C.id AS `idCarta`, C.nombre, C.descripcion, C.url 
				FROM Puja P, Venta V, Carta C 
				WHERE P.idVenta=V.id AND V.idCarta=C.id AND P.idUsuario = ".$_GET['id'];
			$result = $linkbd->query($sql);
			
			// id, idUsuario, idCarta, valordeseado, aprobada, vendida, pago_enviado, nombre, descripcion, url
			
			$puja ;
			$pujas = array();
			while($row = mysqli_fetch_array($result)){
				
				
				array_push($ventas, $venta);				
			}
			
			echo json_encode($ventas);
		}			
	}


?>