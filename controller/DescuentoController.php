<?php 
include_once 'model/DescuentoDAO.php';

class DescuentoController{

  public function show(){
    $view = 'view/descuento/show.php';
    $idDescuento = $_GET['idDescuento'];
    $descuento = DescuentoDAO::getDescuentoById($idDescuento);
    include_once 'view/main.php';
  }

  public function index(){
    $view = 'view/descuento/index.php';
    $listaDescuentos = DescuentoDAO::getDescuentos();
    include_once 'view/main.php';
  }

  public function getDescuentos() {
    header('Content-Type: application/json; charset-utf-8');

    $listaDescuentos = DescuentoDAO::getDescuentos();
    $data = [];

    foreach ($listaDescuentos as $descuento) {
      $data[] = $descuento->toArray();
    }

    echo json_encode($data);
  }
}
?>