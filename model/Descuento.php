<?php 

class Descuento {

  private $id_descuento;
  private $porcentaje_descuento;

  public function getIdDescuento() {
    return $this->id_descuento;
  }

  public function setIdDescuento($id_descuento) {
    $this->id_descuento = $id_descuento;
  }

  public function getPorcentajeDescuento() {
    return $this->porcentaje_descuento;
  }

  public function setPorcentajeDescuento($porcentaje_descuento) {
    $this->porcentaje_descuento = $porcentaje_descuento;
  }

  public function toArray() {
    return [
      'id_descuento' => $this->id_descuento,
      'porcentaje_descuento' => $this->porcentaje_descuento
    ];
  }
}
?>