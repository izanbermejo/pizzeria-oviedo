<?php 

class CompraController{

  public function index() {
    $view = 'view/compra.php';
    include_once 'view/main.php';
  }

  public function finalizar() {
    $view = 'view/pagoAceptado.php';
    include_once 'view/main.php';
  }
}

?>