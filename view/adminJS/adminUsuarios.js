class Usuario {
  constructor(id_usuario, nombre_usuario, apellidos_usuario, ciudad, direccion, email, contrasena, tipo_usuario) {
    this.id_usuario = id_usuario;
    this.nombre_usuario = nombre_usuario;
    this.apellidos_usuario = apellidos_usuario;
    this.ciudad = ciudad;
    this.direccion = direccion;
    this.email = email;
    this.contrasena = contrasena;
    this.tipo_usuario = tipo_usuario;
  }
}

const cargarUsuarios = () => {
  const seccionUsuarios = document.getElementById('usuarios');

  const divsExistentes = seccionUsuarios.querySelectorAll('div');
  if (divsExistentes.length > 0) {
    divsExistentes.forEach(div => div.remove());
  }

  fetch('api.php/?controller=Usuario&action=getUsuarios')
  .then(response => response.json())
  .then(data => {
    const usuarios = data.map(u => new Usuario(u.id_usuario, u.nombre_usuario, u.apellidos_usuario, u.ciudad, u.direccion, u.email, u.contrasena, u.tipo_usuario));

    usuarios.forEach(usuario => {
      console.log(usuario);
    });

    usuarios.forEach(u => {
      const divUsuario = document.createElement('div');
      divUsuario.classList.add('item-lista');

      divUsuario.innerHTML = `
        <div style="width: 40%;"><h3>${u.nombre_usuario} ${u.apellidos_usuario}</h3></div>
        <div style="width: 40%;"><p>Email: ${u.email}</p></div>
        <div style="width: 10%; text-align: right"><p>${u.tipo_usuario}</p></div>
        <div style="width: 10%; text-align: right" class="acciones-item-lista d-flex flex-row justify-content-end gap-3">
          <button class="editar-usuario" data-id="${u.id_usuario}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#285db8" d="M416.9 85.2L372 130.1L509.9 268L554.8 223.1C568.4 209.6 576 191.2 576 172C576 152.8 568.4 134.4 554.8 120.9L519.1 85.2C505.6 71.6 487.2 64 468 64C448.8 64 430.4 71.6 416.9 85.2zM338.1 164L122.9 379.1C112.2 389.8 104.4 403.2 100.3 417.8L64.9 545.6C62.6 553.9 64.9 562.9 71.1 569C77.3 575.1 86.2 577.5 94.5 575.2L222.3 539.7C236.9 535.6 250.2 527.9 261 517.1L476 301.9L338.1 164z"/></svg></button>
          <button class="eliminar-usuario" data-id="${u.id_usuario}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#d62424" d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/></svg></button>
        </div>
      `;

      seccionUsuarios.appendChild(divUsuario);
    })

    const anadirUsuario = document.createElement('div');
    anadirUsuario.classList.add('item-lista');

    anadirUsuario.innerHTML = `
      <button class="anadir-usuario" style="width: 100%; border: none; background: none; padding: 15px;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 30px"><path fill="#5b5b5bff" d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg>
      </button>
    `;

    seccionUsuarios.appendChild(anadirUsuario);
    
    const botonesEliminar = document.querySelectorAll('.eliminar-usuario');
    
    botonesEliminar.forEach(boton => {
      console.log(boton.innerHTML);
      boton.addEventListener("click", () => {
        const idUsuario = boton.dataset.id;
        eliminarUsuario(idUsuario);
      });
    });

    const botonesEditar = document.querySelectorAll('.editar-usuario');
    
    botonesEditar.forEach(boton => {
      console.log(boton.innerHTML);
      boton.addEventListener("click", () => {
        console.log("Editando usuario");
        const idUsuario = boton.dataset.id;
        idEditar = true;
        anadirEditarUsuario(idEditar, idUsuario);
      });
    });

    const botonAnadir = document.querySelectorAll('.anadir-usuario');
    
    botonAnadir[0].addEventListener("click", () => {
      isEditar = false;
      anadirEditarUsuario(isEditar);
    });
    
  });
}

const anadirEditarUsuario = (isEditar, idUsuario=null) => { 
  const seccionUsuarios = document.getElementById('usuarios');

  const divsExistentes = seccionUsuarios.querySelectorAll('div');
  if (divsExistentes.length > 0) {
    divsExistentes.forEach(div => div.remove());
  }

  if (isEditar) {
    fetch(`api.php/?controller=Usuario&action=getUsuarioById&idUsuario=${idUsuario}`, { method: 'GET' })
    .then(response => response.json())
    .then(usuario => {
      construirFormularioUsuario(isEditar, usuario.data);      
    });
  } else {
    construirFormularioUsuario(isEditar, null);
  }
}

const construirFormularioUsuario = (isEditar, usuario) => {
  const seccionUsuarios = document.getElementById('usuarios');

  const formulario = document.createElement('div');
  formulario.classList.add('usuario-formulario');

  formulario.innerHTML = `
    <form class='formulario-edicion'>
      <h2>${isEditar ? 'Editar Usuario (ID: ' + usuario.id_usuario + ')' : 'Añadir Nuevo Usuario'}</h2>
      <div class='form-group'>
        <label for="nombreUsuario">Nombre</label>
        <input type="text" class="form-control" id="nombreUsuario" value="${isEditar ? usuario.nombre_usuario : ''}">
      </div>
      <div class='form-group'>
        <label for="apellidosUsuario">Apellidos</label>
        <input type="text" class="form-control" id="apellidosUsuario" value="${isEditar ? usuario.apellidos_usuario : ''}">
      </div>
      <div class='form-group'>
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="ejemplo@email.com" value="${isEditar ? usuario.email : ''}">
      </div>
      ${isEditar ? '' : '<div class="form-group">'}
      ${isEditar ? '' : '<label for="contrasena">Contraseña</label>'}
      ${isEditar ? '' : '<input type="password" class="form-control" id="contrasena" placeholder="Contraseña">'}
      ${isEditar ? '' : '</div>'}
      <div class='form-group'>
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" value="${isEditar ? usuario.ciudad : ''}">
      </div>
      <div class='form-group'>
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" value="${isEditar ? usuario.direccion : ''}">
      </div>
      <div class='form-group'>
        <label for="tipoUsuario">Administrador</label>
        <input type="checkbox" class="form-check-input" id="tipoUsuario" ${isEditar && usuario.tipo_usuario === 'admin' ? 'checked' : ''}>
      </div>
      <div class='d-flex justify-content-end gap-2'>
        <button class="cancelarEdicion btn btn-secondary" type="button" id="cancelarBtn">Cancelar</button>
        <button class="btn btn-primary" type="submit">${isEditar ? 'Guardar Cambios' : 'Añadir Usuario'}</button>
      </div>
    </form>
  `;

  const botonCancelar = formulario.querySelector('.cancelarEdicion');
  botonCancelar.addEventListener("click", () => {
    cargarUsuarios();
  });

  const formEdicion = formulario.querySelector('.formulario-edicion');
  formEdicion?.addEventListener("submit", (e) => {
    e.preventDefault();
    
    if (isEditar) {
      guardarCambiosUsuario(usuario.id_usuario);
    } else {
      guardarNuevoUsuario();
    }
  });

  seccionUsuarios.appendChild(formulario);
}

const eliminarUsuario = (idUsuario) => {
  console.log("Eliminando usuario con id: " + idUsuario);
  fetch(`api.php/?controller=Usuario&action=eliminarUsuario&idUsuario=${idUsuario}`, { method: 'DELETE' })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data.success) cargarUsuarios();
    else alert(data.message);
  });
}

const guardarCambiosUsuario = (idUsuario) => {
  console.log("Guardando cambios del usuario con id: " + idUsuario);

  usuarioEditado = new Usuario(
    idUsuario,
    document.getElementById('nombreUsuario').value,
    document.getElementById('apellidosUsuario').value,
    document.getElementById('ciudad').value,
    document.getElementById('direccion').value,
    document.getElementById('email').value,
    null,
    document.getElementById('tipoUsuario').checked ? 'admin' : 'usuario'
  );

  fetch(`api.php/?controller=Usuario&action=guardarCambiosUsuario&idUsuario=${idUsuario}`, { method: 'PUT',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(usuarioEditado) })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data.success) cargarUsuarios();
    else alert(data.message);
  });

}

const guardarNuevoUsuario = () => {
  // console.log("Guardando cambios del usuario con id: " + idUsuario);

  nuevoUsuario = new Usuario(
    null,
    document.getElementById('nombreUsuario').value,
    document.getElementById('apellidosUsuario').value,
    document.getElementById('ciudad').value,
    document.getElementById('direccion').value,
    document.getElementById('email').value,
    document.getElementById('contrasena').value,
    document.getElementById('tipoUsuario').checked ? 'admin' : 'usuario'
  );

  fetch(`api.php/?controller=Usuario&action=guardarNuevoUsuario`, { method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(nuevoUsuario) })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data.success) cargarUsuarios();
    else alert(data.message);
  });

}