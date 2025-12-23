<?php 
include_once 'model/SubcategoriaDAO.php';

class SubcategoriaController{

  public function show(){
    $view = 'view/subcategoria/show.php';
    $idSubcategoria = $_GET['idsubcategoria'];
    $subcategoria = SubcategoriaDAO::getSubcategoriaById($idSubcategoria);
    include_once 'view/main.php';
  }

  public function index(){
    $view = 'view/subcategoria/index.php';
    $listaSubcategorias = SubcategoriaDAO::getSubcategorias();
    include_once 'view/main.php';
  }

  public function indexSubcategoriaByCategoria(){
    if (isset($_GET['idcategoria'])) {
      $idCategoria = $_GET['idcategoria'];
    } else {
      $idCategoria = 1;
    }
    $listaSubcategorias = SubcategoriaDAO::getSubcategoriasByCategoria($idCategoria);
    return $listaSubcategorias;
  }

  public function getSubcategorias() {
    header('Content-Type: application/json; charset-utf-8');

    $listaSubcategorias = SubcategoriaDAO::getSubcategorias();
    $data = [];

    foreach ($listaSubcategorias as $subcategoria) {
      $data[] = $subcategoria->toArray();
    }

    echo json_encode($data);
  }
}
?>