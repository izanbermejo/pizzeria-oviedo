<?php 
include_once 'ProductoController.php';

class CartaController{

  public function index() {
    $view = 'view/carta.php';
    $productoController = new ProductoController();
    $listaProductosEnOferta = $productoController -> ofertados();
    $listaProductosActivos = $productoController -> indexActivos();
    include_once 'view/main.php';
  }
}
?>