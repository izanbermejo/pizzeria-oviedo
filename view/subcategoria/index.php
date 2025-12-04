<table>
  <tr>
    <td>IdSubcategoria</td>
    <td>IdCategoria</td>
    <td>NombreSubcategoria</td>
    <td>DescripcionSubcategoria</td>
  </tr>
<?php foreach ($listaSubcategorias as $subcategoria) {?>
  <tr>
    <td><?=$subcategoria->getIdSubcategoria() ; ?></td>
    <td><?=$subcategoria->getIdCategoria() ; ?></td>
    <td><?=$subcategoria->getNombreSubcategoria() ; ?></td>
    <td><?=$subcategoria->getDescripcionSubcategoria() ; ?></td>
    <td><a href="?controller=subcategoria&action=show&idsubcategoria=<?=$subcategoria->getIdSubcategoria() ; ?>">link</a></td>
  </tr>
<?php } ?>

</table>