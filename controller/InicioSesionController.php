<?php 

class InicioSesionController{

  public function login() {
    $view = 'view/login.php';
    include_once 'view/main.php';
  }

  public function register() {
    $view = 'view/register.php';
    include_once 'view/main.php';
  }
}

?>