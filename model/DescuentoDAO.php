<?php 

include_once 'database/database.php';
include_once 'model/Descuento.php';

class DescuentoDAO {

  public static function getDescuentos() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM descuentos");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaDescuentos = [];

    while ($descuento = $results->fetch_object('Descuento')) {
      $listaDescuentos[]=$descuento;
    }

    $con->close();
    return $listaDescuentos;
  }
  
  public static function getDescuentoById($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM descuentos WHERE id_descuento = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

    $descuento = $results->fetch_object('Descuento');
    $con->close();
    return $descuento;
  }
}
?>