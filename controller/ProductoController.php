<?php 
include_once 'model/ProductoDAO.php';

class ProductoController{

  public function show(){
    $view = 'view/producto/show.php';
    $idProducto = $_GET['idproducto'];
    $producto = ProductoDAO::getProductoById($idProducto);
    include_once 'view/main.php';
  }

  public function index(){
    $view = 'view/producto/index.php';
    $listaProductos = ProductoDAO::getProductos();
    include_once 'view/main.php';
  }

  public function ofertados(){
    $view = 'view/home.php';
    include_once 'index.php';
    return $listaProductosEnOferta = ProductoDAO::getProductosEnOferta();
  }
}
?>