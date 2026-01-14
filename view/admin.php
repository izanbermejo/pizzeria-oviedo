
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark justify-content-between" style="width: 280px; height: 100vh; position: fixed; ">
  <div>
    <a href="?" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <img src="public/assets/imagen_LOGO.webp" alt="Logo pizzeria Oviedo" width="40" height="40" class="me-2" />
      <span class="fs-4">Panel admin</span>
    </a>
    <hr />
  
    <!-- Menú de navegación lateral -->
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
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
  </div>
  <div>
    <hr />
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 23px;" class="me-3">
          <path fill="#ffffff" d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z" />
        </svg>
        <strong><?= $_SESSION['usuario']->getNombreUsuario() ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="?controller=Usuario&action=verPerfil">Perfil</a></li>
        <li>
          <a class="dropdown-item" href="#">Moneda &raquo;</a>
          <ul class="dropdown-menu dropdown-submenu dropdown-menu-dark text-small shadow">
            <li>
              <a class="dropdown-item" href="?controller=Admin&action=index&moneda=EUR">Euro</a>
            </li>
            <li>
              <a class="dropdown-item" href="?controller=Admin&action=index&moneda=USD">Dólar estadounidense</a>
            </li>
            <li>
              <a class="dropdown-item" href="?controller=Admin&action=index&moneda=GBP">Libra esterlina</a>
            </li>
          </ul>
        </li>
        <li>
          <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item" href="?controller=InicioSesion&action=logoutUsuario">Cerrar Sesión</a></li>
      </ul>
    </div>
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
<script src="view/adminJS/adminProductos.js"></script>
<script src="view/adminJS/adminPedidos.js"></script>
<script src="view/adminJS/adminUsuarios.js"></script>

<!-- Script para gestionar que sección se muestra -->
<script type="module">
const API_KEY = 'fca_live_gy8rqu1MhXPLdHU8V7XYwatrU7eJVPKVcqzmu7UI';

  const params = new URLSearchParams(window.location.search);
  const moneda = params.get('moneda') || 'EUR';

  const calcularCambioMoneda = async (cambioMoneda) => {
    return fetch(`https://api.freecurrencyapi.com/v1/latest?apikey=${API_KEY}&base_currency=EUR&currencies=${cambioMoneda}`)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        console.log('EUR → ' + cambioMoneda + ':', data.data[cambioMoneda]);
        return data.data[cambioMoneda];
      })
      .catch(error => console.error(error));
  }

  const buscarSimboloMoneda = async (cambioMoneda) => {
    return fetch(`https://api.freecurrencyapi.com/v1/currencies?apikey=${API_KEY}&base_currency=EUR&currencies=${cambioMoneda}`)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        console.log('Simbolo → ' + cambioMoneda + ':', data.data[cambioMoneda].symbol);
        return data.data[cambioMoneda].symbol;
      })
      .catch(error => console.error(error));
  }

  const tasa = await calcularCambioMoneda(moneda);
  const simbolo = await buscarSimboloMoneda(moneda);

  console.log('Tasa de cambio: ' + tasa);
  console.log('Símbolo de la moneda: ' + simbolo);

  // const calcularCambioMonedaYSimbolo = async () => {
  //   try {
  //     const [tasa, simbolo] = await Promise.all([
  //       calcularCambioMoneda(moneda),
  //       buscarSimboloMoneda(moneda)
  //     ]);
      
  //   }
  // }

  // calcularCambioMonedaYSimbolo();
  // console.log(tasa, simbolo);
  
  

  // Al cargar la página, muestra la sección de productos por defecto
  cargarProductos(tasa, simbolo);

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
            case 'productos':
              cargarProductos(tasa, simbolo);
              break;
            case 'pedidos':
              cargarPedidos(tasa, simbolo);
              break;
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
  margin-left: 280px;
}

.section-title {
  margin: 20px;
  margin-bottom: 30px;
}

/* Estilos para los elementos de usuario */
.item-lista {
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

.item-lista:last-of-type {
  padding: 0px;
}

button.item-lista {
  justify-content: center;
  align-items: center;
  width: 100%;
  border: none;
}

.acciones-item-lista button {
  background: none;
  border: none;
  padding: 0;
}

.acciones-item-lista svg {
  width: 30px;
  height: 30px;
  cursor: pointer;
}

.formulario-edicion, .formulario-filtrar {
  display: flex;
  flex-direction: column;
  gap: 15px;
  margin: 15px 20px;
  background-color: var(--bs-secondary);
  box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.24);
  border-radius: 16px;
  padding: 30px;
}

.formulario-edicion label, .formulario-filtrar label {
  padding-left: 10px;
}

.item-lista-modal {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.dropdown-menu .dropdown-submenu {
  display: none;
  position: absolute;
  left: 100%;
  top: -7px;
}

.dropdown-menu > li:hover > .dropdown-submenu {
  display: block;
}

</style>