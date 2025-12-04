<?php 

class Subcategoria {

  private $id_subcategoria;
  private $id_categoria;
  private $nombre_subcategoria;
  private $descripcion_subcategoria;

  public function getIdSubcategoria() {
    return $this->id_subcategoria;
  }

  public function setIdSubcategoria($id_subcategoria) {
    $this->id_subcategoria = $id_subcategoria;
  }

  public function getIdCategoria() {
    return $this->id_categoria;
  }

  public function setIdCategoria($id_categoria) {
    $this->id_categoria = $id_categoria;
  }

  public function getNombreSubcategoria() {
    return $this->nombre_subcategoria;
  }

  public function setNombreSubcategoria($nombre_subcategoria) {
    $this->nombre_subcategoria = $nombre_subcategoria;
  }

  public function getDescripcionSubcategoria() {
    return $this->descripcion_subcategoria;
  }

  public function setDescripcionSubcategoria($descripcion_subcategoria) {
    $this->descripcion_subcategoria = $descripcion_subcategoria;
  }
}
?>