<?php 
include_once 'model/UsuarioDAO.php';
include_once 'model/Usuario.php';

class UsuarioController{

  public function getUsuarios() {
    header('Content-Type: application/json; charset-utf-8');

    $listaUsuarios = UsuarioDAO::getUsuarios();
    $data = [];

    foreach ($listaUsuarios as $usuario) {
      $data[] = $usuario->toArray();
    }

    echo json_encode($data);
  }

}
?>