<?php

class PaginaController {

    public function index() {
        
        echo 'Pagina';
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
