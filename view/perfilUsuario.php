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
  
    <div class="datos-usuario d-flex flex-column w-50">
      <h2><?php echo $_SESSION['usuario']->getNombreUsuario(); ?></h2>
      <h3><?php echo $_SESSION['usuario']->getApellidosUsuario(); ?></h3>
      <p><strong>Email:</strong> <?php echo $_SESSION['usuario']->getEmail(); ?></p>
      <p><strong>Dirección:</strong> <?php echo $_SESSION['usuario']->getDireccion(); ?></p>
      <a href="#" class="btn btn-secondary">Editar Usuario</a>
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

.datos-usuario {
  padding-left: 50px;
  padding-top: 20px;
  gap: 5px;
}

.datos-usuario p {
  margin-top: 15px;
}

.datos-usuario a {
  margin-top: 25px;
}

</style>