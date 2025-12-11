<section class="section-login d-flex justify-content-center align-items-center bg-secondary">
  <div class="card-formulario d-flex flex-column card shadow gap-4">
    <h2>Registrarse</h2>
    <form action="?controller=InicioSesion&action=registrarUsuario" method="POST" class="d-flex flex-column gap-3">
      <div class="form-row d-flex flex-row gap-3">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
      </div>
      <div class="form-row d-flex flex-row gap-3">
        <div class="form-group">
          <label for="ciudad">Ciudad</label>
          <input type="text" class="form-control" id="ciudad" name="ciudad" required>
        </div>
        <div class="form-group">
          <label for="inputCP">C.P.</label>
          <input type="number" class="form-control" id="inputCP" name="cp" placeholder="00000" required>
        </div>
      </div>
      <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@email.com" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="d-flex flex-row justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a class="link-login" href="?controller=InicioSesion&action=login">Iniciar sesión</a>
      </div>
    </form>
  </div>
</section>

<?php 

$usuario = new Usuario(
    null,
    $_POST['nombre'],
    $_POST['apellidos'],
    $_POST['email'],
    password_hash($_POST['password'], PASSWORD_DEFAULT),
    $_POST['direccion'],
    $_POST['ciudad'],
    null
);

?>

<style>
  .section-login{
    padding-top: 60px;
    padding-bottom: 60px;
  }
  .card-formulario {
    width: 40%;
    height: fit-content !important;
    padding: 60px 80px;
  }

  .form-group {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  label {
    padding-left: 10px;
  }

  .link-login {
    text-decoration: none;
    color: #252525ff;
  }
</style>