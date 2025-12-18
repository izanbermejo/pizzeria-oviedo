<header class="titulo-pagina">
  <h1>Proceso de compra</h1>
</header>

<section class="compra d-flex flex-row justify-content-between gap-5">

  <!-- Parte izquierda de la pagina de pago -->
  <div class="col-izquierda d-flex flex-column gap-5 w-50">
    <!-- formulario datos envio -->
    <div class="datos-envio shadow">
      <h2>Datos de envío</h2>
      <form class="form-envio">
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
      </form>
    </div>

    <!-- formulario datos pago -->
    <div class="datos-pago shadow">
      <h2>Datos de pago</h2>
      <form class="form-pago">
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
      </form>
      <div class="logos-bancos d-flex flex-row justify-content-center">
        <img src="public/assets/Mastercard_Logo.png" alt="">
        <img src="public/assets/Visa_Logo.png" alt="">
      </div>
    </div>
  </div>

  <!-- Parte derecha de la pagina de pago -->
  <div class="col-derecha d-flex flex-column gap-5 w-50">
    <!-- Resumen de compra -->
    <div class="resumen-compra shadow">
      <h2>Resumen del pedido</h2>
      <table>
        <tr>
          <th class="col-2">Cant.</th>
          <th class="col-6">Producto</th>
          <th class="col-2">P. unidad</th>
          <th class="col-2">PvP</th>
        </tr>
      </table>


      <div class="d-flex flex-column gap-3 mt-3">
        
        <div class="d-flex flex-row justify-content-between">
          <span>Subtotal:</span>
          <span>€120.00</span>
        </div>
        <div class="d-flex flex-row justify-content-between">
          <span>Gastos de envío:</span>
          <span>€5.00</span>
        </div>
        <div class="d-flex flex-row justify-content-between fw-bold">
          <span>Total:</span>
          <span>€125.00</span>
        </div>
      </div>
      <button class="btn btn-primary w-100 mt-4" type="submit">Realizar compra</button>
    </div>
  </div>
  
</section>

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

.datos-envio, .datos-pago, .resumen-compra {
  background-color: white;
  padding: 35px;
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

</style>