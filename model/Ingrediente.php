<?php 

class Ingrediente {

  private $id_ingrediente;
  private $nombre_ingrediente;
  private $descripcion;
  private $precio;
  private $imagen_ingrediente;

  public function getIdIngrediente() {
    return $this->id_ingrediente;
  }

  public function setIdIngrediente($id_ingrediente) {
    $this->id_ingrediente = $id_ingrediente;
  }

  public function getNombreIngrediente() {
    return $this->nombre_ingrediente;
  }

  public function setNombreIngrediente($nombre_ingrediente) {
    $this->nombre_ingrediente = $nombre_ingrediente;
  }

  public function getDescripcion() {
    return $this->descripcion;
  }

  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  public function getPrecio() {
    return $this->precio;
  }

  public function setPrecio($precio) {
    $this->precio = $precio;
  }

  public function getImagenIngrediente() {
    return $this->imagen_ingrediente;
  }

  public function setImagenIngrediente($imagen_ingrediente) {
    $this->imagen_ingrediente = $imagen_ingrediente;
  }

  public function toArray() {
    return [
      'id_ingrediente' => $this->id_ingrediente,
      'nombre_ingrediente' => $this->nombre_ingrediente,
      'descripcion' => $this->descripcion,
      'precio' => $this->precio,
      'imagen_ingrediente' => $this->imagen_ingrediente
    ];
  }

}
?>