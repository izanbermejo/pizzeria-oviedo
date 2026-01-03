<header class="titulo-pagina">
  <h1>Historial de Pedidos</h1>
</header>

<section class="historial-pedidos d-flex flex-column justify-content-between">

  <?php foreach($pedidos as $pedido) { ?>

  <div class="pedido shadow">
    <div><h3>Nº Pedido: <?= $pedido->getIdPedido() ?></h3></div>
    <div style="width: 40%;"><p>Dirección: <?= $pedido->getDireccionPedido(); ?></p></div>
    <div style="text-align: right"><p>Fecha: <?= $pedido->getFechaPedido(); ?></p></div>
    <div style="text-align: right"><p><b>Precio: <?= $pedido->getImporteTotal(); ?></b></p></div>
    <a class="btn btn-secondary" href="detallePedido.php?idPedido=<?= $pedido->getIdPedido() ?>">Ver información</a>
  </div>
  <?php } ?>
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
  margin: 15px 20px;
  border-radius: 16px;
  width: 100%;
}

</style>