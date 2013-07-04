<?php 
	include '../model/model.php';

	$op = $_GET["op"];

	if ($op=="login"){ //OPERACION DE LOGIN
		
		$linkbd=mysqli("mysql.manu.juanlu.is","talentum","hypernova", "meyodadb");
		if($linkbd->select_db("meyodadb")){
			$sql="SELECT id FROM Usuario WHERE email = ".$_GET["email"]." AND contrasena = AES_ENCRYPT(".$_GET["contrasena"].", id)";
		
			$result = mysqli_query(&linkbd, $sql);
			$userId = "";
			while($row = mysqli_fetch_array($result)){ // Solo devolverá una linea porque email es clave unica
				 $userId=$row['id']
			}
			if($userId!=""){
				$_SESSION["userid"]=$userId;
			}
			
			echo $userId;
		}else{
			echo "[ERROR] Conexion BBDD"
		}
				
	} else if ($op = "registro"){
		$linkbd=mysqli("mysql.manu.juanlu.is","talentum","hypernova", "meyodadb");
		if($linkbd->select_db("meyodadb")){
			$sql="INSERT INTO Usuario (nombre, apellidos, email, contrasena) VALUES (
			'".$_GET['nombre']."',
			'".$GET['apellidos']."',
			'".$GET['email']."',
			AES_ENCRYPT('".$GET['contrasena']."', id),
			)";
		
			$result = mysqli_query(&linkbd, $sql);
			if(result) {
				echo "true"	
			} else {
				echo "false"
			}						
			
		}else{
			echo "[ERROR] Conexion BBDD"
		}
	}

	


?>