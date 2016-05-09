<?php

class PaginaController {

    public function index() {
    }

    public function clasificar() {

        if (isset($_GET['Tipo'])) {

            $productoModel = new ProductoModel();
            $productoModel->tipo = $_GET['Tipo'];
            $productoModel->marca = "";
            $productoModel->color = "";
            $productoModel->precio = "";

            if (isset($_GET['Marca'])) {
                $productoModel->marca = $_GET['Marca'];
            }

            if (isset($_GET['Color'])) {
                $productoModel->color = $_GET['Color'];
            }

            if (isset($_GET['Precio'])) {
                $productoModel->precio = $_GET['Precio'];
            }

            $cantidad = count($productoModel->selectByType());

            if ($cantidad % 16 == 0) {
                $paginas = $cantidad / 16;
            } else {
                $paginas = intval($cantidad / 16) + 1;
            }

            if (isset($_GET['Limit'])) {
                $min = $_GET['Limit'];
            } else {
                $min = 0;
            }

            $productos = $productoModel->selectByTypeLimit($min);
            $filtros = $this->filtros();
            $marcas = $productoModel->selectProductBrand();
            $colores = $this->colores($productoModel->tipo);
            $tipoModel = new TipoModel();
            $tipos = $tipoModel->selectByCategory($productos[0]['Categoria']);
        }
        include 'View/Pagina/Clasificados.php';
    }

    public function producto() {

        if (isset($_GET['Id'])) {

            $productoModel = new ProductoModel();
            $productoModel->id = $_GET['Id'];
            $producto = $productoModel->selectById();

            $homeModel = new HomeModel();
            $productos = $homeModel->selectNew();
            $oferta = $homeModel->selectOffer();
            
            $productoController = new ProductoController();
            $disponibilidad = $productoController->disponibilidad();
            
            $colores = explode(" - ", $producto[0]['Color']);
        }

        include 'View/Pagina/Producto.php';
    }

    public function buscar() {

        if (isset($_GET['search']) || isset($_POST['search'])) {

            if (isset($_GET['search'])) {
                $search = $_GET['search'];
            } elseif (isset($_POST['search'])) {
                $search = $_POST['search'];
            }

            $productoModel = new ProductoModel();
            $productoModel->nombre = $search;

            $cantidad = count($productoModel->search());

            if ($cantidad % 12 == 0) {
                $paginas = $cantidad / 12;
            } else {
                $paginas = intval($cantidad / 12) + 1;
            }

            if (isset($_GET['Limit'])) {
                $min = $_GET['Limit'];
            } else {
                $min = 0;
            }

            $productos = $productoModel->searchLimit($min);

            $tipoModel = new TipoModel();
            $tipos = $tipoModel->select();
        }
        include ('View/Pagina/Resultado.php');
    }

    public function colores($tipo) {

        $productoModel = new ProductoModel();

        $productoModel->tipo = $tipo;

        $resultado = $productoModel->selectColor();

        for ($i = 0; $i < count($resultado); $i++) {
            $matriz[$i] = explode(" - ", $resultado[$i]['Color']);
        }

        $a = 0;
        
        for ($i = 0; $i < count($matriz); $i++) {        
            foreach ($matriz[$i] as $value) {
                $simple[$a] = $value;
                $a++;
            }
        }
        
        $unico = array_unique($simple);
        
        for($i = 0; $i < count($unico); $i++){
            $indexes[$i] = $i;
        }
        
        $colores = array_combine($indexes, $unico);
        
        return $colores;
    }

    public function filtros() {

        $filtros[0] = 'Marca';
        $filtros[1] = 'Color';
        $filtros[2] = 'Precio';

        return $filtros;
    }

}
