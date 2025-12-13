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

  public function eliminarUsuario() {
    header('Content-Type: application/json; charset-utf-8');

    if (!isset($_GET['idUsuario'])) {
      echo json_encode(['success' => false, 'message' => 'ID de usuario no proporcionado.']);
      return;
    }

    $idUsuario = $_GET['idUsuario'];
    $eliminado = UsuarioDAO::eliminarUsuario($idUsuario);

    if ($eliminado) {
      echo json_encode(['success' => true, 'message' => 'Usuario eliminado correctamente.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Error al eliminar el usuario.']);
    }

  }

}
?>