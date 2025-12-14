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

    const divsExistentes = seccionUsuarios.querySelectorAll('div');
    if (divsExistentes.length > 0) {
      divsExistentes.forEach(div => div.remove());
    }

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
    
    const botonesEliminar = document.querySelectorAll('.eliminar-usuario');
    
    botonesEliminar.forEach(boton => {
      console.log(boton.innerHTML);
      boton.addEventListener("click", () => {
        const idUsuario = boton.dataset.id;
        eliminarUsuario(idUsuario);
      });
    });
    
  });
}


const eliminarUsuario = (idUsuario) => {
  console.log("Eliminando usuario con id: " + idUsuario);
  fetch(`http://localhost/pizzeriaOviedo/api.php/?controller=Usuario&action=eliminarUsuario&idUsuario=${idUsuario}`, { method: 'DELETE' })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data.success) cargarUsuarios();
    else alert(data.message);
  });
}