<?php 
include_once 'model/CodigoDescuentoDAO.php';

class CodigoDescuentoController{

  public function indexActivos(){
    $listaCodigosDescuento = CodigoDescuentoDAO::getCodigosDescuentoActivos();
    return $listaCodigosDescuento;
  }

  public function getCodigosDescuento() {
    header('Content-Type: application/json; charset-utf-8');

    $listaCodigosDescuento = CodigoDescuentoDAO::getCodigosDescuento();
    $data = [];

    foreach ($listaCodigosDescuento as $codigoDescuento) {
      $data[] = $codigoDescuento->toArray();
    }

    echo json_encode($data);
  }

  public function getCodigosDescuentoActivos() {
    header('Content-Type: application/json; charset-utf-8');

    $listaCodigosDescuentoActivos = CodigoDescuentoDAO::getCodigosDescuentoActivos();
    $data = [];

    foreach ($listaCodigosDescuentoActivos as $codigoDescuento) {
      $data[] = $codigoDescuento->toArray();
    }

    echo json_encode($data);
  }
}
?>