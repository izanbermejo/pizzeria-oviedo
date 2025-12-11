<section class="section-login d-flex justify-content-center align-items-center bg-secondary">
  <div class="card-formulario d-flex flex-column card shadow gap-4">
    <h2>Registrarse</h2>
    <form class="d-flex flex-column gap-3">
      <div class="form-row d-flex flex-row gap-3">
        <div class="form-group">
          <label for="inputNombre">Nombre</label>
          <input type="text" class="form-control" id="inputNombre" required>
        </div>
        <div class="form-group">
          <label for="inputApellidos">Apellidos</label>
          <input type="text" class="form-control" id="inputApellidos" required>
        </div>
      </div>
      <div class="form-row d-flex flex-row gap-3">
        <div class="form-group">
          <label for="inputCiudad">Ciudad</label>
          <input type="text" class="form-control" id="inputCiudad" required>
        </div>
        <div class="form-group">
          <label for="inputCP">C.P.</label>
          <input type="number" class="form-control" id="inputCP" placeholder="00000" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inputDireccion">Dirección</label>
        <input type="text" class="form-control" id="inputDireccion" required>
      </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="ejemplo@email.com" required>
      </div>
      <div class="form-group">
        <label for="inputPassword4">Contraseña</label>
        <input type="password" class="form-control" id="inputPassword" required>
      </div>
      <div class="d-flex flex-row justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a class="link-login" href="?controller=InicioSesion&action=login">Iniciar sesión</a>
      </div>
    </form>
  </div>
</section>

<?php 


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