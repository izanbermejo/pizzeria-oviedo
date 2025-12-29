<?php 

class CarritoController{

  public function index() {
    $view = 'view/carrito.php';
    $codigoDescuentoController = new CodigoDescuentoController();
    $listaCodigosDescuento = $codigoDescuentoController -> indexActivos();
    include_once 'view/main.php';
  }
}

?>