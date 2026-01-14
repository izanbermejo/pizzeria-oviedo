<header class="titulo-pagina">
  <h1>Proceso de compra</h1>
</header>

<section class="compra d-flex flex-row justify-content-between gap-5">
<form action="?controller=Pedido&action=addPedido" method="POST" class="d-flex flex-row w-100 gap-5">
  <!-- Parte izquierda de la pagina de pago -->
  <div class="col-izquierda d-flex flex-column gap-5 w-50">
    <!-- formulario datos envio -->
    <div class="datos-envio shadow">
      <h2>Datos de envío</h2>
      <div class="form-group">
        <label for="nombre-apellidos">Nombre y Apellidos:</label>
        <input type="text" class="form-control" id="nombre-apellidos" name="nombre-apellidos" required>
      </div>
      <div class="form-group">
        <label for="telf">Número de teléfono:</label>
        <input type="tel" class="form-control" id="telf" name="telf" required>
      </div>
      <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Nombre y Número de la calle" required>
      </div>
      <div class="d-flex flex-row gap-3">
        <div class="form-group w-50">
          <label for="ciudad">Ciudad:</label>
          <input type="text" class="form-control" id="ciudad" name="ciudad" required>
        </div>
        <div class="form-group w-50">
          <label for="codigo-postal">Código Postal:</label>
          <input type="text" class="form-control" id="codigo-postal" name="codigo-postal" required>
        </div>
      </div>
    </div>

    <!-- formulario datos pago -->
    <div class="datos-pago shadow">
      <h2>Datos de pago</h2>
      <div class="form-group">
        <label for="numero-tarjeta">Número de tarjeta:</label>
        <input type="text" class="form-control" id="numero-tarjeta" name="numero-tarjeta" placeholder="XXXX - XXXX - XXXX - XXXX" required>
      </div>
      <div class="d-flex flex-row gap-3">
        <div class="form-group w-50">
          <label for="fecha-caducidad">Fecha de caducidad:</label>
          <input type="text" class="form-control" id="fecha-caducidad" name="fecha-caducidad" placeholder="MM/YY" required>
        </div>
        <div class="form-group w-50">
          <label for="codigo-seguridad">Código de seguridad:</label>
          <input type="text" class="form-control" id="codigo-seguridad" name="codigo-seguridad" placeholder="CVV" required>
        </div>
      </div>
      <div class="form-group">
        <label for="nombre-tarjeta">Nombre de la tarjeta:</label>
        <input type="text" class="form-control" id="nombre-tarjeta" name="nombre-tarjeta" required>
      </div>
      <div class="logos-bancos d-flex flex-row justify-content-center">
        <img src="public/assets/Mastercard_Logo.webp" alt="Logo Mastercard">
        <img src="public/assets/Visa_Logo.webp" alt="Logo Visa">
      </div>
    </div>
  </div>

  <!-- Parte derecha de la pagina de pago -->
  <div class="col-derecha d-flex flex-column gap-5 w-50">
    <!-- Resumen de compra -->
    <div class="resumen-compra shadow">
      <h2>Resumen del pedido</h2>
      <table class="tabla-resumen w-100 mt-3">
        <tr>
          <th class="col-1">Cant.</th>
          <th class="col-7">Producto</th>
          <th class="col-2 text-end">P. unidad</th>
          <th class="col-2 text-end">PvP</th>
        </tr>
        <!-- Aquí se añaden los productos que hay en el carrico en tr -->
      </table>

      <div class="final-resumen d-flex flex-row gap-3 mt-3 w-100 gap-5">
        <div class="d-flex flex-column gap-3 mt-3 w-50 justify-content-end align-items-center">
          <div class="d-flex w-75 justify-content-between">
            <span>Base:</span>
            <p class="precio-base"></p>
          </div>
          <div class="d-flex w-75 justify-content-between">
            <span>IVA (10%):</span>
            <p class="iva"></p>
          </div>
        </div>
        <div class="d-flex flex-column gap-3 mt-3 w-50 justify-content-end align-items-center">
          <div class="d-flex w-75 justify-content-between">
            <span>Subtotal:</span>
            <p class="subtotal"></p>
          </div>
          <div class="d-flex w-75 justify-content-between">
            <span>Descuento:</span>
            <p class="descuento"></p>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-end mt-5">
        <span class="precio-final"></span>
        <input type="hidden" name="precioTotal" id="precioTotal">
        <input type="hidden" name="codigoDescuento" id="codigoDescuento">
        <input type="hidden" name="carrito" id="carrito">
        <button class="btn btn-primary btn-lg px-4" type="submit">Finalizar compra</button>
      </div>
    </div>
  </div>
  </form>
</section>

<script>
  const productosCarrito = JSON.parse(localStorage.getItem("carrito")) || [];
  const tablaResumen = document.querySelector('.tabla-resumen');

  const precioTotalElemento = document.querySelector('.precio-final');
  const precioBaseElemento = document.querySelector('.precio-base');
  const ivaElemento = document.querySelector('.iva');
  const subtotalElemento = document.querySelector('.subtotal');
  const descuentoElemento = document.querySelector('.descuento');

  let precioTotal = 0;
  let descuento = 0;
  let codigoDescuento = null;
  let porcentaje_descuento = 0;

  Array.from(productosCarrito).forEach((producto) => {
    const trProducto = document.createElement('tr');

    const precioProducto = producto.id_descuento ? (producto.precio_producto - producto.precio_producto * producto.porcentaje_descuento / 100).toFixed(2) : producto.precio_producto;

    trProducto.innerHTML = `
      <td>${producto.cantidad}</td>
      <td>${producto.nombre_producto}</td>
      <td class="text-end">${precioProducto} €</td>
      <td class="text-end">${(Number(precioProducto) * producto.cantidad).toFixed(2)}€</td>
    `;

    precioTotal += Number(precioProducto) * producto.cantidad;
    
    tablaResumen.appendChild(trProducto);
  });
  
  codigoDescuento = JSON.parse(localStorage.getItem("descuentoPedido")) ? JSON.parse(localStorage.getItem("descuentoPedido")).codigo : null;
  porcentaje_descuento = JSON.parse(localStorage.getItem("descuentoPedido")) ? JSON.parse(localStorage.getItem("descuentoPedido")).porcentaje_descuento : 0;

  descuento = precioTotal * porcentaje_descuento / 100;
  
  precioTotalElemento.textContent = `Total: ${(precioTotal - descuento).toFixed(2)} €`;
  document.getElementById('precioTotal').value = (precioTotal - descuento).toFixed(2);
  document.getElementById('codigoDescuento').value = codigoDescuento || "";
  document.getElementById('carrito').value = localStorage.getItem("carrito") || "";
  precioBaseElemento.textContent = `${((precioTotal - descuento) * 0.9).toFixed(2)} €`;
  ivaElemento.textContent = `${((precioTotal - descuento) * 0.1).toFixed(2)} €`;
  subtotalElemento.textContent = `${precioTotal.toFixed(2)} €`;
  descuentoElemento.textContent = `${descuento.toFixed(2)} €`;  

</script>

<style>

.compra {
  background-color: #F7F9F9;
  border-top: solid 2px var(--bs-secondary);
  padding-left: 184px !important;
  padding-right: 184px !important;
  padding-bottom: 74px;
  padding-top: 74px;
  color: black;
}

.datos-envio, .datos-pago, .resumen-compra, .pagar {
  background-color: white;
  padding: 45px;
  border-radius: 16px;
}

label {
  padding-left: 15px;
  padding-top: 12px;
  padding-bottom: 12px;
}

.form-control {
  border-radius: 16px !important;
  border: solid 2px var(--bs-secondary) !important;
  font-size: 16px !important;
  height: 50px !important;
}

.form-control::placeholder {
  font-weight: bold !important;
  color: #9B9B9B !important;
}

.logos-bancos {
  margin-top: 35px;
  gap: 40px;
}

.tabla-resumen tr td {
  padding-top: 10px;
}

.final-resumen span {
  font-weight: bold;
}

.precio-final {
  font-size: 36px;
  font-weight: bold;
  margin-right: 25px;
}

</style>