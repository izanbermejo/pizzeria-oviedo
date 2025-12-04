<?php 

include_once 'database/database.php';
include_once 'model/Categoria.php';

class CategoriaDAO {

  public static function getCategorias() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM categorias");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaCategorias = [];

    while ($categoria = $results->fetch_object('Categoria')) {
      $listaCategorias[]=$categoria;
    }

    $con->close();
    return $listaCategorias;
  }
  
  public static function getCategoriaById($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

    $categoria = $results->fetch_object('Categoria');
    $con->close();
    return $categoria;
  }

  
}
?>