class Producto {
  constructor(id_producto, $id_subcategoria, $id_descuento, $nombre_producto, descripcion, $precio_producto, $imagen_producto, $activo, $porcentaje_descuento, ingredientes = [], caracteristicasNutricionales = []) {
    this.id_producto = id_producto;
    this.id_subcategoria = $id_subcategoria;
    this.id_descuento = $id_descuento;
    this.nombre_producto = $nombre_producto;
    this.descripcion = descripcion;
    this.precio_producto = $precio_producto;
    this.imagen_producto = $imagen_producto;
    this.activo = $activo;
    this.porcentaje_descuento = $porcentaje_descuento;
    this.ingredientes = ingredientes;
    this.caracteristicasNutricionales = caracteristicasNutricionales;
  }
}

const cargarProductos = () => {
  const seccionProductos = document.getElementById('productos');

  const divsExistentes = seccionProductos.querySelectorAll('div');
  if (divsExistentes.length > 0) {
    divsExistentes.forEach(div => div.remove());
  }

  fetch('api.php/?controller=Producto&action=getProductos')
  .then(response => response.json())
  .then(data => {
    console.log(data);
    const productos = data.map(p => new Producto(p.id_producto, p.id_subcategoria, p.id_descuento, p.nombre_producto, p.descripcion, p.precio_producto, p.imagen_producto, p.activo, p.porcentaje_descuento, p.ingredientes, p.caracteristicasNutricionales));

    productos.forEach(producto => {
      console.log(producto);
    });

    productos.forEach(p => {
      const divProducto = document.createElement('div');
      divProducto.classList.add('item-lista');

      divProducto.innerHTML = `
      <div style="width: 10%;"><img width="100%" src="public/assets/productos/${p.imagen_producto}" alt="imagen ${p.nombre_producto}"></div>
      <div style="width: 70%;"><h3>${p.nombre_producto}</h3></div>
      <div style="width: 5%; text-align: right"><p><b>${p.precio_producto}€</b></p></div>
      <div style="width: 5%; text-align: right; ${p.activo ? "" : "color: red; font-weight: bold"}"><p>${p.activo ? 'activo' : 'inactivo'}</p></div>
      <div style="width: 10%; text-align: right" class="acciones-item-lista d-flex flex-row justify-content-end gap-3">
        <button class="editar-producto" data-id="${p.id_producto}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#285db8" d="M416.9 85.2L372 130.1L509.9 268L554.8 223.1C568.4 209.6 576 191.2 576 172C576 152.8 568.4 134.4 554.8 120.9L519.1 85.2C505.6 71.6 487.2 64 468 64C448.8 64 430.4 71.6 416.9 85.2zM338.1 164L122.9 379.1C112.2 389.8 104.4 403.2 100.3 417.8L64.9 545.6C62.6 553.9 64.9 562.9 71.1 569C77.3 575.1 86.2 577.5 94.5 575.2L222.3 539.7C236.9 535.6 250.2 527.9 261 517.1L476 301.9L338.1 164z"/></svg></button>
        <button class="eliminar-producto" data-id="${p.id_producto}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#d62424" d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/></svg></button>
      </div>
      `;

      seccionProductos.appendChild(divProducto);
    })

    // Añadir botón de añadir producto
    const anadirProducto = document.createElement('div');
    anadirProducto.classList.add('item-lista');

    anadirProducto.innerHTML = `
      <button class="anadir-producto" style="width: 100%; border: none; background: none; padding: 15px;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 30px"><path fill="#5b5b5bff" d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg>
      </button>
    `;

    seccionProductos.appendChild(anadirProducto);
    
    // evento eliminar producto
    const botonesEliminar = document.querySelectorAll('.eliminar-producto');
    
    botonesEliminar.forEach(boton => {
      console.log(boton.innerHTML);
      boton.addEventListener("click", () => {
        const idProducto = boton.dataset.id;
        eliminarProducto(idProducto);
      });
    });

    // evento editar producto
    const botonesEditar = document.querySelectorAll('.editar-producto');
    
    botonesEditar.forEach(boton => {
      console.log(boton.innerHTML);
      boton.addEventListener("click", () => {
        const idProducto = boton.dataset.id;
        idEditar = true;
        anadirEditarProducto(idEditar, idProducto);
      });
    });

    // evento añadir producto
    const botonAnadir = document.querySelectorAll('.anadir-producto');
    
    botonAnadir[0].addEventListener("click", () => {
      isEditar = false;
      anadirEditarProducto(isEditar);
    });
    
  });
}

const eliminarProducto = (idProducto) => {
  console.log("Eliminando producto con id: " + idProducto);
  fetch(`api.php/?controller=Producto&action=eliminarProducto&idProducto=${idProducto}`, { method: 'DELETE' })
  .then(response => response.json())
  .then(data => {
    if(data.success) cargarProductos();
    else alert(data.message);
  });
}

const anadirEditarProducto = (isEditar, idProducto=null) => { 
  const seccionProductos = document.getElementById('productos');

  const divsExistentes = seccionProductos.querySelectorAll('div');
  if (divsExistentes.length > 0) {
    divsExistentes.forEach(div => div.remove());
  }

  if (isEditar) {
    fetch(`api.php/?controller=Producto&action=getProductoById&idProducto=${idProducto}`, { method: 'GET' })
    .then(response => response.json())
    .then(producto => {
      construirFormularioProducto(isEditar, producto.data);
    });
  } else {
    construirFormularioProducto(isEditar, null);
  }
}

construirFormularioProducto = (isEditar, producto) => {
  const seccionProductos = document.getElementById('productos');

  const formulario = document.createElement('div');
  formulario.classList.add('producto-formulario');

  let ingredientesProducto = "";

  if (producto && Array.isArray(producto.ingredientes) && producto.ingredientes.length > 0) {
    producto.ingredientes.forEach(i => {
      ingredientesProducto += i.nombre_ingrediente + ", ";
    });
    ingredientesProducto = ingredientesProducto.slice(0, -2);
  }

  formulario.innerHTML = `
  <form class='formulario-edicion'>
    <h2>${isEditar ? 'Editar Producto (ID: ' + producto.id_producto + ')' : 'Añadir Nuevo Producto'}</h2>
    <div class='form-group'>
      <label for="nombreProducto">Nombre de producto</label>
      <input type="text" class="form-control" id="nombreProducto" value="${isEditar ? producto.nombre_producto : ''}">
    </div>
    <div class='form-group'>
      <label for="descripcionProducto">Descripción</label>
      <input type="text" class="form-control" id="descripcionProducto" value="${isEditar ? producto.descripcion : ''}">
    </div>
    <div class="d-flex flex-row gap-3">
      <div class="form-group w-50">
        <label for="precioProducto">Precio</label>
        <input type="text" class="form-control" id="precioProducto" value="${isEditar ? producto.precio_producto : ''}" required>
      </div>
      <div class="form-group w-50">
        <label for="subcategoriaProducto">Subcategoria</label>
        <select class="form-select" id="subcategoriaProducto" required>
          <option selected disabled>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      <div class="form-group w-50">
        <label for="descuentoProducto">Descuento</label>
        <select class="form-select" id="descuentoProducto">
          <option selected disabled>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
    </div>
    <div class='form-group'>
      <label for="ingredientesProducto">Ingredientes</label>
      <input type="text" class="form-control" id="ingredientesProducto" value="${isEditar ? ingredientesProducto : ''}" disabled>
      <button type="button" class="btn btn-secondary mt-2" style="background-color: #c6d0d3ff;" id="editarIngredientesBtn">Editar Ingredientes</button>
    </div>
    <div class='form-group'>
      <label for="imagenProducto" class="form-label">Imagen del producto</label>
      <input class="form-control" type="file" id="imagenProducto" name="imagenProducto">
    </div>
    <div class='form-group'>
      <label for="activoProducto">Activo:</label>
      <input type="checkbox" class="form-check-input" id="activoProducto" ${isEditar && producto.activo ? 'checked' : ''}>
    </div>
    <div class='d-flex justify-content-end gap-2'>
      <button class="cancelarEdicion btn btn-secondary" type="button" id="cancelarBtn">Cancelar</button>
      <button class="btn btn-primary" type="submit">${isEditar ? 'Guardar Cambios' : 'Añadir Producto'}</button>
    </div>
  </form>
  `;

  const botonCancelar = formulario.querySelector('.cancelarEdicion');
  botonCancelar.addEventListener("click", () => {
    cargarProductos();
  });

  const formEdicion = formulario.querySelector('.formulario-edicion');
  formEdicion?.addEventListener("submit", (e) => {
    e.preventDefault();
    
    if (isEditar) {
      guardarCambiosProducto(producto.id_producto);
    } else {
      guardarNuevoProducto();
    }
  });

  seccionProductos.appendChild(formulario);
}

const guardarCambiosProducto = (idProducto) => {
  console.log("Guardando cambios del producto con id: " + idProducto);

  productoEditado = new Producto(
    idProducto,
    document.getElementById('subcategoriaProducto').value,
    document.getElementById('descuentoProducto').value,
    document.getElementById('nombreProducto').value,
    document.getElementById('descripcionProducto').value,
    document.getElementById('precioProducto').value,
    document.getElementById('imagenProducto').value,
    document.getElementById('activoProducto').checked,
    null,// document.getElementById('porcentajeDescuentoProducto').value,
    null,// document.getElementById('ingredientesProducto').value,
    null,// document.getElementById('caracteristicasProducto').value,
  );

  console.log(productoEditado);

  fetch(`api.php/?controller=Producto&action=guardarCambiosProducto&idProducto=${idProducto}`, { method: 'PUT',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(productoEditado) })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data.success) cargarProductos();
    else alert(data.message);
  });

}

const guardarNuevoProducto = () => {
  // console.log("Guardando cambios del usuario con id: " + idUsuario);

  productoEditado = new Producto(
    idProducto,
    document.getElementById('subcategoriaProducto').value,
    document.getElementById('descuentoProducto').value,
    document.getElementById('nombreProducto').value,
    document.getElementById('descripcionProducto').value,
    document.getElementById('precioProducto').value,
    document.getElementById('imagenProducto').value,
    document.getElementById('activoProducto').checked,
    null,// document.getElementById('porcentajeDescuentoProducto').value,
    null,// document.getElementById('ingredientesProducto').value,
    null,// document.getElementById('caracteristicasProducto').value,
  );

  fetch(`api.php/?controller=Producto&action=guardarNuevoProducto`, { method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(productoEditado) })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data.success) cargarProductos();
    else alert(data.message);
  });

}