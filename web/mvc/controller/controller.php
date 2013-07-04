<?php 
	include '../model/model.php';

	function lanzarQuery($sql){
		$linkbd=mysqli("mysql.manu.juanlu.is","talentum","hypernova", "meyodadb");
		if($linkbd->select_db("meyodadb")){
			$result = mysqli_query(&linkbd, $sql);
			return $result;
		} else {
			echo "[ERROR] Conexion BBDD"
		}
		
		return null;		
	}
	
	$op = $_GET["op"];

	if ($op = "login"){ //OPERACION DE LOGIN
		
		$sql="SELECT id FROM Usuario WHERE email = ".$_GET["email"]." AND contrasena = MD5(".$_GET["contrasena"].")";
		$result = lanzarQuery($sql);
		$userId = "";
		while($row = mysqli_fetch_array($result)){ // Solo devolverá una linea porque email es clave unica
			 $userId=$row['id']
		}
			
		echo $userId;
				
	} else if ($op = "registro"){
		
			$sql="INSERT INTO Usuario (nombre, apellidos, email, contrasena) VALUES (
			'".$_GET['nombre']."',
			'".$_GET['apellidos']."',
			'".$_GET['email']."',
			MD5('".$_GET['contrasena']."'),
			)";
		
			$result = lanzarQuery(&linkbd, $sql);
			if($result) {
				echo "true"	
			} else {
				echo "false"
			}						
			
		}else{
			echo "[ERROR] Conexion BBDD"
		}
	} else if ($op = ""){
		
	}


?>