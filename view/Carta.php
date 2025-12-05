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
        } else {
          if ($categoria->getIdCategoria() == 1) {
            echo 'activo';
          }
        }
        ?>">
          <span><?= $categoria->getNombreCategoria() ?></span>
        </li>
      </a>
    <?php } ?>
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
        <li><a class="dropdown-item" href="#">Precio ascendente</a></li>
        <li><a class="dropdown-item" href="#">Precio descendente</a></li>
        <li><a class="dropdown-item" href="#">Nombre ascendente</a></li>
        <li><a class="dropdown-item" href="#">Nombre descendente</a></li>
      </ul>
    </div>

    <!-- Filtro subcategoria -->
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Subcategoria
      </button>
      <ul class="dropdown-menu">
        <?php foreach ($listaSubcategorias as $subcategoria) { ?>
          <li><a class="dropdown-item" href="#"><?= $subcategoria->getNombreSubcategoria() ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>

  <!-- Lista productos -->
  <div>
    <?php foreach ($listaSubcategorias as $subcategoria) { ?>
      <div class="productos-subcategoria">
        <div class="titulo-subcategoria">
          <h2><?= $subcategoria->getNombreSubcategoria() ?></h2>
        </div>
          <!-- Cards productos -->
        <div class="cards-productos d-flex flex-row justify-content-center">
          <div class="card-producto card overflow-hidden">
            <div class="card-producto-header card-header bg-secondary d-flex align-items-center">
              <h3>Pizza Margarita</h3>
            </div>
              <img class="img-producto" src="public/assets/productos/imagen_producto_pizzas_margarita.png" alt="">
              <div class="card-ingrediente-body card-body d-flex flex-column justify-content-between">
                <div class="ingredientes-caracteristicas d-flex flex-row flex-nowrap">
                  <p class="card-producto-text card-text overflow-hidden">Salsa de tomate, mozzarela, albahaca.</p>
                  <div class="caracteristicas-producto d-flex flex-row align-items-center">
                    <img src="public/assets/caracteristicasNutricionales/icono_caracteristica_nutricional_gluten.png" alt="">
                    <img src="public/assets/caracteristicasNutricionales/icono_caracteristica_nutricional_lacteos.png" alt="">
                  </div>
                </div>
                <div class="d-flex flex-row justify-content-between">
                  <button class="btn-anadir-carrito btn btn-primary">Añadir al carrito</button>
                  <span class="precio">12,99</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      
    <?php } ?>
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
  max-height: 50px;
}

.ingredientes-caracteristicas {
  gap: 15px;
}

.btn-anadir-carrito {
  padding: 10px 15px !important;
}

.precio {
  font-size: 26px;
  font-weight: bold;
}

</style>