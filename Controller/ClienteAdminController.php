<?php

class ClienteAdminController extends UsuarioModel {
    
    public function get() {

        $this->nombre = $_POST['nombre'];
        $this->apellido = $_POST['apellido'];
        $this->username = $_POST['username'];
        $this->email = $_POST['email'];
        $this->contrasena = $_POST['contrasena'];
        $this->documento = $_POST['documento'];
        $this->telefono = $_POST['telefono'];
        $this->direccion = $_POST['direccion'];
    }
    
    public function ingresar() {

        if (isset($_POST['submit'])) {

            $this->get();
            
            $this->tipo = 3;
            $this->imagen = "UserDft.png";

            if (isset($_FILES['imagen']) && $_FILES['imagen']['name']) {

                $this->imagen = $_FILES['imagen']['name'];

                $target_path = "View/Img/Users/";
                $target_path = $target_path . basename($_FILES['imagen']['name']);

                move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
            }

            if ($this->insert()) {
                $msj = "ok";
            }
        }
        include ('View/Admin/Cliente/IngresarCliente.php');
    }

    public function eliminar() {

        if (isset($_GET['id'])) {

            $this->id = $_GET['id'];

            if ($this->delete()) {
                $msj = '<div class="alert alert-success">
                    <button class="close" data-dismiss="alert">x</button>
                    <p>Cliente eliminado con Exito</p>
                    </div>';
            } else {
                $msj = '<div class="alert alert-success">
                    <button class="close" data-dismiss="alert">x</button>
                    <p>Error, no se pudo eliminar</p>
                    </div>';
            }
        }
        include ('View/Admin/Cliente/EliminarCliente.php');
    }

    public function listar() {

        $usuarios = $this->selectClient();

        include ('View/Admin/Cliente/ListarCliente.php');
    }

    public function actualizar() {

        if (isset($_POST['submit'])) {

            $this->get();
            
            $this->id = $_GET['id'];
            $this->imagen = $_POST['actual'];

            if (isset($_FILES['imagen']) && $_FILES['imagen']['name']) {

                $this->imagen = $_FILES['imagen']['name'];

                $target_path = "View/Img/Users/";
                $target_path = $target_path . basename($_FILES['imagen']['name']);

                move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
            }

            if ($this->update()) {
                $msj = "ok";
            }
        }

        if ($_GET['id']) {

            $this->id = $_GET['id'];

            $usuario = $this->selectClientById();
        }

        include ('View/Admin/Cliente/EditarCliente.php');
    }
    
}
