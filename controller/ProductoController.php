<?php 
include_once 'model/ProductoDAO.php';
include_once 'model/SubcategoriaDAO.php';

class ProductoController{

  public function show(){
    $view = 'view/producto/show.php';
    $idProducto = $_GET['idproducto'];
    $producto = ProductoDAO::getProductoById($idProducto);
    $subcategoria = SubcategoriaDAO::getSubcategoriaById($producto->getIdSubcategoria());
    $producto -> setIngredientes(IngredienteDAO::getIngredientesByProducto($producto->getIdProducto()));
    $producto -> setCaracteristicasNutricionales(CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto()));
    include_once 'view/main.php';
  }

  public function index(){
    $view = 'view/producto/index.php';
    $listaProductos = ProductoDAO::getProductos();
    include_once 'view/main.php';
  }

  public function indexActivos() {
    $listaProductosActivos = ProductoDAO::getProductosActivos();
    foreach ($listaProductosActivos as $producto) {
      $producto -> setIngredientes(IngredienteDAO::getIngredientesByProducto($producto->getIdProducto()));
      $producto -> setCaracteristicasNutricionales(CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto()));
    }
    return $listaProductosActivos;
  }

  public function ofertados(){
    $listaProductosEnOferta = ProductoDAO::getProductosEnOferta();
    foreach ($listaProductosEnOferta as $producto) {
      $producto -> setIngredientes(IngredienteDAO::getIngredientesByProducto($producto->getIdProducto()));
      $producto -> setCaracteristicasNutricionales(CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto()));
    }
    return $listaProductosEnOferta;
  }

  public function indexByCategoria() {
    $idCategoria = isset($_GET['idcategoria']) ? $_GET['idcategoria'] : 1;
    $listaProductosByCategoria = ProductoDAO::getProductosByCategoria($idCategoria);
    foreach ($listaProductosByCategoria as $producto) {
      $producto -> setIngredientes(IngredienteDAO::getIngredientesByProducto($producto->getIdProducto()));
      $producto -> setCaracteristicasNutricionales(CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto()));
    }
    return $listaProductosByCategoria;
  }
}
?>