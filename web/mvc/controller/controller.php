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
		if (isset($_GET['id'])){
			$condicion='1 = 1';
			
			if(isset($_GET['condicion'])){
				$condicion = $_GET['condicion'];				
			}
			
			$sql="SELECT V.*, C.nombre, C.descripcion, C.url FROM Venta V, Carta C 
				WHERE V.idCarta=C.id AND V.idUsuario = ".$_GET['id']." AND ".$condicion;
			
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
			
			$condicion='1 = 1';
			
			if(isset($_GET['condicion'])){
				$condicion = $_GET['condicion'];				
			}
			
			$sql="SELECT V.*, C.* FROM Venta V, Carta C 
				WHERE V.idCarta=C.id AND V.idUsuario != ".$_GET['id']." AND ".$condicion;
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
			
			$condicion='1 = 1';
			
			if(isset($_GET['condicion'])){
				$condicion = $_GET['condicion'];				
			}
			
			$sql="SELECT P.*, C.id AS `idCarta`, C.nombre, C.descripcion, C.url 
				FROM Puja P, Venta V, Carta C 
				WHERE P.idVenta=V.id AND V.idCarta=C.id AND P.idUsuario = ".$_GET['id']." AND ".$condicion;
			$result = $linkbd->query($sql);
			
			// id, idUsuario, idCarta, valordeseado, aprobada, vendida, pago_enviado, nombre, descripcion, url
			
			$puja ;
			$pujas = array();
			while($row = mysqli_fetch_array($result)){
				$puja = new Puja ();
				$puja->id = $row['id'];
				$puja->idUsuario = $row['idUsuario'];
				$puja->idVenta = $row['idVenta'];
				$puja->precioPuja = $row['valorpuja'];
				
				$puja->carta = new Carta();
				$puja->carta->id = $row['idCarta'];
				$puja->carta->nombre = $row['nombre'];
				$puja->carta->descripcion = $row['descripcion'];
				$puja->carta->url = $row['url'];
				
				array_push($pujas, $puja);				
			}
			
			echo json_encode($pujas);
		}			
	} else if ($op == "nuevaVenta"){
		if (isset($_GET["idUsuario"]) && isset($_GET["idCarta"]) && isset($_GET["valordeseado"])){
			
			$sql="INSERT INTO Venta (idUsuario, idCarta, valordeseado) VALUES (($_GET["idUsuario"], $_GET["idCarta"], ". $_GET["valordeseado"].")";

			$result = $linkbd->query($sql);
			
			
			if ($linkbd->query($sql)) {
				echo "true";			
			}else{
				echo "false";			
			}	
			exit;
		}			
	} else if ($op == "nuevaPuja"){
		if (isset($_GET["idUsuario"]) && isset($_GET["idVenta"]) && isset($_GET["valorpuja"])){
			
			$sql="INSERT INTO Puja (idUsuario, idVenta, valorpuja) VALUES (".$_GET["idUsuario"].", ".$_GET["idVenta"].", ". $_GET["valorpuja"].")";

			$result = $linkbd->query($sql);
			
			
			if ($linkbd->query($sql)) {
				echo "true";			
			}else{
				echo "false";			
			}	
			exit;
		}			
	} else if ($op == "getCartas"){
			
			$sql="SELECT * FROM Carta";
			$result = $linkbd->query($sql);
			
			
			$puja ;
			$pujas = array();
			while($row = mysqli_fetch_array($result)){
				$carta = new Carta ();
				$carta->id=$row['id'];
				$carta->nombre=$row['nombre'];
				$carta->descripcion=$row['descripcion'];
				$carta->url=$row['url'];
				
				array_push($pujas, $puja);				
			}
			
			echo json_encode($pujas);
					
	} 


?>