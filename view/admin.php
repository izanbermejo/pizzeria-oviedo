
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
  <a href="?" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <img src="public/assets/imagen_LOGO.png" alt="Logo pizzeria Oviedo" width="40" height="40" class="me-2" />
    <span class="fs-4">Panel admin</span>
  </a>
  <hr />

  <!-- Menú de navegación lateral -->
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item" id="productos">
      <button class="nav-link menu-btn active" aria-current="page">
        <span>Productos</span>
      </button>
    </li>
    <li>
      <button class="nav-link menu-btn text-white">
        <span>Ingredientes</span>
      </button>
    </li>
    <li>
      <button class="nav-link menu-btn text-white">
        <span>Pedidos</span>
      </button>
    </li>
    <li>
      <button class="nav-link menu-btn text-white">
        <span>descuentos</span>
      </button>
    </li>
    <li>
      <button class="nav-link menu-btn text-white">
        <span>Categorias</span>
      </button>
    </li>
    <li>
      <button class="nav-link menu-btn text-white">
        <span>Usuarios</span>
      </button>
    </li>
  </ul>
  <hr />
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 23px;" class="me-3">
        <path fill="#ffffff" d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z" />
      </svg>
      <strong><?= $_SESSION['usuario']->getNombreUsuario() ?></strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li>
        <hr class="dropdown-divider" />
      </li>
      <li><a class="dropdown-item" href="?controller=InicioSesion&action=logoutUsuario">Cerrar Sesión</a></li>
    </ul>
  </div>
</div>

<!-- Secciones de contenido principal -->
<section id="productos" class="content-section">
  <h1 class="section-title">Gestión de productos</h1>
</section>

<section id="ingredientes" class="content-section" style="display: none;">
  <h1 class="section-title">Gestión de ingredientes</h1>
</section>

<section id="pedidos" class="content-section" style="display: none;">
  <h1 class="section-title">Gestión de pedidos</h1>
</section>

<section id="descuentos" class="content-section" style="display: none;">
  <h1 class="section-title">Gestión de descuentos</h1>
</section>

<section id="categorias" class="content-section" style="display: none;">
  <h1 class="section-title">Gestión de categorías</h1>
</section>

<section id="usuarios" class="content-section" style="display: none;">
  <h1 class="section-title">Gestión de usuarios</h1>
</section>

<!-- Scripts -->
<script src="view/adminJS/adminUsuarios.js"></script>

<!-- Script para gestionar que sección se muestra -->
<script>

  const botonesMenu = document.querySelectorAll('.menu-btn');

  const secciones = document.querySelectorAll('.content-section');

  //recorre todos los botones y les añade al evento click que se ejuecuta al pulsar el boton
  botonesMenu.forEach((boton, index) => {
    boton.addEventListener("click", () => {
      //ejecuta esto cuando se le da click

      // recorre las secciones y solo mustra la que coincide con el indice del boton pulsado
      secciones.forEach((seccion, indexSec) => {
        if (index === indexSec) {
          seccion.style.display = 'block';

          //dependiendo del id de la seccion cargada ejecuta el metodo de carga de datos
          switch(seccion.id) {
            case 'usuarios':
              cargarUsuarios();
              break;
          }

        } else {
          seccion.style.display = 'none';
        }
      });

      // quita el active a todos los botones y se lo añade al que has pulsado
      botonesMenu.forEach(btn => btn.classList.remove('active'));
      boton.classList.add('active');
      

    })
  });
  
</script>

<style>
/* Estilos para el menú lateral */
.nav-link {
  width: 100%;
  text-align: start;
  color: white !important;
}

/* Estilos para las secciones de contenido */
.content-section {
  padding-bottom: 30px;
  width: 100%;
}

.section-title {
  margin: 20px;
  margin-bottom: 30px;
}

/* Estilos para los elementos de usuario */
.usuario-item {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  background-color: var(--bs-secondary);
  padding: 20px;
  margin: 15px 20px;
  border-radius: 16px;
  box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.24);
}

.usuario-item:last-of-type {
  padding: 0px;
}

button.usuario-item {
  justify-content: center;
  align-items: center;
  width: 100%;
  border: none;
}

.acciones-usuario button {
  background: none;
  border: none;
  padding: 0;
}

.acciones-usuario svg {
  width: 30px;
  height: 30px;
  cursor: pointer;
}


</style>