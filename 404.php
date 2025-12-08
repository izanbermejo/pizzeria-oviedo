<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Página no encontrada</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/styles/style.css">
</head>
<body>
  <?php require_once "config/config.php"; ?>
  <div class="d-flex align-items-center justify-content-center min-vh-100 px-2">
    <div class="text-center">
      <h1 class="display-1 fw-bold">404</h1>
      <p class="fs-2 fw-medium mt-4">¡Ups! Página no encontrada</p>
      <p class="mt-4 mb-5">La página que estás buscando no existe o ha sido movida.</p>
      <a href="<?= BASE_URL ?>" class="btn btn-secondary">
        Home
      </a>
    </div>
  </div>
</body>
</html>