
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
  <a href="?" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <img src="public/assets/imagen_LOGO.png" alt="Logo pizzeria Oviedo" width="40" height="40" class="me-2" />
    <span class="fs-4">Panel admin</span>
  </a>
  <hr />
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

<section id="productos" class="content-section">
  <div>
    <h1>Gestión de productos</h1>
  </div>
</section>

<section id="ingredientes" class="content-section" style="display: none;">
  <div>
    <h1>Gestión de ingredientes</h1>
  </div>
</section>

<section id="pedidos" class="content-section" style="display: none;">
  <div>
    <h1>Gestión de pedidos</h1>
  </div>
</section>

<section id="descuentos" class="content-section" style="display: none;">
  <div>
    <h1>Gestión de descuentos</h1>
  </div>
</section>

<section id="categorias" class="content-section" style="display: none;">
  <div>
    <h1>Gestión de categorías</h1>
  </div>
</section>

<section id="usuarios" class="content-section" style="display: none;">
  <div>
    <h1>Gestión de usuarios</h1>
  </div>
</section>

<script>
  fetch('http://localhost/pizzeriaOviedo/api.php/?controller=Usuario&action=getUsuarios')
  .then(response => response.json())
  .then(data => {
    console.log(data);
  });

  const botonesMenu = document.querySelectorAll('.menu-btn');

  const secciones = document.querySelectorAll('.content-section');

  botonesMenu.forEach((boton, index) => {
    boton.addEventListener("click", () => {
      secciones.forEach((seccion, indexSec) => {
        if (index === indexSec) {
          seccion.style.display = 'block';
        } else {
          seccion.style.display = 'none';
        }
      });
      botonesMenu.forEach((btn, indexBtn) => {
        if (index === indexBtn) {
          btn.classList.add('active');
        } else {
          btn.classList.remove('active');
        }
      });
    })
  });


  
</script>

<style>

.nav-link {
  width: 100%;
  text-align: start;
  color: white !important;
}


</style>