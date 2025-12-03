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

  public function indexActivos() {
    $view = 'view/home.php';
    $listaProductosActivos = ProductoDAO::getProductosActivos();
    foreach ($listaProductosActivos as $producto) {
      $producto -> setIngredientes(IngredienteDAO::getIngredientesByProducto($producto->getIdProducto()));
      $producto -> setCaracteristicasNutricionales(CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto()));
    }
    include_once 'index.php';
    return $listaProductosActivos;
  }

  public function ofertados(){
    $view = 'view/home.php';
    include_once 'index.php';
    return $listaProductosEnOferta = ProductoDAO::getProductosEnOferta();
  }
}
?>