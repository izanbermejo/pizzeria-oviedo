<div class="anadiendo-productos-carrito d-flex align-items-center justify-content-center text-black">
  <h2>Añadiendo productos del pedido <?php echo $_GET['idpedido']; ?> al carrito...</h2>
</div>

<style>
  .anadiendo-productos-carrito {
    height: 80vh;
  }
</style>

<script>

  if (localStorage.getItem("carrito")){
    localStorage.removeItem("carrito");
  }

  const añadirProductoAlCarrito = (idProducto, cantidad) => {
    fetch(`api.php/?controller=Producto&action=getProductoById&idProducto=${idProducto}`, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json'
      }
    })
    .then(response => response.json())
    .then(producto => {
      producto.data.cantidad = cantidad;
      guardarEnCarrito(producto.data);
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error al añadir el producto al carrito');
    });
  };

  const guardarEnCarrito = (producto) => {
    // obtiene el carrito del localStorage o crea uno nuevo si no existe
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
  
    carrito.push(producto);

    // guarda el carrito actualizado en el localStorage
    localStorage.setItem("carrito", JSON.stringify(carrito));

    window.location.href = "?controller=Carrito&action=index";
  };

  <?php foreach ($listaProductos as $producto) { ?>
    añadirProductoAlCarrito(<?php echo $producto->getIdProducto(); ?>, <?php echo $producto->getCantidad(); ?>);
  <?php } ?>
  
</script>
