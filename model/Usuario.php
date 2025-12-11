<?php

class Usuario {
  private $id_usuario;
  private $nombre_usuario;
  private $apellidos_usuario;
  private $email;
  private $contrasena;
  private $direccion;
  private $ciudad;
  private $tipo_usuario;

  public function __construct(
    $id_usuario = null,
    $nombre_usuario = null,
    $apellidos_usuario = null,
    $email = null,
    $contrasena = null,
    $direccion = null,
    $ciudad = null,
    $tipo_usuario = null
  ) {
    $this->id_usuario = $id_usuario;
    $this->nombre_usuario = $nombre_usuario;
    $this->apellidos_usuario = $apellidos_usuario;
    $this->email = $email;
    $this->contrasena = $contrasena;
    $this->direccion = $direccion;
    $this->ciudad = $ciudad;
    $this->tipo_usuario = $tipo_usuario;
  }

  public function getIdUsuario() {
    return $this->id_usuario;
  }

  public function setIdUsuario($id_usuario) {
    $this->id_usuario = $id_usuario;
  }

  public function getNombreUsuario() {
    return $this->nombre_usuario;
  }

  public function setNombreUsuario($nombre_usuario) {
    $this->nombre_usuario = $nombre_usuario;
  }

  public function getApellidosUsuario() {
    return $this->apellidos_usuario;
  }

  public function setApellidosUsuario($apellidos_usuario) {
    $this->apellidos_usuario = $apellidos_usuario;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getContrasena() {
    return $this->contrasena;
  }

  public function setContrasena($contrasena) {
    $this->contrasena = $contrasena;
  }

  public function getDireccion() {
    return $this->direccion;
  }

  public function setDireccion($direccion) {
    $this->direccion = $direccion;
  }

  public function getCiudad() {
    return $this->ciudad;
  }

  public function setCiudad($ciudad) {
    $this->ciudad = $ciudad;
  }

  public function getTipoUsuario() {
    return $this->tipo_usuario;
  }

  public function setTipoUsuario($tipo_usuario) {
    $this->tipo_usuario = $tipo_usuario;
  }  
}
?>