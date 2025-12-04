<header class="titulo-pagina">
  <h1>Carta</h1>
</header>

<section class="selector-categoria">
  <ul class="lista-categorias d-flex flex-row align-content-center">
    <?php foreach ($listaCategorias as $categoria) { ?>
      <a href="?controller=Carta&action=index&idcategoria=<?=$categoria->getIdCategoria() ; ?>">
        <li class="categoria <?= $_GET['idcategoria'] == $categoria->getIdCategoria() ? 'activo' : ''?>">
          <span><?= $categoria->getNombreCategoria() ?></span>
        </li>
      </a>
    <?php } ?>
  </ul>
</section>

<section class="productos">
  <div class="filtros-productos d-flex flex-row">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown button
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Precio ascendente</a></li>
        <li><a class="dropdown-item" href="#">Precio descendente</a></li>
        <li><a class="dropdown-item" href="#">Nombre ascendente</a></li>
        <li><a class="dropdown-item" href="#">Nombre descendente</a></li>
      </ul>
    </div>
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
}

.productos {
  background-color: #F7F9F9;
  border-top: solid 2px var(--bs-secondary);
}

</style>