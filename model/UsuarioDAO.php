<?php 

include_once 'database/database.php';
include_once 'model/Usuario.php';

class UsuarioDAO {

  public static function getUsuarios() {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $results = $stmt->get_result();

    $listaUsuarios = [];

    while ($usuario = $results->fetch_object('Usuario')) {
      $listaUsuarios[]=$usuario;
    }

    $con->close();
    return $listaUsuarios;
  }

  public static function addUsuario(Usuario $usuario) {
    $con = DataBase::connect();
    $stmt = $con->prepare("INSERT INTO usuarios (nombre_usuario, apellidos_usuario, email, contrasena, direccion, ciudad)
    VALUES (?, ?, ?, ?, ?, ?)");

    $nombre    = $usuario->getNombreUsuario();
    $apellidos = $usuario->getApellidosUsuario();
    $email     = $usuario->getEmail();
    $contrasena= $usuario->getContrasena();
    $direccion = $usuario->getDireccion();
    $ciudad    = $usuario->getCiudad();

    $stmt->bind_param('ssssss', $nombre, $apellidos, $email, $contrasena, $direccion, $ciudad);

    $stmt->execute();

    $con->close();
  }

  public static function emailExiste($email) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $existe = $stmt->num_rows > 0;
    $stmt->close();
    $con->close();
    return $existe;
  }
}
?>