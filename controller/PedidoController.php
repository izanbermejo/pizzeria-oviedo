<?php 
include_once 'model/Pedido.php';
include_once 'model/PedidoDAO.php';

class PedidoController{

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

    $view = 'view/pagoAceptado.php';
    include_once 'view/main.php';
  }

  // public function getPedidoById() {
  //   $usuario = UsuarioDAO::getUsuarioByEmail($_POST['email']);

  //   if ($usuario && password_verify($_POST['password'], $usuario->getContrasena())) {
  //     $_SESSION['usuario'] = $usuario;
  //     header("Location: ?");
  //   } else {
  //     $view = 'view/login.php';
  //     include_once 'view/main.php';
  //   }
  // }  
}

?>