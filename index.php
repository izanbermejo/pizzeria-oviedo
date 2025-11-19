<?php 
include_once 'controller/ProductoController.php';

if (isset($_GET['controller'])) {
  $nombre_controller = $_GET['controller']. 'Controller';
  var_dump($nombre_controller); 
  if (class_exists($nombre_controller)) {
    $controller = new $nombre_controller();
    $action = $_GET['action'];
    if (isset(($_GET['action'])) && method_exists($controller,$action)) {
      $controller -> $action();
    } else {
      header('Location:404.php');
    }
  }
} else {
}


//  http://localhost/pizzeriaOviedo/?controller=Producto&action=index