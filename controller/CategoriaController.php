<?php 
include_once 'model/CategoriaDAO.php';

class CategoriaController{

  public function show(){
    $view = 'view/categoria/show.php';
    $idCategoria = $_GET['idcategoria'];
    $categoria = CategoriaDAO::getCategoriaById($idCategoria);
    include_once 'view/main.php';
  }

  public function index(){
    $view = 'view/categoria/index.php';
    $listaCategorias = CategoriaDAO::getCategorias();
    include_once 'view/main.php';
  }

  public function indexCategorias(){
    $listaCategorias = CategoriaDAO::getCategorias();
    return $listaCategorias;
  }
}
?>