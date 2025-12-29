<?php 

include_once 'database/database.php';
include_once 'model/CodigoDescuento.php';

class CodigoDescuentoDAO {

  public static function getCodigosDescuento() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM codigos_descuento");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaDescuentos = [];

    while ($descuento = $results->fetch_object('CodigoDescuento')) {
      $listaDescuentos[]=$descuento;
    }

    $con->close();
    return $listaDescuentos;
  }

  public static function getCodigosDescuentoActivos() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM codigos_descuento WHERE activo = 1");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaDescuentos = [];

    while ($descuento = $results->fetch_object('CodigoDescuento')) {
      $listaDescuentos[]=$descuento;
    }

    $con->close();
    return $listaDescuentos;
  }
  
  public static function getCodigoDescuentoById($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM codigos_descuento WHERE id_codigo_descuento = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

    $descuento = $results->fetch_object('CodigoDescuento');
    $con->close();
    return $descuento;
  }
}
?>