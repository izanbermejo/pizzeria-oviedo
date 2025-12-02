<?=$producto->getIdProducto(); ?>
<?=$producto->getIdSubcategoria(); ?>
<?=$producto->getIdDescuento(); ?>
<?=$producto->getNombreProducto(); ?>
<?=$producto->getDescripcion(); ?>
<?=$producto->getPrecioProducto(); ?>
<?=$producto->getImagenProducto(); ?> 

<img src="public/assets/productos/<?= $producto->getImagenProducto(); ?>" alt="Imagen <?= $producto->getNombreProducto() ?>">