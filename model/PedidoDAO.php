<?php 

include_once 'database/database.php';
include_once 'model/Pedido.php';

class PedidoDAO {

  public static function getPedidos() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM pedidos");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaPedidos = [];

    while ($pedido = $results->fetch_object('Pedido')) {
      $listaPedidos[]=$pedido;
    }

    $con->close();
    return $listaPedidos;
  }

  public static function addPedido(Pedido $pedido) {
    $con = DataBase::connect();
    $stmt = $con->prepare("INSERT INTO pedidos (id_usuario, id_codigo_descuento, direccion_pedido, importe_total)
    VALUES (?, ?, ?, ?)");

    $id_usuario = $pedido->getIdUsuario();
    $id_codigo_descuento = $pedido->getIdCodigoDescuento();
    $direccion_pedido = $pedido->getDireccionPedido();
    $importe_total = $pedido->getImporteTotal();

    $stmt->bind_param('isss', $id_usuario, $id_codigo_descuento, $direccion_pedido, $importe_total);

    $stmt->execute();

    $con->close();
  }

  
}
?>