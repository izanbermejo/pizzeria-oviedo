
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

<script>

  class Usuario {
    constructor(idUsuario, nombreUsuario, apellidosUsuario, ciudad, direccion, email, contrasena, tipoUsuario) {
      this.idUsuario = idUsuario;
      this.nombreUsuario = nombreUsuario;
      this.apellidosUsuario = apellidosUsuario;
      this.ciudad = ciudad;
      this.direccion = direccion;
      this.email = email;
      this.contrasena = contrasena;
      this.tipoUsuario = tipoUsuario;
    }
  }

  const cargarUsuarios = () => {
    fetch('http://localhost/pizzeriaOviedo/api.php/?controller=Usuario&action=getUsuarios')
    .then(response => response.json())
    .then(data => {
      const usuarios = data.map(u => new Usuario(u.id_usuario, u.nombre_usuario, u.apellidos_usuario, u.ciudad, u.direccion, u.email, u.contrasena, u.tipo_usuario));

      usuarios.forEach(usuario => {
        console.log(usuario);
      });

      const seccionUsuarios = document.getElementById('usuarios');

      usuarios.forEach(u => {
        const divUsuario = document.createElement('div');
        divUsuario.classList.add('usuario-item');

        divUsuario.innerHTML = `
          <div style="width: 40%;"><h3>${u.nombreUsuario} ${u.apellidosUsuario}</h3></div>
          <div style="width: 40%;"><p>Email: ${u.email}</p></div>
          <div style="width: 10%; text-align: right"><p>${u.tipoUsuario}</p></div>
          <div style="width: 10%; text-align: right" class="acciones-usuario d-flex flex-row justify-content-end gap-3">
            <button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#285db8" d="M416.9 85.2L372 130.1L509.9 268L554.8 223.1C568.4 209.6 576 191.2 576 172C576 152.8 568.4 134.4 554.8 120.9L519.1 85.2C505.6 71.6 487.2 64 468 64C448.8 64 430.4 71.6 416.9 85.2zM338.1 164L122.9 379.1C112.2 389.8 104.4 403.2 100.3 417.8L64.9 545.6C62.6 553.9 64.9 562.9 71.1 569C77.3 575.1 86.2 577.5 94.5 575.2L222.3 539.7C236.9 535.6 250.2 527.9 261 517.1L476 301.9L338.1 164z"/></svg></button>
            <button class="eliminar-usuario" data-id="${u.idUsuario}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#d62424" d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/></svg></button>
          </div>
        `;

        seccionUsuarios.appendChild(divUsuario);
      })

      const anadirUsuario = document.createElement('div');
      anadirUsuario.classList.add('usuario-item');

      anadirUsuario.innerHTML = `
        <button style="width: 100%; border: none; background: none; padding: 15px;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 30px"><path fill="#5b5b5bff" d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg>
        </button>
      `;

      seccionUsuarios.appendChild(anadirUsuario);
      
      
      
    });
  }
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