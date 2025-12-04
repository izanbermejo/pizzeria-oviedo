<table>
  <tr>
    <td>IdCategoria</td>
    <td>NombreCategoria</td>
  </tr>
<?php foreach ($listaCategorias as $categoria) {?>
  <tr>
    <td><?=$categoria->getIdCategoria() ; ?></td>
    <td><?=$categoria->getNombreCategoria() ; ?></td>
    <td><a href="?controller=categoria&action=show&idcategoria=<?=$categoria->getIdCategoria() ; ?>">link</a></td>
  </tr>
<?php } ?>

</table>