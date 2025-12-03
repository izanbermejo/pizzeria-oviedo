<table>
  <tr>
    <td>IdCaracteristica</td>
    <td>NombreCaracteristica</td>
    <td>Icono</td>
  </tr>
<?php foreach ($listaCaracteristicasNutricionales as $caracteristicaNutricional) {?>
  <tr>
    <td><?=$caracteristicaNutricional->getIdCaracteristica() ; ?></td>
    <td><?=$caracteristicaNutricional->getNombreCaracteristica() ; ?></td>
    <td><?=$caracteristicaNutricional->getIcono() ; ?></td>
    <td><a href="?controller=caracteristicanutricional&action=show&idcaracteristicanutricional=<?=$caracteristicaNutricional->getIdCaracteristica() ; ?>">link</a></td>
  </tr>
<?php } ?>

</table>