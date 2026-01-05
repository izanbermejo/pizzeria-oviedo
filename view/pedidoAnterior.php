<header class="titulo-pagina">
  <h1>Historial de Pedidos</h1>
</header>

<section class="historial-pedidos d-flex flex-column justify-content-between">

<h2>Nº Pedido: <?= $idPedido ?></h2>

<?php foreach($listaProductos as $producto) { ?>
  <div class="pedido shadow">
    <div><img class="img-producto" src="public/assets/productos/<?= $producto->getImagenProducto() ?>" alt="imagen pizza margarita"></div>
    <div style="width: 40%;"><p><?= $producto->getNombreProducto(); ?></p></div>
    <div style="text-align: right"><p>Precio: <?= $producto->getPrecioUnidad(); ?></p></div>
    <div style="text-align: right"><p><b>Cantidad: <?= $producto->getCantidad(); ?></b></p></div>
    <a class="btn btn-secondary" href="?controller=Producto&action=show&idproducto=<?=$producto->getIdProducto(); ?>">Ver producto</a>
  </div>
<?php } ?>

<a href="?controller=Pedido&action=repetir&idpedido=<?= $idPedido ?>" class="btn-repetir btn btn-primary">Repetir Pedido</a>

</section>

<style>

.historial-pedidos {
  background-color: #F7F9F9;
  border-top: solid 2px var(--bs-secondary);
  padding-left: 184px !important;
  padding-right: 184px !important;
  padding-bottom: 74px;
  padding-top: 74px;
  color: black;
}

.pedido {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  background-color: white;
  padding: 20px;
  margin: 15px 0px;
  border-radius: 16px;
  width: 100%;
}

.img-producto {
  width: 120px;
  height: 120px;
  object-fit: cover;
}

.btn-repetir {
  align-self: end;
  margin-top: 10px;
}

</style>