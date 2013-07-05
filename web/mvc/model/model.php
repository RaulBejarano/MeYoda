<?php 

class Usuario {
 public $id;
 public $nombre;
 public $apellidos;
 public $email;
 public $contadorVenta;
 public $contadorPuja;
}

class Carta {
 public $id;
 public $nombre;
 public $descripcion;
}

class Venta {
 public $id;
 public $carta;
 public $usuario;
 public $precioDeseado;
 public $aprobada;
}

class Puja {
 public $id;
 public $idUsuario
 public $idVenta;
 public $carta;
 public $precioPuja;
}



 ?>