<header class="titulo-pagina">
  <h1>Carrito</h1>
</header>

<section class="carrito d-flex flex-column justify-content-between gap-5">
  <!-- cuadro donde sale la lista de productos -->
  <div id="lista-productos" class="shadow">
    <!-- aqui se añaden los productos -->
  </div>

  <!-- seccion debajo de la lista de productos -->
  <div class="total-carrito d-flex flex-row justify-content-between align-items-center">

    <!-- Cuadro para aplicar codigo de descuento -->
    <div class="codigo d-flex flex-row justify-content-between align-items-center gap-4 shadow">
      <input class="input-codigo" type="text" placeholder="Código de descuento">
      <button class="aplicar-descuento btn btn-secondary">Aplicar descuento</button>
    </div>

    <!-- cuadro del total y boton de pagar -->
    <div class="pagar d-flex flex-row justify-content-between align-items-center gap-4 shadow">
      <h2>Total: 25,50 €</h2>
      <a href="?controller=Compra&action=index" class="btn btn-primary">Proceder al pago</a>
    </div>
  </div>
</section>

<script>
  const productosCarrito = JSON.parse(localStorage.getItem("carrito")) || [];
  const seccionProductos = document.getElementById('lista-productos');

  Array.from(productosCarrito).forEach((producto) => {
    const divProducto = document.createElement('div');

    let ingredientesProducto = "";

    if (producto && Array.isArray(producto.ingredientes) && producto.ingredientes.length > 0) {
      producto.ingredientes.forEach(i => {
        ingredientesProducto += i.nombre_ingrediente + ", ";
      });
      ingredientesProducto = ingredientesProducto.slice(0, -2);
    }

    divProducto.innerHTML = `
      <div class="producto d-flex flex-row justify-content-between align-items-center">
        <div class="img-nombre-producto d-flex flex-row align-items-center gap-4">
          <img class="img-producto" src="public/assets/productos/${producto.imagen_producto}" alt="imagen pizza margarita">
          <div class="nombre-producto d-flex flex-column">
            <h2>${producto.nombre_producto}</h2>
            <p>${ingredientesProducto}</p>
          </div>
        </div>
        <div class="precio-cantidad-producto d-flex flex-row align-items-center gap-4">
          <span class="precio-producto">${producto.precio_producto} €</span>
          <div class="cantidad-producto d-flex flex-row align-items-center justify-content-between">
            <button class="disminuir-cantidad"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 24px"><path fill="white" d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"/></svg></button>
            <span class="num-cantidad-producto">${producto.cantidad}</span>
            <button class="aumentar-cantidad"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 24px"><path fill="white" d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg></button>
          </div>
          <svg class="eliminar-producto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path fill="#d62424" d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/></svg>
        </div>
      </div>
      <hr class="divisor">
    `;

    const spanCantidad = divProducto.querySelector('.num-cantidad-producto');

    
    const btnDisminuirCantidad = divProducto.querySelector('.disminuir-cantidad');
    btnDisminuirCantidad.addEventListener("click", () => {
      producto.cantidad -= 1;
      if (producto.cantidad === 1) {
        btnDisminuirCantidad.disabled = true;
        btnDisminuirCantidad.classList.add("disabled");
      }
      spanCantidad.textContent = producto.cantidad;
      guardarCarrito(productosCarrito); 
    });
    
    const btnAumentarCantidad = divProducto.querySelector('.aumentar-cantidad');
    btnAumentarCantidad.addEventListener("click", () => {
      producto.cantidad += 1;
      btnDisminuirCantidad.disabled = false;
      btnDisminuirCantidad.classList.remove("disabled");
      spanCantidad.textContent = producto.cantidad;
      guardarCarrito(productosCarrito);
    });

    if (producto.cantidad === 1) {
      btnDisminuirCantidad.disabled = true;
      btnDisminuirCantidad.classList.add("disabled");
    }

    seccionProductos.appendChild(divProducto);
  });

  document.getElementsByClassName("divisor")[productosCarrito.length - 1].remove();

  function guardarCarrito(carrito) {
    localStorage.setItem("carrito", JSON.stringify(carrito));
  }

  if (cantidadProductos > 0) {
    document.getElementById("productosCarrito").classList.remove("visually-hidden");
  } else {
    document.getElementById("productosCarrito").classList.add("visually-hidden");
  }

  document.getElementById("productosCarrito").textContent = cantidadProductos;
</script>

<style>

.carrito {
  background-color: #F7F9F9;
  border-top: solid 2px var(--bs-secondary);
  padding-left: 184px !important;
  padding-right: 184px !important;
  padding-bottom: 74px;
  padding-top: 74px;
  color: black;
}

#lista-productos {
  width: 100%;
  background-color: white;
  padding: 30px;
  border-radius: 16px;
}

.divisor {
  margin-top: 24px;
  margin-bottom: 24px;
  border: solid 1px #cececeff;
  width: 60%;
  justify-self: center;
}

.precio-cantidad-producto {
  width: 30%;
  justify-content: space-around;
}

.img-producto {
  width: 130px;
}

.img-nombre-producto, {
  width: 35%;
}

.precio-producto {
  font-size: 24px;
  font-weight: bold;
}

.cantidad-producto {
  background-color: var(--bs-secondary);
  border-radius: 16px;
  width: 165px;
  height: 46px;
  overflow: hidden;
  border: solid 3px var(--bs-secondary);
}

.cantidad-producto button {
  background-color: var(--bs-primary);
  border: none;
  cursor: pointer;
  height: 100%;
  width: 40px;
}

.cantidad-producto span {
  font-size: 24px;
  font-weight: bold;
}

.eliminar-producto {
  height: 28px;
  cursor: pointer;
}

.total-carrito > div {
  background-color: white;
  padding: 18px;
  border-radius: 16px;
}

.codigo {
  width: 45%;
}

.pagar {
  width: 40%;
}

.input-codigo {
  border: solid 2px var(--bs-secondary);
  width: 55%;
  height: -webkit-fill-available;
  font-size: 18px;
  border-radius: 16px;
  text-align: center;
}

.aplicar-descuento {
  width: 45%;
  font-size: 18px;
  font-weight: bold;
}

.disabled {
  cursor: not-allowed;
  opacity: 0.5;
}

</style>