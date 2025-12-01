<?php 

include_once 'database/database.php';
include_once 'model/Ingrediente.php';

class IngredienteDAO {

  public static function getIngredientes() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM ingredientes");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaIngredientes = [];

    while ($ingrediente = $results->fetch_object('Ingrediente')) {
      $listaIngredientes[]=$ingrediente;
    }

    $con->close();
    return $listaIngredientes;
  }
  
  public static function getIngredienteById($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM ingredientes WHERE id_ingrediente = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

    $ingrediente = $results->fetch_object('Ingrediente');
    $con->close();
    return $ingrediente;
  }

}
?>