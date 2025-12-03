<table>
  <tr>
    <td>IdProducto</td>
    <td>IdSubcategoria</td>
    <td>IdDescuento</td>
    <td>NombreProducto</td>
    <td>Descripcion</td>
    <td>PrecioProducto</td>
    <td>ImagenProducto</td>
    <td>Link producto</td>
    <td>Link ingredientes producto</td>
    <td>Link caracteristicas nutricionales producto</td>
  </tr>
<?php foreach ($listaProductos as $producto) {?>
  <tr>
    <td><?=$producto->getIdProducto() ; ?></td>
    <td><?=$producto->getIdSubcategoria() ; ?></td>
    <td><?=$producto->getIdDescuento() ; ?></td>
    <td><?=$producto->getNombreProducto(); ?></td>
    <td><?=$producto->getDescripcion() ; ?></td>
    <td><?=$producto->getPrecioProducto() ; ?></td>
    <td><?=$producto->getImagenProducto(); ?></td>
    <td><a href="?controller=Producto&action=show&idproducto=<?=$producto->getIdProducto() ; ?>">link</a></td>
    <td><a href="?controller=Ingrediente&action=indexByProducto&idproducto=<?=$producto->getIdProducto() ; ?>">link</a></td>
    <td><a href="?controller=CaracteristicaNutricional&action=indexByProducto&idproducto=<?=$producto->getIdProducto() ; ?>">link</a></td>
  </tr>
<?php } ?>

</table>