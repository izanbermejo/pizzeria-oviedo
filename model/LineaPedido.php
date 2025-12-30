<?php 

class LineaPedido {

  private $id_linea_pedido;
  private $id_pedido;
  private $id_producto;
  private $precio_unidad;
  private $cantidad;

  public function __construct(
    $id_linea_pedido = null,
    $id_pedido = null,
    $id_producto = null,
    $precio_unidad = null,
    $cantidad = null
  ) {
    $this->id_linea_pedido = $id_linea_pedido;
    $this->id_pedido = $id_pedido;
    $this->id_producto = $id_producto;
    $this->precio_unidad = $precio_unidad;
    $this->cantidad = $cantidad;
  }

    public function getIdLineaPedido() {
        return $this->id_linea_pedido;
    }

    public function setIdLineaPedido($id_linea_pedido) {
        $this->id_linea_pedido = $id_linea_pedido;
    }

    public function getIdPedido() {
        return $this->id_pedido;
    }

    public function setIdPedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function getPrecioUnidad() {
        return $this->precio_unidad;
    }

    public function setPrecioUnidad($precio_unidad) {
        $this->precio_unidad = $precio_unidad;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
}
?>