<?php echo "hola" ?>

<section>
  <div id="usuarios">

  </div>
</section>

<script>
  fetch('http://localhost/pizzeriaOviedo/?controller=Usuario&action=getUsuarios')
  .then(response => response.json())
  .then(data => {
    console.log(data);
  });
</script>