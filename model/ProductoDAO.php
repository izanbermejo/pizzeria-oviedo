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

  public static function getProductosEnOferta() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT productos.*, descuentos.porcentaje_descuento 
      FROM productos 
      JOIN descuentos ON descuentos.id_descuento = productos.id_descuento
      WHERE productos.id_descuento IS NOT NULL AND productos.activo = 1
      ORDER BY productos.id_producto ASC;"
    );
    $stmt->execute();
    $results = $stmt->get_result();

    $listaProductosEnOferta = [];

    while ($producto = $results->fetch_object('Producto')) {
      $listaProductosEnOferta[]=$producto;
    }
    $con->close();
    return $listaProductosEnOferta;
  }
}
?>