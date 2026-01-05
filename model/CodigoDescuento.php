<?php 

class CodigoDescuento {

  private $id_codigo_descuento;
  private $porcentaje_descuento;
  private $codigo;
  private $activo;

  public function getIdCodigoDescuento() {
    return $this->id_codigo_descuento;
  }

  public function setIdCodigoDescuento($id_codigo_descuento) {
    $this->id_codigo_descuento = $id_codigo_descuento;
  }

  public function getPorcentajeDescuento() {
    return $this->porcentaje_descuento;
  }

  public function setPorcentajeDescuento($porcentaje_descuento) {
    $this->porcentaje_descuento = $porcentaje_descuento;
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function setCodigo($codigo) {
    $this->codigo = $codigo;
  }

  public function isActivo() {
    return $this->activo;
  }

  public function setActivo($activo) {
    $this->activo = $activo;
  }
}
?>