<?php
session_start();

class ClassAutoloader {

    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }

    private function loader($nombreClase) {
        if (file_exists('Controller/' . $nombreClase . '.php')) {
            $carpeta = 'Controller/';
        } elseif (file_exists('Model/' . $nombreClase . '.php')) {
            $carpeta = 'Model/';
        }

        include_once $carpeta . $nombreClase . '.php';
    }

}

if(isset($_GET['Admin'])){
    header('Location: index.php?Controller=AdminController&Action=index');
}

if (isset($_GET['Controller']) && $_GET['Controller'] != 'PaginaController' 
        && $_GET['Controller'] != 'PedidoController' 
        && $_GET['Controller'] != 'ClienteController'
        && $_GET['Controller'] != 'LoginController') {

    new ClassAutoloader();
    
    if (isset($_SESSION["pan"]) && $_SESSION["pan"]["Tipo"] != 3) {

        include 'View/Admin/AdminHeader.php';

        if (isset($_GET['Controller'])) {
            $controller = $_GET['Controller'];
        } else {
            $controller = 'AdminController';
        }

        if (isset($_GET['Action'])) {
            $action = $_GET['Action'];
        } else {
            $action = 'index';
        }

        $controller = new $controller();
        $controller->$action();

        include 'View/Admin/AdminFooter.php';
    } else {
        
        $controller = new LoginController();
        $controller->entrar();
    }
    
} else {

    new ClassAutoloader();

    //include 'View/Pagina/Front/PaginaHeader.php';
    
    if (isset($_GET['Controller'])) {
        $controller = $_GET['Controller'];
    } else {
        $controller = 'PaginaController';
    }

    if (isset($_GET['Action'])) {
        $action = $_GET['Action'];
    } else {
        $action = 'index';
    }

    $controller = new $controller();
    $controller->$action();
    
    //include 'View/Pagina/Front/PaginaFooter.php';
}