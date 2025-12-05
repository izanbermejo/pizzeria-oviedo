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

</style>