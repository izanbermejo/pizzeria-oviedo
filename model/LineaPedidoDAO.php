<?php 

include_once 'database/database.php';
include_once 'model/LineaPedido.php';

class LineaPedidoDAO {

  public static function getLineasPedidoByPedido($id_pedido) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM linea_pedido WHERE id_pedido = ?");
    $stmt->bind_param('i', $id_pedido);
    $stmt->execute();
    $results = $stmt->get_result();

    $listaLineasPedido = [];

    while ($lineaPedido = $results->fetch_object('LineaPedido')) {
      $listaLineasPedido[]=$lineaPedido;
    }

    $con->close();
    return $listaLineasPedido;
  }

  public static function addLineaPedido(LineaPedido $lineaPedido) {
    $con = DataBase::connect();
    $stmt = $con->prepare("INSERT INTO linea_pedido (id_pedido, id_producto, precio_unidad, cantidad)
    VALUES (?, ?, ?, ?)");

    $id_pedido = $lineaPedido->getIdPedido();
    $id_producto = $lineaPedido->getIdProducto();
    $precio_unidad = $lineaPedido->getPrecioUnidad();
    $cantidad = $lineaPedido->getCantidad();

    $stmt->bind_param('iisi', $id_pedido, $id_producto, $precio_unidad, $cantidad);

    $stmt->execute();

    $con->close();
  }  
}
?>