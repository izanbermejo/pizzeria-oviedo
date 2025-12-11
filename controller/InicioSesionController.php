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

    UsuarioDAO::addUsuario($usuario);
  }
}

?>