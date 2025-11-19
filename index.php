<?php 
include_once 'controller/ProductoController.php';

if (isset($_GET['controller'])) {
  $nombre_controller = $_GET['controller']. 'Controller';
  // var_dump($nombre_controller); 
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
}
//  http://localhost/pizzeriaOviedo/?controller=Producto&action=index
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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




  <?php require_once 'view/footer.php' ?>
</body>
</html>

<style>

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

</style>