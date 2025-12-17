<?php 

class DataBase {
  public static function connect($host = 'localhost', $user = 'root', $pass = '', $db = 'pizzeria_oviedo') {
    $con = new mysqli($host, $user, $pass, $db);
    $con->set_charset("utf8mb4");

    if ($con == false) {
      die("Error al conectar a la base de datos");
    } else {
      return $con;
    }
  }
}
?>