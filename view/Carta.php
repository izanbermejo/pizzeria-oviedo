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
  color: black;
  padding-left: 184px !important;
  padding-right: 184px !important;
}

.lista-categorias {
  list-style: none;
  margin: 0px;
  padding: 0px;
  height: 55px;
}

.categoria {
  padding: 18px 25px;
}

.activo {
  border-bottom: solid 1px var(--bs-primary);
  background-color: red;
}

</style>