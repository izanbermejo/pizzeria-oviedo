<?php 
include_once 'model/Usuario.php';
include_once 'model/UsuarioDAO.php';

class InicioSesionController{

  public function login() {
    $view = 'view/login.php';
    include_once 'view/main.php';
  }

  public function register() {
    $view = 'view/register.php';
    include_once 'view/main.php';
  }

  public function registrarUsuario() {
    $emailDuplicado = false;
    $usuario = new Usuario(
      null,
      $_POST['nombre'],
      $_POST['apellidos'],
      $_POST['email'],
      password_hash($_POST['password'], PASSWORD_DEFAULT),
      $_POST['direccion'],
      $_POST['ciudad'],
      null
    );

    if (!UsuarioDAO::emailExiste($usuario->getEmail())) {
      UsuarioDAO::addUsuario($usuario);
      header("Location: ?");
    } else {
      $nombre = $_POST['nombre'] ?? '';
      $apellidos = $_POST['apellidos'] ?? '';
      $direccion = $_POST['direccion'] ?? '';
      $ciudad = $_POST['ciudad'] ?? '';
      $emailDuplicado = true;
    }

    $view = 'view/register.php';
    include_once 'view/main.php';
  }
}

?>