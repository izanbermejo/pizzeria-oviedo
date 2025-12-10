<?php 
require_once "config/config.php";
include_once 'controller/ProductoController.php';
include_once 'controller/IngredienteController.php';
include_once 'controller/CaracteristicaNutricionalController.php';
include_once 'controller/CategoriaController.php';
include_once 'controller/SubcategoriaController.php';
include_once 'controller/HomeController.php';
include_once 'controller/CartaController.php';
include_once 'controller/ContactoController.php';
include_once 'controller/InicioSesionController.php';

if (isset($_GET['controller'])) {
  $nombre_controller = $_GET['controller']. 'Controller';
  if (class_exists($nombre_controller)) {
    $controller = new $nombre_controller();
    $action = $_GET['action'];
    if (isset($_GET['action']) && method_exists($controller,$action)) {
      $controller -> $action();
    } else {
      header('Location:404.php');
    }
  } else {
    header('Location:404.php');
  }
} else {
  
  $controller = new HomeController();
  $controller -> index();

  //  http://localhost/pizzeriaOviedo/?controller=Producto&action=index
} ?>