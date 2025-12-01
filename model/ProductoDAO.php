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

  public static function getProductosActivos() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT p.*, d.porcentaje_descuento 
      FROM productos p
      LEFT JOIN descuentos d ON p.id_descuento = d.id_descuento
      WHERE p.activo = 1");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaProductosActivos = [];

    while ($producto = $results->fetch_object('Producto')) {
      $listaProductosActivos[]=$producto;
    }

    $con->close();
    return $listaProductosActivos;
  }

  public static function getProductosEnOferta() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT p.*, d.porcentaje_descuento 
      FROM productos p
      JOIN descuentos d ON d.id_descuento = p.id_descuento
      WHERE p.id_descuento IS NOT NULL AND p.activo = 1
      ORDER BY p.id_producto ASC;"
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