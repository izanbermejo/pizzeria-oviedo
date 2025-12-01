<table>
  <tr>
    <td>Idingrediente</td>
    <td>Nombreingrediente</td>
    <td>Descripcion</td>
    <td>Precioingrediente</td>
    <td>Imageningrediente</td>
  </tr>
<?php foreach ($listaIngredientes as $ingrediente) {?>
  <tr>
    <td><?=$ingrediente->getIdIngrediente() ; ?></td>
    <td><?=$ingrediente->getNombreIngrediente() ; ?></td>
    <td><?=$ingrediente->getDescripcion() ; ?></td>
    <td><?=$ingrediente->getPrecio(); ?></td>
    <td><?=$ingrediente->getImagenIngrediente() ; ?></td>
    <td><a href="?controller=ingrediente&action=show&idproducto=<?=$ingrediente->getIdingrediente() ; ?>">link</a></td>
  </tr>
<?php } ?>

</table>