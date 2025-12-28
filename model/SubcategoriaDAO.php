<?php 

include_once 'database/database.php';
include_once 'model/Subcategoria.php';

class SubcategoriaDAO {

  public static function getSubcategorias() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT s.*, c.nombre_categoria 
    FROM subcategorias s 
    JOIN categorias c ON c.id_categoria = s.id_categoria");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaSubcategorias = [];

    while ($subcategoria = $results->fetch_object('Subcategoria')) {
      $listaSubcategorias[]=$subcategoria;
    }

    $con->close();
    return $listaSubcategorias;
  }
  
  public static function getSubcategoriaById($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT s.*, c.nombre_categoria 
    FROM subcategorias s 
    JOIN categorias c ON c.id_categoria = s.id_categoria
    WHERE id_subcategoria = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

    $subcategoria = $results->fetch_object('Subcategoria');
    $con->close();
    return $subcategoria;
  }

  public static function getSubcategoriasByCategoria($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM subcategorias WHERE id_categoria = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

    $listaSubcategorias = [];

    while ($subcategoria = $results->fetch_object('Subcategoria')) {
      $listaSubcategorias[]=$subcategoria;
    }

    $con->close();
    return $listaSubcategorias;
  }
}
?>