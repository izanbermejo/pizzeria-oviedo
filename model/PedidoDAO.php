<?php 

include_once 'database/database.php';
include_once 'model/Pedido.php';

class PedidoDAO {

  public static function getPedidos() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM pedidos ");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaPedidos = [];

    while ($row = $results->fetch_assoc()) {

      $pedido = new Pedido(
        $row['id_pedido'],
        $row['id_usuario'],
        $row['id_codigo_descuento'],
        $row['direccion_pedido'],
        $row['importe_total'],
        $row['fecha_pedido']
      );

      $listaPedidos[]=$pedido;
    }

    $con->close();
    return $listaPedidos;
  }

  public static function getPedidoById($id_pedido) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM pedidos WHERE id_pedido = ?");
    $stmt->bind_param('i', $id_pedido);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();

    $pedido = new Pedido(
      $result['id_pedido'],
      $result['id_usuario'],
      $result['id_codigo_descuento'],
      $result['direccion_pedido'],
      $result['importe_total'],
      $result['fecha_pedido']
    );

    $con->close();
    return $pedido;
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

  public static function getUltimoPedido($id_usuario) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM pedidos WHERE id_usuario = ? ORDER BY fecha_pedido DESC LIMIT 1");
    $stmt->bind_param('i', $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $pedido = new Pedido(
      $row['id_pedido'],
      $row['id_usuario'],
      $row['id_codigo_descuento'],
      $row['direccion_pedido'],
      $row['importe_total'],
      $row['fecha_pedido']
    );

    $con->close();
    return $pedido;
  }

  public static function getPedidosByUsuario($id_usuario) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM pedidos WHERE id_usuario = ? ORDER BY fecha_pedido DESC");
    $stmt->bind_param('i', $id_usuario);
    $stmt->execute();
    $results = $stmt->get_result();

    $listaPedidos = [];

    while ($row = $results->fetch_assoc()) {
      $pedido = new Pedido(
        $row['id_pedido'],
        $row['id_usuario'],
        $row['id_codigo_descuento'],
        $row['direccion_pedido'],
        $row['importe_total'],
        $row['fecha_pedido']
      );

      $listaPedidos[] = $pedido;
    }

    $con->close();
    return $listaPedidos;
  }

  public static function eliminarPedido($idPedido) {
    $con = DataBase::connect();
    $stmt = $con->prepare("DELETE FROM pedidos WHERE id_pedido = ?");
    $stmt->bind_param("i", $idPedido);
    $resultado = $stmt->execute();
    $stmt->close();
    $con->close();
    return $resultado;
  }

  public static function updatePedido($pedido) {
    $con = DataBase::connect();
    $stmt = $con->prepare("UPDATE pedidos SET id_codigo_descuento = ?, direccion_pedido = ?, importe_total = ? WHERE id_pedido = ?");
    
    $idCodigoDescuento = $pedido->getIdCodigoDescuento();
    $direccionPedido = $pedido->getDireccionPedido();
    $importeTotal = $pedido->getImporteTotal();
    $idPedido = $pedido->getIdPedido();

    $stmt->bind_param("isdi",  $idCodigoDescuento, $direccionPedido, $importeTotal, $idPedido);
    $resultado = $stmt->execute();
    $stmt->close();
    $con->close();
    return $resultado;
  }

  public static function createPedido($pedido) {
    $con = DataBase::connect();
    $stmt = $con->prepare("INSERT INTO pedidos (id_codigo_descuento, direccion_pedido, importe_total) VALUES (?, ?, ?)");
    
    $idCodigoDescuento = $pedido->getIdCodigoDescuento();
    $direccionPedido = $pedido->getDireccionPedido();
    $importeTotal = $pedido->getImporteTotal();

    $stmt->bind_param("isd",  $idCodigoDescuento, $direccionPedido, $importeTotal);
    $resultado = $stmt->execute();
    $stmt->close();
    $con->close();
    return $resultado;
  }
}
?>