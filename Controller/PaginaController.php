<?php

class PaginaController {

    public function index() {
        
        $productoModel = new ProductoModel();
        
        $todos = $productoModel->select();
        
        include 'View/Page/Home.php';
    }

    public function clasificar() {

        include 'View/Pagina/Clasificados.php';
    }

    public function producto() {


        include 'View/Pagina/Producto.php';
    }

    public function buscar() {

        include ('View/Pagina/Resultado.php');
    }

}
