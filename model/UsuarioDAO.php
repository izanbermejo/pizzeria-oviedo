<?php 

include_once 'database/database.php';
include_once 'model/Usuario.php';

class UsuarioDAO {

  public static function getUsuarios() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaUsuarios = [];

    while ($usuario = $results->fetch_object('Usuario')) {
      $listaUsuarios[]=$usuario;
    }

    $con->close();
    return $listaUsuarios;
  }

  
}
?>