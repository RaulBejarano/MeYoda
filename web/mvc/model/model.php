<?php 

class Usuario {
 public $id;
 public $nombre;
 public $apellidos;
 public $email;
 public $pss;
}

class Carta {
 public $id;
 public $nombre;
 public $descripcion;
}

class Venta {
 public $id;
 public $idCarta;
 public $idUsuario;
 public $precioDeseado;
 public $aprobada;
}

class Puja {
 public $id;
 public $idCarta;
 public $idVenta;
 public $precioPuja;
}



 ?>