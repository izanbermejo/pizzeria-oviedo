<?php 
include_once 'model/IngredienteDAO.php';

class IngredienteController{

  public function show(){
    $view = 'view/ingrediente/show.php';
    $idIngrediente = $_GET['idproducto'];
    $ingrediente = IngredienteDAO::getIngredienteById($idIngrediente);
    include_once 'view/main.php';
  }

  public function index(){
    $view = 'view/ingrediente/index.php';
    $listaIngredientes = IngredienteDAO::getIngredientes();
    include_once 'view/main.php';
  }

  public function indexByProducto(){
    $view = 'view/ingrediente/indexByProducto.php';
    $idProducto = $_GET['idproducto'];
    $listaIngredientes = IngredienteDAO::getIngredientesByIdProducto($idProducto);
    include_once 'view/main.php';
  }

}
?>