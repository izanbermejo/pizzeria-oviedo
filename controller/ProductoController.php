<?php 
include_once 'model/ProductoDAO.php';
include_once 'model/SubcategoriaDAO.php';

class ProductoController{

  public function show(){
    $view = 'view/producto/show.php';
    $idProducto = $_GET['idproducto'];
    $producto = ProductoDAO::getProductoById($idProducto);
    $subcategoria = SubcategoriaDAO::getSubcategoriaById($producto->getIdSubcategoria());
    $producto -> setIngredientes(IngredienteDAO::getIngredientesDefectoByProducto($producto->getIdProducto()));
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
      $producto -> setIngredientes(IngredienteDAO::getIngredientesDefectoByProducto($producto->getIdProducto()));
      $producto -> setCaracteristicasNutricionales(CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto()));
    }
    return $listaProductosActivos;
  }

  public function ofertados(){
    $listaProductosEnOferta = ProductoDAO::getProductosEnOferta();
    foreach ($listaProductosEnOferta as $producto) {
      $producto -> setIngredientes(IngredienteDAO::getIngredientesDefectoByProducto($producto->getIdProducto()));
      $producto -> setCaracteristicasNutricionales(CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto()));
    }
    return $listaProductosEnOferta;
  }

  public function indexByCategoria() {
    $idCategoria = isset($_GET['idcategoria']) ? $_GET['idcategoria'] : 1;
    $listaProductosByCategoria = ProductoDAO::getProductosByCategoria($idCategoria);
    foreach ($listaProductosByCategoria as $producto) {
      $producto -> setIngredientes(IngredienteDAO::getIngredientesDefectoByProducto($producto->getIdProducto()));
      $producto -> setCaracteristicasNutricionales(CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto()));
    }
    return $listaProductosByCategoria;
  }

  public function getProductos() {
    header('Content-Type: application/json; charset-utf-8');

    $listaProductos = ProductoDAO::getProductos();
    $data = [];
    
    
    foreach ($listaProductos as $producto) {
      $ingredientesArray = [];
      $caracteristicasArray = [];

      $listaIngredientes = IngredienteDAO::getIngredientesDefectoByProducto($producto->getIdProducto());
      $listaCaracteristicasNutricionales = CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto());

      foreach ($listaIngredientes as $ingrediente) {
        $ingredientesArray[] = $ingrediente->toArray();
      }
      foreach ($listaCaracteristicasNutricionales as $caracteristica) {
        $caracteristicasArray[] = $caracteristica->toArray();
      }

      $producto->setIngredientes($ingredientesArray);
      $producto->setCaracteristicasNutricionales($caracteristicasArray);

      $data[] = $producto->toArray();
    }
    
    echo json_encode($data);
  }

  public function eliminarProducto() {
    header('Content-Type: application/json; charset-utf-8');

    if (!isset($_GET['idProducto'])) {
      echo json_encode(['success' => false, 'message' => 'ID de producto no proporcionado.']);
      return;
    }

    $idProducto = $_GET['idProducto'];
    $eliminado = ProductoDAO::eliminarProducto($idProducto);

    if ($eliminado) {
      echo json_encode(['success' => true, 'message' => 'Producto eliminado correctamente.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Error al eliminar el producto.']);
    }

  }

  public function getProductoById() {
    header('Content-Type: application/json; charset-utf-8');

    if (!isset($_GET['idProducto'])) {
      echo json_encode(['success' => false, 'message' => 'ID de producto no proporcionado.']);
      return;
    }

    $idProducto = $_GET['idProducto'];
    $producto = ProductoDAO::getProductoById($idProducto);

    $ingredientesArray = [];
    $caracteristicasArray = [];

    $listaIngredientes = IngredienteDAO::getIngredientesDefectoByProducto($producto->getIdProducto());
    $listaCaracteristicasNutricionales = CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($producto->getIdProducto());

    foreach ($listaIngredientes as $ingrediente) {
      $ingredientesArray[] = $ingrediente->toArray();
    }
    foreach ($listaCaracteristicasNutricionales as $caracteristica) {
      $caracteristicasArray[] = $caracteristica->toArray();
    }

    $producto->setIngredientes($ingredientesArray);
    $producto->setCaracteristicasNutricionales($caracteristicasArray);

    if ($producto) {
      echo json_encode(['success' => true, 'data' => $producto->toArray()]);
    } else {
      echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
    }
  }
}
?>