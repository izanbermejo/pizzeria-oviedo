<?php 

include_once 'database/database.php';
include_once 'model/Producto.php';

class ProductoDAO {

  public static function getProductos() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM productos");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaProductos = [];

    while ($producto = $results->fetch_object('Producto')) {
      $listaProductos[]=$producto;
    }

    $con->close();
    return $listaProductos;
  }


  
  public static function getProductoById($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM productos WHERE id_producto = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

    $producto = $results->fetch_object('Producto');
    $con->close();
    return $producto;
  }

}
?>