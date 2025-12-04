<?php 

class Categoria {

  private $id_categoria;
  private $nombre_categoria;

  public function getIdCategoria() {
    return $this->id_categoria;
  }

  public function setIdCategoria($id_categoria) {
    $this->id_categoria = $id_categoria;
  }

  public function getNombreCategoria() {
    return $this->nombre_categoria;
  }

  public function setNombreCategoria($nombre_categoria) {
    $this->nombre_categoria = $nombre_categoria;
  }
}
?>