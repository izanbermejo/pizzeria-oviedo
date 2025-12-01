<?php 
include_once 'controller/ProductoController.php';

if (isset($_GET['controller'])) {
  $nombre_controller = $_GET['controller']. 'Controller';
  if (class_exists($nombre_controller)) {
    $controller = new $nombre_controller();
    $action = $_GET['action'];
    if (isset(($_GET['action'])) && method_exists($controller,$action)) {
      $controller -> $action();
    } else {
      header('Location:404.php');
    }
  }
} else {

  $controller = new ProductoController();
  $listaProductosEnOferta = $controller -> ofertados();
  if (method_exists($controller,'ofertados')) {
    // var_dump($controller->ofertados());
    // echo "Ejecutando la acción ofertados";
  } else {
    echo header('Location:404.php');
  }
//  http://localhost/pizzeriaOviedo/?controller=Producto&action=index
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/styles/style.css">
</head>
<body>
<?php require_once 'view/nav.php' ?>

<header>
  <div id="carouselExampleCaptions" class="carousel slide carousel-header">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active indicador" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="indicador"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class="indicador"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="public/assets/imagen_banner_1.png" class="d-block" alt="Imagen 1 La Mejor Pizza de la Ciudad">
        <div class="carousel-caption d-block">
          <h1>La Mejor Pizza de la Ciudad</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public/assets/imagen_banner_2.png" class="d-block" alt="Imagen 2 Tu Lugar Favorito para Celebrar">
        <div class="carousel-caption d-block">
          <h1>Tu Lugar Favorito para Celebrar</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public/assets/imagen_banner_3.png" class="d-block" alt="Imagen 3 La Perfección en Cada Porción">
        <div class="carousel-caption d-block">
          <h1>La Perfección en Cada Porción</h1>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</header>

<section class="section-ofertas-productos">

  <!-- sección de ofertas -->
  <section class="ofertas d-flex flex-column justify-content-between">

  <!-- Titulo y boton Ofertas -->
    <div class="titulo-ofertas-productos d-flex flex-row justify-content-between align-items-center">
      <h2>Ofertas</h2>
      <button class="btn btn-secondary">Todas las ofertas</button>
    </div>

    <!-- Carrusel productos en oferta -->
    <div id="carouselExample" class="carousel slide position-relative">
      <div class="carousel-inner">
        <?php 
          $chunks = array_chunk($listaProductosEnOferta, 3); 
          $active = true;

          foreach ($chunks as $grupo) { 
        ?>
          <div class="carousel-item <?= $active ? 'active' : '' ?>">
            <div class="d-flex flex-row justify-content-center gap-4">
          
            <!-- Muestra los productos en oferta uno a uno -->
            <?php foreach ($grupo as $producto) { ?>
              <div class="card-ofertas card position-relative">
                <div class="porcentaje-oferta position-absolute">
                  <span class="texto-porcentaje-oferta"><?= $producto->getPorcentajeDescuento(); ?>%</span>
                </div>
                <div class="card-body d-flex flex-column align-items-center justify-content-evenly">
                  <h3 class="titulo-oferta"><?= $producto->getNombreProducto(); ?></h3>
                  <div class="img-precio-oferta d-flex flex-row">
                    <div class="d-flex flex-column align-items-center">
                      <div class="img-container-oferta">
                        <img class="img-producto-oferta" src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" alt="Imagen del producto en oferta">
                      </div>
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                      <span class="precio-oferta"><?= number_format(($producto->getPrecioProducto() - ($producto->getPrecioProducto() * $producto->getPorcentajeDescuento() / 100)), 2, ',', '.'); ?></span>
                      <p class="precio-original"><?= $producto->getPrecioProducto(); ?></p>
                    </div>
                  </div>
                  <button class="btn-producto-oferta btn btn-secondary">Ver más</button>
                </div>
              </div>
             
            <?php } ?>
            </div>
          </div>
        <?php 
          $active = false;
        } ?>
      </div>

      <!-- Botones para pasar productos en el carrusel -->
      <button class="carousel-control-prev carousel-control-prev-ofertas" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next carousel-control-next-ofertas" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <!-- Seccion de productos -->
  <section class="productos">
    <div class="titulo-ofertas-productos d-flex flex-row justify-content-between align-items-center">
      <h2>Productos</h2>
      <button class="btn btn-secondary">Todas las ofertas</button>
    </div>

  </section>

</section>



  <?php require_once 'view/footer.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<style>

  /* header */
  .carousel-header {
    height: 660px;
  }

  .carousel-header .carousel-item {
    height: 660px;
  }

  .carousel-header img {
    height: 660px;
    width: 100%;
    height: 100%;
    object-fit: cover;    
    object-position: center center; 
  }

  .carousel-header .indicador {
    width: 100px;
  }


  /* ofertas y productos */
  .section-ofertas-productos {
    height: 1550px;
    background-image: url('public/assets/fondo_productos_home.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    margin-top: 20px;
    padding-left: 184px !important;
    padding-right: 184px !important;
  }

  @media (max-width: 768px) {
    .section-ofertas-productos {
      height: 941px;
      padding-left: 32px !important;
      padding-right: 32px !important;
    }
  }


  /* ofertas */
  .ofertas {
    height: 450px;
    padding-top: 100px;
  }

  .productos {
    height: 992px;
    padding-top: 106px;
  }

  .img-container-oferta{
    width: 124px;
    height: 124px;
  }

  .img-container-oferta img {
    width: 100%;
    height: 100%;
  }

  .titulo-oferta {
    font-size: 24px !important;
  }

  .card-ofertas {
    width: 380px;
    height: 260px;
    border-radius: 16px;
    overflow: hidden;
    border: none;
  }

  .img-precio-oferta {
    width: 100%;
  }

  .img-precio-oferta > div{
    width: 50%;
  }

  .precio-oferta {
    color: red;
    font-weight: bold;
    background-color: var(--bs-secondary);
    border-radius: 16px;
    padding: 5px 10px;
    font-size: 36px !important;
  }

  .precio-original {
    color: #939393;
    font-weight: bold;
    text-decoration: line-through;
    font-size: 16px !important;
  }

  .porcentaje-oferta {
    background-color: red;
    top: 20px;
    right: -60px;
    transform: rotate(45deg);
    width: 200px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .texto-porcentaje-oferta {
    font-weight: bold;
    color: white;
    font-size: 24px !important;
  }

  .carousel-control-prev-ofertas,
  .carousel-control-next-ofertas {
    /* width: 40px;         
    height: 40px;       
    top: 50%;            
    transform: translateY(-50%);
    background-color: rgba(0,0,0,0.3); 
    border-radius: 50%;  */
    position: absolute !important;
  }

  .carousel-control-prev-ofertas {
    left: -120px !important;   /* izquierda del carrusel */
  }

  .carousel-control-next-ofertas {
    right: -120px;  /* derecha del carrusel */
  }

  @media (max-width: 768px) {
    .carousel-control-prev-ofertas {
      left: -40px !important;  
    }

    .carousel-control-next-ofertas {
      right: -40px; 
    }

    .card-ofertas {
      flex: 0 0 auto;
      width: 100%; 
    }
  }


  /* productos */



  /* contacto */

</style>

<?php } ?>