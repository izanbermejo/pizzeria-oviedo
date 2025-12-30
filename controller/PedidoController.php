<?php 
include_once 'model/Pedido.php';
include_once 'model/LineaPedido.php';
include_once 'model/CodigoDescuentoDAO.php';
include_once 'model/LineaPedidoDAO.php';
include_once 'model/PedidoDAO.php';

class PedidoController{

  public function addPedido() {

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
}

?>