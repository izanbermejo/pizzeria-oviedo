<header class="titulo-pagina">
  <h1>Carta</h1>
</header>

<section class="selector-categoria">
  <ul class="lista-categorias d-flex flex-row align-content-center">
    <?php foreach ($listaCategorias as $categoria) { ?>
      <a href="?controller=Carta&action=index&idcategoria=<?=$categoria->getIdCategoria() ; ?>">
        <li class="categoria <?php 
        if (isset($_GET['idcategoria'])) {
          if ($_GET['idcategoria'] == $categoria->getIdCategoria()) {
            echo 'activo';
          }
        } else if ($_GET['action'] != "indexOfertas"){
          if ($categoria->getIdCategoria() == 1) {
            echo 'activo';
          }
        }
        ?>">
          <span><?= $categoria->getNombreCategoria() ?></span>
        </li>
      </a>
    <?php } ?>
    <a href="?controller=Carta&action=indexOfertas">
      <li class="categoria <?php 
      if (isset($_GET['action'])) {
        if ($_GET['action'] == "indexOfertas") {
          echo 'activo';
        }
      } ?>">
        <span>Ofertas</span>
      </li>
    </a>
  </ul>
</section>

<section class="productos">

  <!-- Filtros -->
  <div class="filtros-productos d-flex flex-row align-items-end">
    <!-- Ordenar -->
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Ordenar por...
      </button>
      <ul class="dropdown-menu">
        <!-- Filtro orden ofertas -->
        <?php if ($_GET['action'] == 'indexOfertas') { ?>
          <li><a class="dropdown-item" href="?controller=Carta&action=indexOfertas&orden=pasc">Precio ascendente</a></li>
          <li><a class="dropdown-item" href="?controller=Carta&action=indexOfertas&orden=pdesc">Precio descendente</a></li>
          <li><a class="dropdown-item" href="?controller=Carta&action=indexOfertas&orden=nasc">Nombre ascendente</a></li>
          <li><a class="dropdown-item" href="?controller=Carta&action=indexOfertas&orden=ndesc">Nombre descendente</a></li>
        <!-- Filtro orden productos por categoria -->
        <?php } else if ($_GET['action'] == 'index') {?>
          <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=<?= $_GET['idcategoria'] ?>&orden=pasc">Precio ascendente</a></li>
          <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=<?= $_GET['idcategoria'] ?>&orden=pdesc">Precio descendente</a></li>
          <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=<?= $_GET['idcategoria'] ?>&orden=nasc">Nombre ascendente</a></li>
          <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=<?= $_GET['idcategoria'] ?>&orden=ndesc">Nombre descendente</a></li>
        <?php } ?>
      </ul>
    </div>

    <!-- Filtro subcategoria -->
    <?php if ($_GET['action'] == 'index') { ?>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Subcategoria
        </button>
        <ul class="dropdown-menu">
          <?php foreach ($listaSubcategorias as $subcategoria) { ?>
            <li><a class="dropdown-item" href="?controller=Carta&action=index&idcategoria=<?= $_GET['idcategoria'] ?>&idsubcategoria=<?= $subcategoria->getIdSubcategoria() ?>"><?= $subcategoria->getNombreSubcategoria() ?></a></li>
          <?php } ?>
        </ul>
      </div>
    <?php } else if ($_GET['action'] == 'indexOfertas') { ?>
      <!-- Filtro categoria para ofertas -->
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categoria
        </button>
        <ul class="dropdown-menu">
          <?php foreach ($listaCategorias as $categoria) { ?>
            <li><a class="dropdown-item" href="?controller=Carta&action=indexOferta&idcategoria=<?= $categoria->getIdCategoria() ?>"><?= $categoria->getNombreCategoria() ?></a></li>
          <?php } ?>
        </ul>
      </div>
    <?php } ?>
  </div>

  <!-- Lista productos -->
  <div>
    <?php if (isset($_GET['orden'])) {
      switch ($_GET['orden']) {
        case 'pasc':
          uasort($listaProductosByCategoria, function ($a, $b) {
            return $a->getPrecioProducto() <=> $b->getPrecioProducto();
          });
          break;
        case 'pdesc':
          uasort($listaProductosByCategoria, function ($a, $b) {
            return $b->getPrecioProducto() <=> $a->getPrecioProducto();
          });
          break;
        case 'nasc':
          uasort($listaProductosByCategoria, function ($a, $b) {
            return strcmp($a->getNombreProducto(), $b->getNombreProducto());
          });
          break;
        case 'ndesc':
          uasort($listaProductosByCategoria, function ($a, $b) {
            return strcmp($b->getNombreProducto(), $a->getNombreProducto());
          });
          break;
      }
    }  

    foreach ($listaSubcategorias as $subcategoria) { 
      // muestra los productos de la subcategoria seleccionada o todos los productos si no hay ninguna seleccionada
      if ((isset($_GET['idsubcategoria']) && $_GET['idsubcategoria'] == $subcategoria->getIdSubcategoria()) || !isset($_GET['idsubcategoria'])) {
      ?>
      <div class="productos-subcategoria">
        <div class="titulo-subcategoria">
          <h2><?= $subcategoria->getNombreSubcategoria() ?></h2>
        </div>
        <div class="cards-productos d-flex flex-row justify-content-center flex-wrap">
          <?php foreach ($listaProductosByCategoria as $producto) {  
            // comprueba si el producto pertenece a la subcategoria que esta iterando
            if ($producto->getIdSubcategoria() == $subcategoria->getIdSubcategoria()) {
              
              // Crea un string de los ingredientes que tiene ese producto en base al array de ingredientes del producto iterado
              $ingredientesProducto = "";
              foreach ($producto->getIngredientes() as $ingredientes) {
                $ingredientesProducto .= $ingredientes->getNombreIngrediente() . ", ";
              }
              $ingredientesProducto = rtrim($ingredientesProducto, ", ");
              ?>
              <!-- Cards productos -->
                <div class="card-producto card overflow-hidden">
                  <div class="card-producto-header card-header bg-secondary d-flex align-items-center">
                    <h3><?= $producto->getNombreProducto(); ?></h3>
                  </div>
                  <div class="img-producto-container d-flex justify-content-center">
                    <a class="link-producto" href="?controller=Producto&action=show&idproducto=<?=$producto->getIdProducto() ; ?>">
                      <img class="img-producto" src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" alt="imagen <?= $producto->getNombreProducto(); ?>">
                    </a>
                  </div>
                  <div class="card-ingrediente-body card-body d-flex flex-column justify-content-between">
                    <div class="ingredientes-caracteristicas d-flex flex-row flex-nowrap justify-content-between">
                      <p class="card-producto-text card-text overflow-hidden"><?= $ingredientesProducto ? $ingredientesProducto . "." : $producto->getDescripcion() ?></p>
                      <div class="caracteristicas-producto d-flex flex-row align-items-center">
                        <?php foreach ($producto->getCaracteristicasNutricionales() as $caracteristicaNutricional) {?>
                          <img src="public/assets/caracteristicasNutricionales/<?= $caracteristicaNutricional->getIcono() ?>" alt="Icono de la caracteristica nutricional <?= $caracteristicaNutricional->getNombreCaracteristica() ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                      <?php if ($producto->getIdDescuento() == NULL) { ?>
                        <span class="precio"><?= $producto->getPrecioProducto(); ?></span>
                      <?php } else { ?>
                        <div>
                          <span class="precio precio-producto-oferta"><?= number_format(($producto->getPrecioProducto() - ($producto->getPrecioProducto() * $producto->getPorcentajeDescuento() / 100)), 2, ',', '.'); ?></span>
                          <span class="precio precio-producto-original"><?= $producto->getPrecioProducto(); ?></>
                        </div>
                      <?php } ?>
                      <button class="btn-anadir-carrito btn btn-primary">Añadir al carrito</button>
                    </div>
                  </div>
                </div>
              <?php }
            } ?>
          </div>
        </div>
      <?php }
    } ?>
  </div>
</section>

<style>

.selector-categoria {
  height: 55px;
  padding-left: 184px !important;
  padding-right: 184px !important;
}

.lista-categorias {
  list-style: none;
  margin: 0px;
  padding: 0px;
  height: 55px;
}

.lista-categorias a {
  text-decoration: none;
  color: black;
}

.categoria {
  padding: 18px 25px;
  height: -webkit-fill-available;
}

.activo {
  border-bottom: solid 2px var(--bs-primary);
  font-weight: bold;
}

.productos {
  background-color: #F7F9F9;
  border-top: solid 2px var(--bs-secondary);
  padding-left: 184px !important;
  padding-right: 184px !important;
  padding-bottom: 74px;
}

.filtros-productos {
  height: 100px;
  gap: 50px;
}

.productos-subcategoria {
  padding-top: 45px;
}

.titulo-subcategoria {
  color: black;
}

.cards-productos {
  gap: 16px;
  padding-top: 45px;
  padding-bottom: 15px;
}

.card-producto {
  height: 525px !important;
  width: 300px !important;
}

.card-producto-header {
  height: 100px;
  padding-left: 26px !important;
  border: 0px !important;
}

.img-producto-container {
  height: 300px;
  width: 300px;
  padding: 20px 0px;
}

.img-producto {
  max-height: 260px;
  width: fit-content;
  overflow: hidden;
  transition: all 0.2s ease;
  cursor: pointer;
}

.img-producto:hover {
  transform: scale(1.1);
}

.card-ingrediente-body {
  height: 160px;
  box-shadow: 0px -2px 8px 0px rgba(0,0,0,0.1);
}

.caracteristicas-producto {
  gap: 5px;
}

.caracteristicas-producto img {
  width: 30px;
  height: 30px;
}

.card-producto-text {
  max-height: 45px;
  font-size: 14px;
}

.ingredientes-caracteristicas {
  gap: 15px;
}

.btn-anadir-carrito {
  padding: 8px 10px !important;
}

.precio {
  font-size: 26px;
  font-weight: bold;
}

.precio-producto-oferta {
  font-weight: bold;
  color: red;
}

.precio-producto-original {
  font-size: 18px;
  color: #939393;
  text-decoration: line-through;
}

</style>