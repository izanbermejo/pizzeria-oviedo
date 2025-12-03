<?php 
include_once 'model/CaracteristicaNutricionalDAO.php';

class CaracteristicaNutricionalController{

  public function show(){
    $view = 'view/caracteristicaNutricional/show.php';
    $idCaracteristicaNutricional = $_GET['idcaracteristicanutricional'];
    $caracteristicaNutricional = CaracteristicaNutricionalDAO::getCaracteristicaNutricionalById($idCaracteristicaNutricional);
    include_once 'view/main.php';
  }

  public function index(){
    $view = 'view/caracteristicaNutricional/index.php';
    $listaCaracteristicasNutricionales = CaracteristicaNutricionalDAO::getCaracteristicasNutricionales();
    include_once 'view/main.php';
  }

  public function indexByProducto(){
    $view = 'view/caracteristicaNutricional/indexByProducto.php';
    $idProducto = $_GET['idproducto'];
    $listaCaracteristicasNutricionales = CaracteristicaNutricionalDAO::getCaracteristicaNutricionalByProducto($idProducto);
    include_once 'view/main.php';
  }


}
?>