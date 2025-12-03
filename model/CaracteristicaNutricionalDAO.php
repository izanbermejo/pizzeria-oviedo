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

  public static function getCaracteristicaNutricionalByProducto($idProducto) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT DISTINCT cn.* FROM caracteristicas_nutricionales cn
      JOIN ingredientes_caracteristicas_nutricionales icn ON icn.id_caracteristica = cn.id_caracteristica
      JOIN ingredientes_productos ip ON ip.id_ingrediente = icn.id_ingrediente
      WHERE ip.id_producto = ? AND ip.defecto = 1 AND (
        cn.nombre_caracteristica <> 'Vegano'
        OR cn.id_caracteristica IN (
            SELECT icn2.id_caracteristica
            FROM ingredientes_caracteristicas_nutricionales icn2
            JOIN ingredientes_productos ip2
                ON ip2.id_ingrediente = icn2.id_ingrediente
            WHERE ip2.id_producto = ?
              AND ip2.defecto = 1
              AND icn2.id_caracteristica = (SELECT id_caracteristica FROM caracteristicas_nutricionales WHERE nombre_caracteristica = 'Vegano')
            GROUP BY icn2.id_caracteristica
            HAVING COUNT(*) = (
                SELECT COUNT(*) 
                FROM ingredientes_productos 
                WHERE id_producto = ?
                  AND defecto = 1
            )
        )
      )"
    );
    $stmt->bind_param('iii', $idProducto, $idProducto, $idProducto);
    $stmt->execute();
    $results = $stmt->get_result();

    $listaCaracteristicasNutricionales = [];

    while ($caracteristicaNutricional = $results->fetch_object('CaracteristicaNutricional')) {
      $listaCaracteristicasNutricionales[]=$caracteristicaNutricional;
    }

    $con->close();
    return $listaCaracteristicasNutricionales;
  }
}
?>