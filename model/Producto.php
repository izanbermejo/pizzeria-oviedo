<?php

class Producto {
  private $id_producto;
  private $id_subcategoria;
  private $id_descuento;
  private $nombre_producto;
  private $descripcion;
  private $precio_producto;
  private $imagen_producto;
  private $activo;
  private $porcentaje_descuento;

  public function getIdProducto() {
    return $this->id_producto;
  }

  public function setIdProducto($id_producto) {
    $this->id_producto = $id_producto;
  }

  public function getIdSubcategoria() {
    return $this->id_subcategoria;
  }

  public function setIdSubcategoria($id_subcategoria) {
    $this->id_subcategoria = $id_subcategoria;
  }

  public function getIdDescuento() {
    return $this->id_descuento;
  }

  public function setIdDescuento($id_descuento) {
    $this->id_descuento = $id_descuento;
  }

  public function getNombreProducto() {
    return $this->nombre_producto;
  }

  public function setNombreProducto($nombre_producto) {
    $this->nombre_producto = $nombre_producto;
  }

  public function getDescripcion() {
    return $this->descripcion;
  }

  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  public function getPrecioProducto() {
    return $this->precio_producto;
  }

  public function setPrecioProducto($precio_producto) {
    $this->precio_producto = $precio_producto;
  }

  public function getImagenProducto() {
    return $this->imagen_producto;
  }

  public function setImagenProducto($imagen_producto) {
    $this->imagen_producto = $imagen_producto;
  }

  public function getPorcentajeDescuento() {
    return $this->porcentaje_descuento;
  }

  public function setPorcentajeDescuento($porcentaje_descuento) {
    $this->porcentaje_descuento = $porcentaje_descuento;
  }

  public function getActivo() {
    return $this->activo;
  }

  public function setActivo($activo) {
    $this->activo = $activo;
  }
}
?>