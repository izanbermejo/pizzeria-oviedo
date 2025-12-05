<?php 
include_once 'model/CategoriaDAO.php';
include_once 'ProductoController.php';

class CartaController{

  public function index() {
    $view = 'view/carta.php';
    $productoController = new ProductoController();
    $subcategoriaController = new SubcategoriaController();
    $listaCategorias = CategoriaDAO::getCategorias();
    $listaSubcategorias = $subcategoriaController -> indexSubcategoriaByCategoria();
    $listaProductosByCategoria = $productoController -> indexByCategoria();
    include_once 'view/main.php';
  }
}
?>