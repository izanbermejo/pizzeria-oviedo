<header class="titulo-pagina">
  <h1>Perfil de Usuario</h1>
</header>

<section class="perfil d-flex flex-column justify-content-between">
  <div class="d-flex flex-row w-100" style="height: 50vh;">
    <div class="d-flex justify-content-center w-50">
      <div style="background-color: #d6d6d6ff;" class="div-icono-usuario d-flex justify-content-center align-items-center shadow">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 50%;"><path fill="#ffffffff" d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
      </div>
    </div>
  
    <div class="editar-usuario d-flex flex-column w-50">
      <form action="?controller=Usuario&action=guardarCambiosPerfil" method="post" class="d-flex flex-column gap-3">
        <div class="form-group">
          <label for="nombreUsuario">Nombre de Usuario</label>
          <input type="text" id="nombreUsuario" name="nombreUsuario" value="<?php echo $_SESSION['usuario']->getNombreUsuario(); ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="apellidosUsuario">Apellidos</label>
          <input type="text" id="apellidosUsuario" name="apellidosUsuario" value="<?php echo $_SESSION['usuario']->getApellidosUsuario(); ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="<?php echo $_SESSION['usuario']->getEmail(); ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="contraseña">Contraseña</label>
          <input type="password" id="contrasena" name="contrasena" placeholder="******" class="form-control">
        </div>
        <div class="form-group">
          <label for="direccion">Dirección</label>
          <input type="text" id="direccion" name="direccion" value="<?php echo $_SESSION['usuario']->getDireccion(); ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="ciudad">Ciudad</label>
          <input type="text" id="ciudad" name="ciudad" value="<?php echo $_SESSION['usuario']->getCiudad(); ?>" class="form-control">
        </div>
        <div class='d-flex justify-content-end gap-2'>
          <a href="?controller=Usuario&action=verPerfil" class="cancelarEdicion btn btn-secondary">Cancelar</a>
          <button class="btn btn-primary" type="submit">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</section>

<style>

.perfil {
  background-color: #F7F9F9;
  border-top: solid 2px var(--bs-secondary);
  padding-left: 184px !important;
  padding-right: 184px !important;
  padding-bottom: 74px;
  padding-top: 74px;
  color: black;
}

.div-icono-usuario {
  width: 50%;
  border-radius: 16px;
}

</style>