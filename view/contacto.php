<header class="titulo-pagina">
  <h1>Contacto</h1>
</header>

<section class="contacto d-flex flex-row justify-content-between">
    <div class="d-flex flex-column justify-content-between h-100">
      <div class="cuadro-metodo-cont d-flex flex-column bg-secondary rounded-4 justify-content-between shadow h-auto">
        <h3>Contáctanos</h3>
        <form action="" method="post" class="form-contacto d-flex flex-column">
          <label for="nombre">Nombre y apellidos</label>
          <input type="text" name="nombre" id="nombre">

          <label for="email">Correo electrónico</label>
          <input type="email" name="email" id="email">

          <label for="mensaje">Mensaje</label>
          <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>

          <button type="submit" class="btn-enviar btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
    
    <div class="d-flex flex-column justify-content-between h-100">
      <div class="cuadro-metodo-cont d-flex flex-column bg-secondary rounded-4 justify-content-between shadow h-auto">
        <h3>Métodos de Contacto</h3>
        <div class="datos-contacto d-flex flex-column ">
          <div class="linea-contacto d-flex flex-row align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M112 128C85.5 128 64 149.5 64 176C64 191.1 71.1 205.3 83.2 214.4L291.2 370.4C308.3 383.2 331.7 383.2 348.8 370.4L556.8 214.4C568.9 205.3 576 191.1 576 176C576 149.5 554.5 128 528 128L112 128zM64 260L64 448C64 483.3 92.7 512 128 512L512 512C547.3 512 576 483.3 576 448L576 260L377.6 408.8C343.5 434.4 296.5 434.4 262.4 408.8L64 260z"/></svg>
            <p>pizzeria.oviedista@gmail.com</p>
          </div>
          <div class="d-flex flex-row linea-contacto align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M224.2 89C216.3 70.1 195.7 60.1 176.1 65.4L170.6 66.9C106 84.5 50.8 147.1 66.9 223.3C104 398.3 241.7 536 416.7 573.1C493 589.3 555.5 534 573.1 469.4L574.6 463.9C580 444.2 569.9 423.6 551.1 415.8L453.8 375.3C437.3 368.4 418.2 373.2 406.8 387.1L368.2 434.3C297.9 399.4 241.3 341 208.8 269.3L253 233.3C266.9 222 271.6 202.9 264.8 186.3L224.2 89z"/></svg>
            <p>984 265 709</p>
          </div>
          <div class="d-flex flex-row linea-contacto align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
            <p>C. Isidro Lángara, 33013 Oviedo, Asturias</p>
          </div>

        </div>
      </div>
      <div class="cuadro-ubicacion d-flex flex-column justify-content-between bg-secondary rounded-4 shadow">
        <h3>Ubicación</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3599.5321803749425!2d-5.872816323358812!3d43.360769871294615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses!2ses!4v1763723724685!5m2!1ses!2ses" width="475" height="423" style="border:0; border-radius: 16px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
</section>

<style>

.contacto {
  background-color: #F7F9F9;
  border-top: solid 2px var(--bs-secondary);
  padding-left: 184px !important;
  padding-right: 184px !important;
  padding-bottom: 74px;
  padding-top: 74px;
}

.contacto > div {
  gap: 40px;
}

.titulo-contactanos{
  color: var(--bs-primary);
}

.cuadros-contacto{
  gap: 66px;
}

.form-contacto label {
  margin-top: 15px;
  margin-bottom: 5px;
  padding-left: 10px;
}

.form-contacto input, .form-contacto textarea {
  border: 1px solid #969696;
  border-radius: 16px;
  padding: 5px;
  padding-left: 15px;
}

.btn-enviar {
  margin-top: 15px;
}


.cuadro-ubicacion {
  width: 525px;
  height: 540px;
  padding: 36px 25px;
  color: black;
}

.datos-contacto {
  padding-left: 15px;
  gap: 30px;
  padding-top: 30px;
}

.linea-contacto {
  gap: 15px;
}

.linea-contacto path{
  fill: var(--bs-primary);
}

.linea-contacto svg {
  width: 35px;
}

.cuadro-metodo-cont {
  width: 525px;
  height: 384px;
  padding: 36px 25px;
  color: black;
}

.cuadro-eslogan{
  width: 525px;
  height: 118px;
  color: var(--bs-primary);
  padding: 17px 42px;
}


</style>