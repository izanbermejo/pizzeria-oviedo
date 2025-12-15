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

     while ($row = $results->fetch_assoc()) {
      $usuario = new Usuario(
        $row['id_usuario'],
        $row['nombre_usuario'],
        $row['apellidos_usuario'],
        $row['email'],
        $row['contrasena'],
        $row['direccion'],
        $row['ciudad'],
        $row['tipo_usuario']
      );
      $listaUsuarios[] = $usuario;
    }

    $con->close();
    return $listaUsuarios;
  }

  public static function getUsuarioById($idUsuario) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM usuarios
    WHERE id_usuario = ?");
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
      return null; // no existe
    }

    $usuario = new Usuario(
        $row['id_usuario'],
        $row['nombre_usuario'],
        $row['apellidos_usuario'],
        $row['email'],
        $row['contrasena'],
        $row['direccion'],
        $row['ciudad'],
        $row['tipo_usuario']
    );
    $con->close();
    return $usuario;
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

  public static function getUsuarioByEmail($email) {
    $con = DataBase::connect();
    $stmt = $con->prepare("SELECT * FROM usuarios
    WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
      return null; // no existe
    }

    $usuario = new Usuario(
        $row['id_usuario'],
        $row['nombre_usuario'],
        $row['apellidos_usuario'],
        $row['email'],
        $row['contrasena'],
        $row['direccion'],
        $row['ciudad'],
        $row['tipo_usuario']
    );
    $con->close();
    return $usuario;
  }

  public static function eliminarUsuario($idUsuario) {
    $con = DataBase::connect();
    $stmt = $con->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    $stmt->bind_param("i", $idUsuario);
    $resultado = $stmt->execute();
    $stmt->close();
    $con->close();
    return $resultado;
  }

  public static function updateUsuario($usuario) {
    $con = DataBase::connect();
    $stmt = $con->prepare("UPDATE usuarios SET nombre_usuario = ?, apellidos_usuario = ?, email = ?, direccion = ?, ciudad = ?, tipo_usuario = ? WHERE id_usuario = ?");
    
    $nombreUsuario = $usuario->getNombreUsuario();
    $apellidosUsuario = $usuario->getApellidosUsuario();
    $email = $usuario->getEmail();
    $direccion = $usuario->getDireccion();
    $ciudad = $usuario->getCiudad();
    $tipoUsuario = $usuario->getTipoUsuario();
    $idUsuario = $usuario->getIdUsuario();

    $stmt->bind_param("ssssssi", $nombreUsuario, $apellidosUsuario, $email, $direccion, $ciudad, $tipoUsuario, $idUsuario);
    $resultado = $stmt->execute();
    $stmt->close();
    $con->close();
    return $resultado;
  }
}
?>