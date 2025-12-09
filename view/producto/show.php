<header class="titulo-pagina">
  <h1><?=$producto->getNombreProducto(); ?></h1>
</header>

<section class="producto d-flex flex-row justify-content-between">
  <?php 
    $ingredientesProducto = "";
    if ($producto->getIngredientes() != null) {
      foreach ($producto->getIngredientes() as $ingredientes) {
        $ingredientesProducto .= $ingredientes->getNombreIngrediente() . ", ";
      }
      $ingredientesProducto = rtrim($ingredientesProducto, ", "); 
      $ingredientesProducto = "Ingredientes: " . $ingredientesProducto . ".";
    }
    
  ?>
  <div class="img-producto-container">
    <img src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" alt="Imagen <?= $producto->getNombreProducto() ?>">
  </div>
  <div class="col-derecha d-flex flex-column align-items-end gap-4">
    <div class="info-producto d-flex flex-column bg-secondary rounded-4 justify-content-between shadow h-auto gap-3">
      <p><?=$producto->getDescripcion(); ?></p>
      <p><?=$ingredientesProducto; ?></p>
      <div class="d-flex flex-row justify-content-between align-items-center pt-3">
        <?php if ($producto->getIdDescuento() == NULL) { ?>
          <span class="precio-producto"><?= $producto->getPrecioProducto(); ?></span>
        <?php } else { ?>
          <div>
            <span class="precio-producto-oferta"><?= number_format(($producto->getPrecioProducto() - ($producto->getPrecioProducto() * $producto->getPorcentajeDescuento() / 100)), 2, ',', '.'); ?></span>
            <span class="precio-producto-original"><?= $producto->getPrecioProducto(); ?></>
          </div>
        <?php } ?>
        <div class="alergias-producto">
          <?php foreach ($producto->getCaracteristicasNutricionales() as $caracteristicaNutricional) {?>
            <img src="public/assets/caracteristicasNutricionales/<?= $caracteristicaNutricional->getIcono() ?>" alt="Icono de la caracteristica nutricional <?= $caracteristicaNutricional->getNombreCaracteristica() ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?= $caracteristicaNutricional->getNombreCaracteristica() ?>">
          <?php } ?>
        </div>
      </div>
    </div>
    <button class="btn btn-primary">Añadir al carrito</button>
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
}

.producto > div {
  width: 50%;
}

.info-producto {
  padding: 36px 25px;
  padding-bottom: 15px;
  color: black;
  width: -webkit-fill-available;
}

.alergias-producto img{
  width: 35px;
}

.precio-producto {
  font-size: 50px;
}

.precio-producto-oferta {
  font-size: 50px;
  font-weight: bold;
  color: red;
}

.precio-producto-original {
  font-size: 25px;
  color: #939393;
  text-decoration: line-through;
}
</style>
