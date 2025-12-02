<?php 

include_once 'database/database.php';
include_once 'model/CaracteristicaNutricional.php';

class CaracteristicaNutricionalDAO {

  public static function getCaracteristicasNutricionales() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM caracteristicas_nutricionales");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaCaracteristicasNutricionales = [];

    while ($caracteristicaNutricional = $results->fetch_object('CaracteristicaNutricional')) {
      $listaCaracteristicasNutricionales[]=$caracteristicaNutricional;
    }

    $con->close();
    return $listaCaracteristicasNutricionales;
  }
  
  public static function getCaracteristicaNutricionalById($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM caracteristicas_nutricionales WHERE id_caracteristica = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

    $caracteristicaNutricional = $results->fetch_object('CaracteristicaNutricional');
    $con->close();
    return $caracteristicaNutricional;
  }


}
?>