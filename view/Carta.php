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