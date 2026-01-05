class Pedido {
  constructor(id_pedido, id_usuario, id_codigo_descuento, direccion_pedido, importe_total, fecha_pedido) {
    this.id_pedido = id_pedido;
    this.id_usuario = id_usuario;
    this.id_codigo_descuento = id_codigo_descuento;
    this.direccion_pedido = direccion_pedido;
    this.importe_total = importe_total;
    this.fecha_pedido = fecha_pedido;
  }
}

const cargarPedidos = () => {
  const seccionPedidos = document.getElementById('pedidos');

  const divsExistentes = seccionPedidos.querySelectorAll('div');
  if (divsExistentes.length > 0) {
    divsExistentes.forEach(div => div.remove());
  }

  fetch('api.php/?controller=Pedido&action=getPedidos')
  .then(response => response.json())
  .then(data => {
    const pedidos = data.map(p => new Pedido(p.id_pedido, p.id_usuario, p.id_codigo_descuento, p.direccion_pedido, p.importe_total, p.fecha_pedido));

    pedidos.forEach(p => {
      const divPedido = document.createElement('div');
      divPedido.classList.add('item-lista');

      divPedido.innerHTML = `
      <div style="width: 5%;"><h3>ID: ${p.id_pedido}</h3></div>
      <div style="width: 15%;"><p><b>Usuario: ${p.id_usuario}</b></p></div>
      <div style="width: 40%;"><p><b>${p.direccion_pedido}</b></p></div>
      <div style="width: 10%; text-align: right; ${p.id_codigo_descuento ? 'color: red' : ''}"><p><b>${p.id_codigo_descuento ? '-'+p.id_codigo_descuento : 'Sin descuento'}</b></p></div>
      <div style="width: 5%; text-align: right"><p><b>${p.importe_total}€</b></p></div>
      <div style="width: 15%; text-align: right"><p><b>${p.fecha_pedido}</b></p></div>
      <div style="width: 10%; text-align: right" class="acciones-item-lista d-flex flex-row justify-content-end gap-3">
        <button class="editar-pedido" data-id="${p.id_pedido}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#285db8" d="M416.9 85.2L372 130.1L509.9 268L554.8 223.1C568.4 209.6 576 191.2 576 172C576 152.8 568.4 134.4 554.8 120.9L519.1 85.2C505.6 71.6 487.2 64 468 64C448.8 64 430.4 71.6 416.9 85.2zM338.1 164L122.9 379.1C112.2 389.8 104.4 403.2 100.3 417.8L64.9 545.6C62.6 553.9 64.9 562.9 71.1 569C77.3 575.1 86.2 577.5 94.5 575.2L222.3 539.7C236.9 535.6 250.2 527.9 261 517.1L476 301.9L338.1 164z"/></svg></button>
        <button class="eliminar-pedido" data-id="${p.id_pedido}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#d62424" d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/></svg></button>
      </div>
      `;

      seccionPedidos.appendChild(divPedido);
    })

    // Añadir botón de añadir producto
    const anadirPedido = document.createElement('div');
    anadirPedido.classList.add('item-lista');

    anadirPedido.innerHTML = `
      <button class="anadir-pedido" style="width: 100%; border: none; background: none; padding: 15px;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 30px"><path fill="#5b5b5bff" d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg>
      </button>
    `;

    seccionPedidos.appendChild(anadirPedido);
    
    // evento eliminar producto
    const botonesEliminar = document.querySelectorAll('.eliminar-pedido');
    
    botonesEliminar.forEach(boton => {
      boton.addEventListener("click", () => {
        const idPedido = boton.dataset.id;
        eliminarPedido(idPedido);
      });
    });

    // evento editar producto
    const botonesEditar = document.querySelectorAll('.editar-pedido');
    
    botonesEditar.forEach(boton => {
      boton.addEventListener("click", () => {
        const idPedido = boton.dataset.id;
        idEditar = true;
        anadirEditarPedido(idEditar, idPedido);
      });
    });

    // evento añadir producto
    const botonAnadir = document.querySelectorAll('.anadir-pedido');
    
    botonAnadir[0].addEventListener("click", () => {
      isEditar = false;
      anadirEditarPedido(isEditar);
    });
    
  });
}

const eliminarPedido = (idPedido) => {
  fetch(`api.php/?controller=Pedido&action=eliminarPedido&idPedido=${idPedido}`, { method: 'DELETE' })
  .then(response => response.json())
  .then(data => {
    if(data.success) cargarPedidos();
    else alert(data.message);
  });
}

const anadirEditarPedido = (isEditar, idPedido=null) => { 
  const seccionPedidos = document.getElementById('pedidos');

  const divsExistentes = seccionPedidos.querySelectorAll('div');
  if (divsExistentes.length > 0) {
    divsExistentes.forEach(div => div.remove());
  }

  if (isEditar) {
    fetch(`api.php/?controller=Pedido&action=getPedidoById&idPedido=${idPedido}`, { method: 'GET' })
    .then(response => response.json())
    .then(pedido => {
      construirFormularioPedido(isEditar, pedido.data);
    });
  } else {
    construirFormularioPedido(isEditar, null);
  }
}

construirFormularioPedido = async (isEditar, pedido) => {
  const seccionPedidos = document.getElementById('pedidos');

  const formulario = document.createElement('div');
  formulario.classList.add('pedidos-formulario');

  const descuentos = [];

  await fetch('api.php/?controller=CodigoDescuento&action=getCodigosDescuentoActivos')
  .then(response => response.json())
  .then(data => {
    data.forEach(d => {
      descuentos.push(d);
    })
  });

  formulario.innerHTML = `
  <form class='formulario-edicion'>
    <h2>${isEditar ? 'Editar Pedido (ID: ' + pedido.id_pedido + ')' : 'Añadir Nuevo Producto'}</h2>
    <div class='form-group'>
      <label for="direccionPedido">Dirección</label>
      <input type="text" class="form-control" id="direccionPedido" value="${isEditar ? pedido.direccion_pedido : ''}">
    </div>
    <div class="d-flex flex-row gap-3">
      <div class="form-group w-50">
        <label for="importeTotal">Importe del pedido</label>
        <input type="number" step="0.01" min="0" placeholder="0,00" class="form-control" id="importeTotal" value="${isEditar ? pedido.importe_total : ''}" required>
      </div>
      <div class="form-group w-50">
        <label for="descuentoPedido">Descuento</label>
        <select class="form-select" id="descuentoPedido"></select>
      </div>
    </div>
    <div class='d-flex justify-content-end gap-2'>
      <button class="cancelarEdicion btn btn-secondary" type="button" id="cancelarBtn">Cancelar</button>
      <button class="btn btn-primary" type="submit">${isEditar ? 'Guardar Cambios' : 'Añadir Pedido'}</button>
    </div>
  </form>
  `;

  // Rellenar select descuentos
  const selectDescuento = formulario.querySelector('#descuentoPedido');

  selectDescuento.innerHTML = '<option value="" selected disabled>Selecciona un descuento</option>';

  descuentos.forEach(d => {
    const option = document.createElement('option');
    option.value = d.id_codigo_descuento;
    option.selected = isEditar && pedido.id_codigo_descuento == d.id_codigo_descuento ? true : false;
    option.textContent = `${d.porcentaje_descuento}%`;
    selectDescuento.appendChild(option);
  });

  const botonCancelar = formulario.querySelector('.cancelarEdicion');
  botonCancelar.addEventListener("click", () => {
    cargarPedidos();
  });
  
  const formEdicion = formulario.querySelector('.formulario-edicion');
  formEdicion?.addEventListener("submit", (e) => {
    e.preventDefault();
    
    if (isEditar) {
      guardarCambiosPedido(pedido.id_pedido);
    } else {
      guardarNuevoPedido();
    }
  });

  seccionPedidos.appendChild(formulario);
}

const guardarCambiosPedido = (idPedido) => {

  const pedidoEditado = new Pedido(
    idPedido,
    null,// document.getElementById('usuarioPedido').value,
    document.getElementById('descuentoPedido').value,
    document.getElementById('direccionPedido').value,
    document.getElementById('importeTotal').value,
    null,// document.getElementById('fechaPedido').value,
  );

  fetch(`api.php/?controller=Pedido&action=guardarCambiosPedido&idPedido=${idPedido}`, { method: 'PUT',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(pedidoEditado) })
  .then(response => response.json())
  .then(data => {
    if(data.success) cargarPedidos();
    else alert(data.message);
  });

}

const guardarNuevoPedido = () => {

  const pedidoEditado = new Pedido(
    null,
    null,
    document.getElementById('descuentoPedido').value,
    document.getElementById('direccionPedido').value,
    document.getElementById('importeTotal').value,
    null,
  );

  fetch(`api.php/?controller=Pedido&action=guardarNuevoPedido`, { method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(pedidoEditado) })
  .then(response => response.json())
  .then(data => {
    if(data.success) cargarPedidos();
    else alert(data.message);
  });

}