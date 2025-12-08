<header class="titulo-pagina">
  <h1><?=$producto->getNombreProducto(); ?></h1>
</header>

<section class="producto d-flex flex-row justify-content-between">
  <div class="img-producto-container">
    <img src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" alt="Imagen <?= $producto->getNombreProducto() ?>">
  </div>
  <div class="info-producto d-flex flex-column bg-secondary rounded-4 justify-content-between shadow h-auto">

    <?=$producto->getIdProducto(); ?>
    <?=$producto->getIdSubcategoria(); ?>
    <?=$producto->getIdDescuento(); ?>
    <?=$producto->getNombreProducto(); ?>
    <?=$producto->getDescripcion(); ?>
    <?=$producto->getPrecioProducto(); ?>
    <?=$producto->getImagenProducto(); ?> 
  </div>


</section>

<style>

.producto {
  background-color: #F7F9F9;
  border-top: solid 2px var(--bs-secondary);
  padding-left: 184px !important;
  padding-right: 184px !important;
  padding-bottom: 74px;
  padding-top: 74px;
  gap: 40px;
}

.producto > div {
  width: 50%;
}

.info-producto {
  padding: 36px 25px;
  color: black;
}
</style>

