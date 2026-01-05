<?php 

class Pedido {

  private $id_pedido;
  private $id_usuario;
  private $id_codigo_descuento;
  private $direccion_pedido;
  private $importe_total;
  private $fecha_pedido;

  public function __construct(
    $id_pedido = null,
    $id_usuario = null,
    $id_codigo_descuento = null,
    $direccion_pedido = null,
    $importe_total = null,
    $fecha_pedido = null
  ) {
    $this->id_pedido = $id_pedido;
    $this->id_usuario = $id_usuario;
    $this->id_codigo_descuento = $id_codigo_descuento;
    $this->direccion_pedido = $direccion_pedido;
    $this->importe_total = $importe_total;
    $this->fecha_pedido = $fecha_pedido;
  }

  public function getIdPedido() {
    return $this->id_pedido;
  }

  public function setIdPedido($id_pedido) {
    $this->id_pedido = $id_pedido;
  }

  public function getIdUsuario() {
    return $this->id_usuario;
  }

  public function setIdUsuario($id_usuario) {
    $this->id_usuario = $id_usuario;
  }

  public function getIdCodigoDescuento() {
    return $this->id_codigo_descuento;
  }

  public function setIdCodigoDescuento($id_codigo_descuento) {
    $this->id_codigo_descuento = $id_codigo_descuento;
  }

  public function getDireccionPedido() {
    return $this->direccion_pedido;
  }

  public function setDireccionPedido($direccion_pedido) {
    $this->direccion_pedido = $direccion_pedido;
  }

  public function getImporteTotal() {
    return $this->importe_total;
  }

  public function setImporteTotal($importe_total) {
    $this->importe_total = $importe_total;
  }

  public function getFechaPedido() {
    return $this->fecha_pedido;
  }

  public function setFechaPedido($fecha_pedido) {
    $this->fecha_pedido = $fecha_pedido;
  }

  public function toArray() {
    return [
      'id_pedido' => $this->id_pedido,
      'id_usuario' => $this->id_usuario,
      'id_codigo_descuento' => $this->id_codigo_descuento,
      'direccion_pedido' => $this->direccion_pedido,
      'importe_total' => $this->importe_total,
      'fecha_pedido' => $this->fecha_pedido,
    ];
  }
}
?>