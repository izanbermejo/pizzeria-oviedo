<section class="section-login d-flex justify-content-center align-items-center bg-secondary">
  <div class="card-formulario d-flex flex-column card shadow gap-4">
    <h2>Iniciar sesión</h2>
    <form action="?controller=InicioSesion&action=loginUsuario" method="POST" class="d-flex flex-column gap-3">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="ejemplo@email.com" name="email">
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="d-flex flex-row justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        <a class="link-registrar" href="?controller=InicioSesion&action=register">Registrarse</a>
      </div>
    </form>
  </div>
</section>

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

  .link-registrar {
    text-decoration: none;
    color: #252525ff;
  }
</style>