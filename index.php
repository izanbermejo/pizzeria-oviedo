<?php 
include_once 'controller/ProductoController.php';
include_once 'controller/IngredienteController.php';
include_once 'controller/CaracteristicaNutricionalController.php';

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
  $listaProductosActivos = $controller -> indexActivos();
  if (method_exists($controller,'index')) {
    //  var_dump($controller -> index());
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
  <title>Pizzeria Oviedo</title>
  <link rel="icon" type="image/x-icon" href="public/assets/imagen_LOGO.png">
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
      <a href="#" class="btn btn-secondary">Todas las ofertas</a>
    </div>

    <!-- Carrusel productos en oferta ordenador -->
    <div id="carouselOfertas3items" class="carousel slide position-relative">
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
                        <img class="img-producto-oferta" src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" alt="Imagen de <?= $producto->getNombreProducto(); ?>">
                      </div>
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                      <span class="precio-oferta"><?= number_format(($producto->getPrecioProducto() - ($producto->getPrecioProducto() * $producto->getPorcentajeDescuento() / 100)), 2, ',', '.'); ?></span>
                      <p class="precio-original"><?= $producto->getPrecioProducto(); ?></p>
                    </div>
                  </div>
                  <a href="?controller=Producto&action=show&idproducto=<?=$producto->getIdProducto() ; ?>" class="btn-producto-oferta btn btn-secondary">Ver más</a>
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
      <button class="carousel-control-prev carousel-control-prev-ofertas" type="button" data-bs-target="#carouselOfertas3items" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next carousel-control-next-ofertas" type="button" data-bs-target="#carouselOfertas3items" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <!-- Carrusel productos en oferta movil -->
    <div id="carouselOfertas1item" class="carousel slide position-relative">
      <div class="carousel-inner">
        <?php 
          $active = true;
          foreach ($listaProductosEnOferta as $producto) { 
        ?>
          <div class="carousel-item <?= $active ? 'active' : '' ?>">
            <div class="card-ofertas card position-relative">
              <div class="porcentaje-oferta position-absolute">
                <span class="texto-porcentaje-oferta"><?= $producto->getPorcentajeDescuento(); ?>%</span>
              </div>
              <div class="card-body d-flex flex-column align-items-center justify-content-evenly">
                <h3 class="titulo-oferta"><?= $producto->getNombreProducto(); ?></h3>
                <div class="img-precio-oferta d-flex flex-row">
                  <div class="d-flex flex-column align-items-center">
                    <div class="img-container-oferta">
                      <img class="img-producto-oferta" src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" alt="Imagen de <?= $producto->getNombreProducto(); ?>">
                    </div>
                  </div>
                  <div class="d-flex flex-column align-items-center justify-content-center">
                    <span class="precio-oferta"><?= number_format(($producto->getPrecioProducto() - ($producto->getPrecioProducto() * $producto->getPorcentajeDescuento() / 100)), 2, ',', '.'); ?></span>
                    <p class="precio-original"><?= $producto->getPrecioProducto(); ?></p>
                  </div>
                </div>
                <a href="?controller=Producto&action=show&idproducto=<?=$producto->getIdProducto() ; ?>" class="btn-producto-oferta btn btn-secondary">Ver más</a>
              </div>
            </div>
          </div>
        <?php 
          $active = false;
        } ?>
      </div>

      <!-- Botones para pasar productos en el carrusel -->
      <button class="carousel-control-prev carousel-control-prev-ofertas" type="button" data-bs-target="#carouselOfertas1item" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next carousel-control-next-ofertas" type="button" data-bs-target="#carouselOfertas1item" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <!-- Seccion de productos -->
  <section class="productos d-flex flex-column align-items-center justify-content-between">
    <div class="titulo-ofertas-productos d-flex flex-row justify-content-between align-items-center">
      <h2>Productos</h2>
      <a href="#" class="btn btn-secondary">Ir a Carta</a>
    </div>

    <!-- productos ordenador  -->
    <div class="cards-productos-ordenador flex-nowrap flex-md-wrap justify-content-center">
      <?php 
      shuffle($listaProductosActivos);
      $productosMostrados = array_slice($listaProductosActivos, 0, 8);
      foreach ($productosMostrados as $producto) {

          $ingredientesProducto = "";
          foreach ($producto->getIngredientes() as $ingredientes) {
            $ingredientesProducto .= $ingredientes->getNombreIngrediente() . ", ";
          }
          $ingredientesProducto = rtrim($ingredientesProducto, ", ");
        ?>
        <a href="?controller=Producto&action=show&idproducto=<?=$producto->getIdProducto() ; ?>">
          <div class="card-producto card shadow">
            <div class="img-container-producto">
              <img src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" class="img-producto card-img-top" alt="imagen <?= $producto->getNombreProducto(); ?>">
            </div>
            <div class="card-body-producto card-body">
              <div>
                <h3 class="titulo-producto card-title"><?= $producto->getNombreProducto(); ?></h3>
                <p class="ingredientes-producto card-text"> <?= $ingredientesProducto ? $ingredientesProducto . "." : $producto->getDescripcion() ?></p>
              </div>
              <div class="d-flex flex-row justify-content-between">
                <?php if ($producto->getIdDescuento() == NULL) { ?>
                  <span class="precio-producto"><?= $producto->getPrecioProducto(); ?></span>
                <?php } else { ?>
                  <div>
                    <span class="precio-producto-oferta"><?= number_format(($producto->getPrecioProducto() - ($producto->getPrecioProducto() * $producto->getPorcentajeDescuento() / 100)), 2, ',', '.'); ?></span>
                    <span class="precio-producto-original"><?= $producto->getPrecioProducto(); ?></>
                  </div>
                <?php } ?>
                <div class="alergias-producto">
                  <img src="assets/iconos_Mesa-de-trabajo-1-copia-6.png" alt="">
                  <img src="assets/iconos_Mesa-de-trabajo-1-copia-3.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>


    <!-- productos movil carousel -->
    <div id="carouselProductosMovil" class="carousel slide position-relative">
      <div class="carousel-inner">
        <?php 
        
        shuffle($listaProductosActivos);
        $productosMostrados = array_slice($listaProductosActivos, 0, 8);
          $active = true;
          foreach ($productosMostrados as $producto) {
        
          $ingredientesProducto = "";
          foreach ($producto->getIngredientes() as $ingredientes) {
            $ingredientesProducto .= $ingredientes->getNombreIngrediente() . ", ";
          }
          $ingredientesProducto = rtrim($ingredientesProducto, ", ");
        
        ?>
          <div class="carousel-item <?= $active ? 'active' : '' ?>">
            <a href="?controller=Producto&action=show&idproducto=<?=$producto->getIdProducto() ; ?>">
              <div class="card-producto card shadow" >
                <div class="img-container-producto">
                  <img src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" class="img-producto card-img-top" alt="imagen <?= $producto->getNombreProducto(); ?>">
                </div>
                <div class="card-body-producto card-body">
                  <div>
                    <h3 class="titulo-producto card-title"><?= $producto->getNombreProducto(); ?></h3>
                    <p class="ingredientes-producto card-text"> <?= $ingredientesProducto ? $ingredientesProducto . "." : $producto->getDescripcion() ?></p>
                  </div>
                  <div class="d-flex flex-row justify-content-between">
                    <?php if ($producto->getIdDescuento() == NULL) { ?>
                      <span class="precio-producto"><?= $producto->getPrecioProducto(); ?></span>
                    <?php } else { ?>
                      <div>
                        <span class="precio-producto-oferta"><?= number_format(($producto->getPrecioProducto() - ($producto->getPrecioProducto() * $producto->getPorcentajeDescuento() / 100)), 2, ',', '.'); ?></span>
                        <span class="precio-producto-original"><?= $producto->getPrecioProducto(); ?></>
                      </div>
                    <?php } ?>
                    <div class="alergias-producto">
                      <img src="assets/iconos_Mesa-de-trabajo-1-copia-6.png" alt="">
                      <img src="assets/iconos_Mesa-de-trabajo-1-copia-3.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php 
          $active = false;
        } ?>
      </div>

      <!-- Botones para pasar productos en el carrusel -->
      <button class="carousel-control-prev carousel-control-prev-productos" type="button" data-bs-target="#carouselProductosMovil" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next carousel-control-next-productos" type="button" data-bs-target="#carouselProductosMovil" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </section>

</section>

<section class="contactanos d-flex flex-column justify-content-between">
  <div class="titulo-contactanos">

    <h2>Contáctanos</h2>
  </div>
  <div class="cuadros-contacto d-flex flex-column flex-lg-row justify-content-center align-items-center">
    <div class="cuadro-ubicacion d-flex flex-column justify-content-between bg-secondary rounded-4 shadow">
      <h3>Ubicación</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3599.5321803749425!2d-5.872816323358812!3d43.360769871294615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses!2ses!4v1763723724685!5m2!1ses!2ses" width="475" height="423" style="border:0; border-radius: 16px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="contacto-columna2 d-flex flex-column justify-content-between h-100">
      <div class="cuadro-metodo-cont d-flex flex-column bg-secondary rounded-4 justify-content-between shadow fle">
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
        <a href="#" class="btn btn-primary align-self-center">Ir a Contacto</a>
      </div>
      <div class="cuadro-eslogan d-flex align-items-center justify-content-center bg-secondary rounded-4 text-center shadow">
        <h3>Aquí jugamos en casa. Con sabor local, alma azul y la magia de Cazorla en cada detalle.</h3>
      </div>
    </div>
  </div>
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

  .titulo-ofertas-productos {
    width: -webkit-fill-available;
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

  #carouselOfertas3items {
    display: block;
  }

  #carouselOfertas1item {
    display: none;
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

    .ofertas {
      height: 375px;
      padding-top: 42px;
    }

    #carouselOfertas3items {
      display: none;
    }

    #carouselOfertas1item {
      display: block;
    }

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
  .productos {
    height: 992px;
    padding-top: 106px;
  }

  .cards-productos-ordenador {
    display: flex;
  }

  #carouselProductosMovil {
    display: none;
  }

  #carouselProductosMovil a {
    text-decoration: none;
  }

  .cards-productos-ordenador {
    width: 1400px;
    gap: 46px;
  }

  .cards-productos-ordenador a {
    text-decoration: none ;
  }

  .card-producto {
    width: 300px;
    height: 380px;
    border-radius: 16px;
    overflow: hidden;
    border: none;
    transition: all 0.2s ease;
    cursor: pointer;
  }

  .card-producto:hover {
    transform: scale(1.1);
  }

  .img-container-producto {
    height: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background-image: url(public/assets/fondo_tarjeta_producto_home.png);
    background-size: cover;
    background-position: center;
  }

  .img-producto {
    width: auto;
    height: 80%;
  }

  .card-body-producto {
    height: 50%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .alergias-producto img{
    width: 30px;
  }

  .precio-producto-oferta {
    font-weight: bold;
    color: red;
  }

  .precio-producto-original {
    color: #939393;
    text-decoration: line-through;
  }

  @media (max-width: 768px) {
    .productos {
      height: 432px;
      padding-top: 60px;
    }

    .cards-productos-ordenador {
      display: none;
    }

    #carouselProductosMovil {
      display: block;
      padding-top: 40px;
      width: 100%;
    }

    .card-producto {
      width: 100%;
    }

    .card-producto:hover {
      transform: none;
    }

    .alergias-producto img{
      width: 25px;
    }

    .titulo-producto {
      font-size: 24px !important;
    }

    .ingredientes-producto, .precio-producto, .precio-producto-oferta, .precio-producto-original {
      font-size: 16px !important;
    }

    .carousel-control-prev-productos {
      left: -40px !important;  
    }

    .carousel-control-next-productos {
      right: -40px; 
    }
  }
  
  
  /* contacto */
  .contactanos {
    padding-left: 184px !important;
    padding-right: 184px !important;  
    height: 817px;
    padding-top: 78px;
    padding-bottom: 108px;
  }
  
  .titulo-contactanos{
    color: var(--bs-primary);
  }
  
  .cuadros-contacto{
    gap: 66px;
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
  
  @media (max-width: 768px) {
    .contactanos {
      height: 1043px;
      padding-top: 35px;
      padding-bottom: 25px;
      padding-left: 32px !important;
      padding-right: 32px !important;
    }
  
    .cuadros-contacto {
      margin-top: 35px;
      gap: 26px !important;
    }
  
    .cuadro-ubicacion {
      width: 410px !important;
      height: 400px !important;
      padding: 20px 20px !important;
      gap: 16px !important;
    }
  
    .cuadro-ubicacion iframe {
      width: auto !important;
      height: 322px !important;
    }
  
    .contacto-columna2 {
      gap: 26px !important;
    }
  
    .cuadro-metodo-cont {
      width: 410px !important;
      height: 360px !important;
      padding: 30px 20px !important;
      gap: 16px !important;
    }
  
    .cuadro-metodo-cont p {
      font-size: 14px !important;
    }
  
    .cuadro-eslogan{
      width: 410px !important;
      height: 105px !important;
      padding: 15px 20px !important;
      font-size: 14px !important;
    }
  
    .cuadro-eslogan h3 {
      width: 287px;
    }
  }

</style>

<?php } ?>