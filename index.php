<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Front controller 
require_once "model/conexion.php";
require_once "model/usuario.php";
session_start();

// Validación de sesión
/*if (isset($_SESSION['user']) || (isset($_POST['usuario']) && isset($_POST['contrasena']))) {*/
    if (!isset($_GET['c'])) {
        // Cargar el controlador home por defecto
        require_once 'controller/homeController.php';
        $controller = new HomeController();
        call_user_func(array($controller, "index"));
    } else {
        // Cargar el controlador y la acción especificados en la URL
        $controller = $_GET['c'];
        require_once "controller/{$controller}Controller.php";
        $controller = ucwords($controller) . "Controller";
        $controller = new $controller;
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';
        call_user_func(array($controller, $action));
    }
/*} else {
    // Si no se cumple la condición, reenviar al login
    require_once 'controller/homeController.php';
    $controller = new HomeController();
    call_user_func(array($controller, "index"));
}*/
?>
