<?php 
include_once 'model/Pedido.php';
include_once 'model/LineaPedido.php';
include_once 'model/CodigoDescuentoDAO.php';
include_once 'model/LineaPedidoDAO.php';
include_once 'model/PedidoDAO.php';

class PedidoController{

  public function getPedidos() {
    header('Content-Type: application/json; charset-utf-8');

    $listaPedidos = PedidoDAO::getPedidos();
    $data = [];
    
    
    foreach ($listaPedidos as $pedido) {
      $data[] = $pedido->toArray();
    }
    
    echo json_encode($data);
  }

  public function getPedidoById() {
    header('Content-Type: application/json; charset-utf-8');

    if (!isset($_GET['idPedido'])) {
      echo json_encode(['success' => false, 'message' => 'ID de pedido no proporcionado.']);
      return;
    }

    $idPedido = $_GET['idPedido'];
    $pedido = PedidoDAO::getPedidoById($idPedido);

    if ($pedido) {
      echo json_encode(['success' => true, 'data' => $pedido->toArray()]);
    } else {
      echo json_encode(['success' => false, 'message' => 'Pedido no encontrado.']);
    }
  }

  public function addPedido() {

    if (!isset($_SESSION['usuario'])) {
      header("Location: ?controller=InicioSesion&action=login");
      return;
    }

    $idCodigoDescuento = CodigoDescuentoDAO::getCodigoDescuentoByCodigo($_POST['codigoDescuento']);

    $pedido = new Pedido(
      null,
      $_SESSION['usuario']->getIdUsuario(),
      isset($idCodigoDescuento) ? $idCodigoDescuento->getIdCodigoDescuento() : null,
      $_POST['direccion'],
      $_POST['precioTotal'],
      null
    );

    PedidoDAO::addPedido($pedido);

    $ultimoPedido = PedidoDAO::getUltimoPedido($_SESSION['usuario']->getIdUsuario());

    $carrito = json_decode($_POST['carrito'], true);

    foreach ($carrito as $producto) {

      if ($producto['porcentaje_descuento']) {
        $precioProducto = ($producto['precio_producto'] - ($producto['precio_producto'] * $producto['porcentaje_descuento'] / 100));
      } else {
        $precioProducto = $producto['precio_producto'];
      }

      $lineaPedido = new LineaPedido(
        null,
        $ultimoPedido->getIdPedido(),
        $producto['id_producto'],
        round($precioProducto, 2, PHP_ROUND_HALF_DOWN),
        $producto['cantidad']
      );

      LineaPedidoDAO::addLineaPedido($lineaPedido);
    }

    $view = 'view/pagoAceptado.php';
    include_once 'view/main.php';
  }

  public function pedidosUsuario() {
    $pedidos = PedidoDAO::getPedidosByUsuario($_SESSION['usuario']->getIdUsuario());
    $view = 'view/historialPedidos.php';
    include_once 'view/main.php';
  }

  public function repetir() {
    $idPedido = $_GET['idpedido'];
    $listaProductos = ProductoDAO::getProductosByPedido($idPedido);
    $view = 'view/repetirPedido.php';
    include_once 'view/main.php';
  }

  public function eliminarPedido() {
    header('Content-Type: application/json; charset-utf-8');

    if (!isset($_GET['idPedido'])) {
      echo json_encode(['success' => false, 'message' => 'ID de pedido no proporcionado.']);
      return;
    }

    $idPedido = $_GET['idPedido'];
    $eliminado = PedidoDAO::eliminarPedido($idPedido);

    if ($eliminado) {
      echo json_encode(['success' => true, 'message' => 'Pedido eliminado correctamente.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Error al eliminar el pedido.']);
    }

  }

  public function guardarCambiosPedido() {
    header('Content-Type: application/json; charset-utf-8');

    $data = json_decode(file_get_contents('php://input'), true);

    $pedido = new Pedido(
      $_GET['idPedido'],
      null,
      $data['id_codigo_descuento'],
      $data['direccion_pedido'],
      $data['importe_total'],
      null,
    );

    $actualizado = PedidoDAO::updatePedido($pedido);

    if ($actualizado) {
      echo json_encode(['success' => true, 'message' => 'Pedido editado correctamente.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Error al editar el pedido.']);
    }

  }

  public function guardarNuevoPedido() {
    header('Content-Type: application/json; charset-utf-8');

    $data = json_decode(file_get_contents('php://input'), true);

    $pedido = new Pedido(
      null,
      null,
      $data['id_codigo_descuento'],
      $data['direccion_pedido'],
      $data['importe_total'],
      null,
    );

    $creado = PedidoDAO::createPedido($pedido);

    if ($creado) {
      echo json_encode(['success' => true, 'message' => 'Pedido creado correctamente.']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Error al crear el pedido.']);
    }

  }
}

?>