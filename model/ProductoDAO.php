<?php 

include_once 'database/database.php';
include_once 'model/Producto.php';

class ProductoDAO {

  public static function getProductos() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT p.*, d.porcentaje_descuento 
    FROM productos p 
    LEFT JOIN descuentos d ON p.id_descuento = d.id_descuento");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaProductos = [];

    while ($row = $results->fetch_assoc()) {

      $producto = new Producto(
        $row['id_producto'],
        $row['id_subcategoria'],
        $row['id_descuento'],
        $row['nombre_producto'],
        $row['descripcion'],
        $row['precio_producto'],
        $row['imagen_producto'],
        $row['activo'],
        $row['porcentaje_descuento'],
        $row['ingredientes'] ?? [],
        $row['caracteristicas_nutricionales'] ?? [],
      );

      $listaProductos[]=$producto;
    }

    $con->close();
    return $listaProductos;
  }
  
  public static function getProductoById($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT p.*, d.porcentaje_descuento 
    FROM productos p 
    LEFT JOIN descuentos d ON p.id_descuento = d.id_descuento
    WHERE id_producto = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();

    $producto = new Producto(
        $result['id_producto'],
        $result['id_subcategoria'],
        $result['id_descuento'],
        $result['nombre_producto'],
        $result['descripcion'],
        $result['precio_producto'],
        $result['imagen_producto'],
        $result['activo'],
        $result['porcentaje_descuento'],
        $result['ingredientes'] ?? [],
        $result['caracteristicas_nutricionales'] ?? [],
      );
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

    while ($row = $results->fetch_assoc()) {

      $producto = new Producto(
        $row['id_producto'],
        $row['id_subcategoria'],
        $row['id_descuento'],
        $row['nombre_producto'],
        $row['descripcion'],
        $row['precio_producto'],
        $row['imagen_producto'],
        $row['activo'],
        $row['porcentaje_descuento'],
        $row['ingredientes'] ?? [],
        $row['caracteristicas_nutricionales'] ?? [],
      );

      $listaProductosActivos[]=$producto;
    }

    $con->close();
    return $listaProductosActivos;
  }

  public static function getProductosByPedido($idPedido) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT p.*, lp.cantidad, lp.precio_unidad 
      FROM productos p
      JOIN linea_pedido lp ON p.id_producto = lp.id_producto
      WHERE lp.id_pedido = ?");
    $stmt->bind_param('i', $idPedido);
    $stmt->execute();
    $results = $stmt->get_result();

    $listaProductosByPedido = [];

    while ($row = $results->fetch_assoc()) {

      $producto = new Producto(
        $row['id_producto'],
        $row['id_subcategoria'],
        $row['id_descuento'],
        $row['nombre_producto'],
        $row['descripcion'],
        $row['precio_producto'],
        $row['imagen_producto'],
        $row['activo'],
        [],
        [],
        [],
      );

      $producto->setCantidad($row['cantidad']);
      $producto->setPrecioUnidad($row['precio_unidad']);

      $listaProductosByPedido[]=$producto;
    }

    $con->close();
    return $listaProductosByPedido;
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

    while ($row = $results->fetch_assoc()) {

      $producto = new Producto(
        $row['id_producto'],
        $row['id_subcategoria'],
        $row['id_descuento'],
        $row['nombre_producto'],
        $row['descripcion'],
        $row['precio_producto'],
        $row['imagen_producto'],
        $row['activo'],
        $row['porcentaje_descuento'],
        $row['ingredientes'] ?? [],
        $row['caracteristicas_nutricionales'] ?? [],
      );

      $listaProductosEnOferta[]=$producto;
    }

    $con->close();
    return $listaProductosEnOferta;
  }

  public static function getProductosByCategoria($id) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT p.*, d.porcentaje_descuento FROM productos p
      JOIN subcategorias s ON s.id_subcategoria = p.id_subcategoria
      LEFT JOIN descuentos d ON p.id_descuento = d.id_descuento
      WHERE s.id_categoria = ? AND p.activo = 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();

     $listaProductosByCategoria = [];

    while ($row = $results->fetch_assoc()) {

      $producto = new Producto(
        $row['id_producto'],
        $row['id_subcategoria'],
        $row['id_descuento'],
        $row['nombre_producto'],
        $row['descripcion'],
        $row['precio_producto'],
        $row['imagen_producto'],
        $row['activo'],
        $row['porcentaje_descuento'],
        $row['ingredientes'] ?? [],
        $row['caracteristicas_nutricionales'] ?? [],
      );

      $listaProductosByCategoria[]=$producto;
    }
    $con->close();
    return $listaProductosByCategoria;
  }

  public static function eliminarProducto($idProducto) {
    $con = DataBase::connect();
    $stmt = $con->prepare("DELETE FROM productos WHERE id_producto = ?");
    $stmt->bind_param("i", $idProducto);
    $resultado = $stmt->execute();
    $stmt->close();
    $con->close();
    return $resultado;
  }

  public static function updateProducto($producto) {
    $con = DataBase::connect();
    $stmt = $con->prepare("UPDATE productos SET id_subcategoria = ?, id_descuento = ?, nombre_producto = ?, descripcion = ?, precio_producto = ?, activo = ? WHERE id_producto = ?");
    
    $idSubcategoria = $producto->getIdSubcategoria();
    $idDescuento = $producto->getIdDescuento();
    $nombreProducto = $producto->getNombreProducto();
    $descripcion = $producto->getDescripcion();
    $precioProducto = $producto->getPrecioProducto();
    $activo = $producto->getActivo();
    $idProducto = $producto->getIdProducto();

    $stmt->bind_param("iissdii", $idSubcategoria, $idDescuento, $nombreProducto, $descripcion, $precioProducto, $activo, $idProducto);
    $resultado = $stmt->execute();
    $stmt->close();
    $con->close();
    return $resultado;
  }
}
?>