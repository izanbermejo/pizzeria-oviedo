<?php if (!isset($_SESSION['usuario'])) { ?>
  <script>
    window.location.href = "?controller=InicioSesion&action=login";
  </script>
<?php } else { ?>

  <section class="section-aceptado d-flex align-items-center justify-content-center text-black">
    <div class="text-center">
      <p class="fs-1 fw-medium mt-4 text-black">¡Pago realizado con éxito!</p>
      <p class="fs-4 mt-4 mb-5 text-black">Gracias por tu compra. Tu pedido está siendo procesado.</p>
      <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
      </div>
    </div>
  </section>

  <style>
    .section-aceptado {
      height: 80vh;
    }
  </style>

  <script>
    localStorage.removeItem("carrito");

    setTimeout(() => {
      window.location.href = "index.php";
    }, 1500);
  </script>

<?php } ?> 