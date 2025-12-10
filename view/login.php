<section class="section-login d-flex justify-content-center align-items-center bg-secondary">
  <div class="card-formulario d-flex flex-column card shadow gap-4">
    <h2>Registrarse</h2>
    <form class="d-flex flex-column gap-3">
      <div class="form-row d-flex flex-row gap-3">
        <div class="form-group">
          <label for="inputNombre">Nombre</label>
          <input type="text" class="form-control" id="inputNombre">
        </div>
        <div class="form-group">
          <label for="inputApellidos">Apellidos</label>
          <input type="text" class="form-control" id="inputApellidos">
        </div>
      </div>
      <div class="form-row d-flex flex-row gap-3">
        <div class="form-group">
          <label for="inputCiudad">Ciudad</label>
          <input type="text" class="form-control" id="inputCiudad">
        </div>
        <div class="form-group">
          <label for="inputCP">C.P.</label>
          <input type="number" class="form-control" id="inputCP" placeholder="00000">
        </div>
      </div>
      <div class="form-group">
        <label for="inputDireccion">Dirección</label>
        <input type="text" class="form-control" id="inputDireccion">
      </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
  </div>
</section>

<style>
  .section-login{
    height: 700px;
  }
  .card-formulario {
    width: 40%;
    height: fit-content !important;
    padding: 60px 80px;
  }

  .form-group {
    width: 100%;
  }
</style>