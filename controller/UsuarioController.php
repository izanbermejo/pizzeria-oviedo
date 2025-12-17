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

  public function getUsuarioById() {
    header('Content-Type: application/json; charset-utf-8');

    if (!isset($_GET['idUsuario'])) {
      echo json_encode(['success' => false, 'message' => 'ID de usuario no proporcionado.']);
      return;
    }

    $idUsuario = $_GET['idUsuario'];
    $usuario = UsuarioDAO::getUsuarioById($idUsuario);

    if ($usuario) {
      echo json_encode(['success' => true, 'data' => $usuario->toArray()]);
    } else {
      echo json_encode(['success' => false, 'message' => 'Usuario no encontrado.']);
    }
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

  public function guardarCambiosUsuario() {
    header('Content-Type: application/json; charset-utf-8');

    $data = json_decode(file_get_contents('php://input'), true);

    $usuario = new Usuario(
      $_GET['idUsuario'],
      $data['nombre_usuario'],
      $data['apellidos_usuario'],
      $data['email'],
      null, 
      $data['direccion'],
      $data['ciudad'],
      $data['tipo_usuario']
    );

    $actualizado = UsuarioDAO::updateUsuario($usuario);

    if ($actualizado) {
      echo json_encode(['success' => true, 'message' => 'Usuario editado correctamente.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Error al editar el usuario.']);
    }

  }

  public function guardarNuevoUsuario() {
    header('Content-Type: application/json; charset-utf-8');

    $data = json_decode(file_get_contents('php://input'), true);

    $usuario = new Usuario(
      0,
      $data['nombre_usuario'],
      $data['apellidos_usuario'],
      $data['email'],
      password_hash($data['contrasena'], PASSWORD_DEFAULT),
      $data['direccion'],
      $data['ciudad'],
      $data['tipo_usuario']
    );

    $anadido = UsuarioDAO::addNewUsuario($usuario);

    if ($anadido) {
      echo json_encode(['success' => true, 'message' => 'Usuario añadido correctamente.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Error al añadir el usuario.']);
    }

  }

}
?>