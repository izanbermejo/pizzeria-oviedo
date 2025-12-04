<?php 
include_once 'ProductoController.php';

class HomeController{

  public function index() {
    $view = 'view/home.php';
    $productoController = new ProductoController();
    $listaProductosEnOferta = $productoController -> ofertados();
    $listaProductosActivos = $productoController -> indexActivos();
    include_once 'view/main.php';
  }
}
?>