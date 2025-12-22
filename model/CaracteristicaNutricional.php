<?php 

class CaracteristicaNutricional {

  private $id_caracteristica;
  private $nombre_caracteristica;
  private $icono;

  public function getIdCaracteristica() {
    return $this->id_caracteristica;
  }

  public function setIdCaracteristica($id_caracteristica) {
    $this->id_caracteristica = $id_caracteristica;
  }

  public function getNombreCaracteristica() {
    return $this->nombre_caracteristica;
  }

  public function setNombreCaracteristica($nombre_caracteristica) {
    $this->nombre_caracteristica = $nombre_caracteristica;
  }

  public function getIcono() {
    return $this->icono;
  }

  public function setIcono($icono) {
    $this->icono = $icono;
  }

  public function toArray() {
    return [
      'id_caracteristica' => $this->id_caracteristica,
      'nombre_caracteristica' => $this->nombre_caracteristica,
      'icono' => $this->icono
    ];
  }
  
}
?>