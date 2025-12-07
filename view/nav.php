<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="public/styles/style.css">
  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark align-content-center"  padding:12px 20px;">
  <div class="container-fluid mx-152">
  <!-- parte izquierda -->
   <div>
    <!-- Botón hamburguesa -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuMovil">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- logo -->
    <a class="navbar-brand" href="<?= BASE_URL ?>">
      <img src="public/assets/imagen_LOGO.png" alt="imagen_LOGO" id="logo_principal">
    </a>
   </div>
    <!-- Links paginas -->
    <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 px-lg-5">
        <li class="nav-item px-lg-3">
          <a class="nav-link" aria-current="page" href="<?= BASE_URL ?>">Inicio</a>
        </li>
        <li class="nav-item dropdown px-lg-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Carta</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=1">Pizzas</a></li>
            <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=2">Bebidas</a></li>
            <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=3">Complementos</a></li>
            <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=4">Postres</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="?controller=Carta&action=indexOfertas">Ofertas</a></li>
          </ul>
        </li>
        <li class="nav-item px-lg-3">
          <a class="nav-link" aria-current="page" href="#"> Contacto </a>
        </li>
      </ul>
    </div>
    <!-- Iconos derecha -->
    <div class="d-flex gap-4 align-items-center iconos-derecha">
      <!-- Icono carrito -->
      <a href="#" class="text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 23px;">
          <path fill="#ffffff" d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z"/>
        </svg>
        <span class="position-relative top-0 start-0 translate-middle badge rounded-pill bg-danger">
          4
        <span class="visually-hidden">unread messages</span>
        </span>
      </a>
      <!-- Icono Usuario -->
      <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 23px;">
          <path fill="#ffffff" d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/>
        </svg>
      </a>
    </div>
  </div>
</nav>

<!-- OFFCANVAS PARA MÓVIL -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="menuMovil">
  <div class="offcanvas-header">
    <a class="navbar-brand" href="#">
      <img src="public/assets/imagen_LOGO.png" alt="imagen_LOGO" id="logo_principal">
    </a>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <!-- Enlaces del menú -->
    <ul class="navbar-nav">
      <li class="nav-item mb-2">
        <a class="nav-link" href="#">
          Inicio
        </a>
      </li>
      <li class="nav-item mb-2 dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Carta
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item" href="#">Pizzas</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Bebidas</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Complementos</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Postres</a>
          </li>
          <li><hr class="dropdown-divider" /></li>
          <li>
            <a class="dropdown-item" href="#">Ofertas</a>
          </li>
        </ul>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link" href="#">
          Contacto
        </a>
      </li>
    </ul>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<style>

nav {
  background-color: #0032A0 !important;
  height: 68px;
  border-bottom: solid 2px #8A9DDE;
}

.offcanvas a {
  color: #0032A0 !important;
}

#logo_principal {
  width: 59px;
}

.mx-152 {
  margin-left: 152px !important;
  margin-right: 152px !important;
}

@media (max-width: 768px) {
  .mx-152 {
    margin-left: 0 !important;
    margin-right: 0 !important;
  }
}

.px-32 {
  padding-left: 32px !important;
  padding-right: 32px !important;
}

.navbar-nav > li > a {
  color: white;
}

.navbar-nav > li > a:hover {
  color: #D9DFE3;
}

.navbar-nav > li > a:active {
  color: #D9DFE3 !important;
}

.navbar-nav > li > a:focus {
  color: white ;
}

.navbar-nav .show {
  color: #D9DFE3 !important;
}

.iconos-derecha a:hover path{
  fill: #D9DFE3;
}

.navbar-toggler-icon {
  width: 30px;
  color: white;
}

.navbar-toggler:focus {
  box-shadow: none !important;
}

</style>