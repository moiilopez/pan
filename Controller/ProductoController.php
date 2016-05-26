<?php

class ProductoController extends ProductoModel {

    public function get() {

        $this->nombre = $_POST['nombre'];
        $this->tipo = $_POST['tipo'];
        $this->precio = $_POST['precio'];
        $this->moneda = '$';
        $this->descripcion = $_POST['descripcion'];
    }

    public function ingresar() {

        if (isset($_POST['submit'])) {

            $this->get();
            
            if (isset($_FILES['imagen']) && $_FILES['imagen']['name']) {

                $this->imagen = $_FILES['imagen']['name'];

                $target_path = "Img/Upload/";
                $target_path = $target_path . basename($_FILES['imagen']['name']);

                move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
            } else {
                $this->imagen = "ImgDft.jpg";
            }

            if ($this->insert()) {
                $msj = "ok";
            }
        }

        $tipo = new TipoModel();
        $tipos = $tipo->select();

        include ('View/Admin/Producto/IngresarProducto.php');
    }

    public function eliminar() {

        if (isset($_GET['id'])) {

            $this->id = $_GET['id'];

            if ($this->delete()) {
                echo '<div class="alert alert-success">'
                . '<button class="close" data-dismiss="alert">x</button>'
                . '<p>Producto eliminado con Exito</p>'
                . '</div>';
            } else {
                echo '<div class="alert alert-danger">'
                . '<button class="close" data-dismiss="alert">x</button>'
                . '<p>Error, no se pudo eliminar</p>'
                . '</div>';
            }
        }
    }

    public function listar() {

        $productos = $this->select();

        include ('View/Admin/Producto/ListarProducto.php');
    }

    public function listarDisponibles() {

        $productos = $this->selectAvailable();

        include ('View/Admin/Producto/ListarProducto.php');
    }

    public function buscar() {

        if (isset($_POST['submit'])) {

            if (isset($_POST['desac'])) {
                $this->nombre = $_POST['nombre'];

                $productos = $this->searchDisable();
            } else {
                $this->nombre = $_POST['nombre'];

                $productos = $this->search();
            }
        }

        include ('View/Admin/Producto/ListarProducto.php');
    }

    public function actualizar() {

        if (isset($_POST['nombre'])) {

            $this->id = $_GET['id'];

            $this->get();

            if (isset($_FILES['imagen']) && $_FILES['imagen']['name']) {

                $this->imagen = $_FILES['imagen']['name'];

                $target_path = "Img/Upload/";
                $target_path = $target_path . basename($_FILES['imagen']['name']);

                move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
            } else {
                $this->imagen = $_POST['actual'];
            }

            if ($this->update()) {
                $msj = "ok";
            }
        }

        if (isset($_GET['id'])) {

            $this->id = $_GET['id'];

            $producto = $this->selectAllById();    
            
            $disponibilidad = $this->disponibilidad();
            
            $tipo = new TipoModel();
            $tipos = $tipo->select();
        }

        include ('View/Admin/Producto/EditarProducto.php');
    }

    public function producto() {

        if (isset($_GET['id'])) {

            $this->id = $_GET['id'];

            $producto = $this->selectAllById();
            
            $disponibilidad = $this->disponibilidad();

        }
        include 'View/Admin/Producto/ProductoInfo.php';
    }

    public function activar() {

        if (isset($_GET['id'])) {

            $this->id = $_GET['id'];

            if ($this->enable()) {
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $_SERVER['HTTP_REFERER'] . '">';
            }
        }
    }

    public function desactivar() {

        if (isset($_GET['id'])) {

            $this->id = $_GET['id'];

            if ($this->disable()) {
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $_SERVER['HTTP_REFERER'] . '">';
            }
        }
    }

    public function disponible() {

        if (isset($_POST['id'])) {
            $this->id = $_POST['id'];
            $this->disponible = $_POST['disponible'];

            if ($this->available()) {
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL=' . $_SERVER['HTTP_REFERER'] . '">';
            }
        }
    }
    
    public function disponibilidad(){
        
        $disponibilidad[0] = "No Disponible";
        $disponibilidad[1] = "Disponible";
        $disponibilidad[2] = "Consultar";
        
        return $disponibilidad;
    }

}
