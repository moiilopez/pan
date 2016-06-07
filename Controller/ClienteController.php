<?php

class ClienteController extends UsuarioModel {

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
            
            $this->imagen = "UserDft.png";
            $this->tipo = 3;
            
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
        include ('View/Page/Cliente/IngresarCliente.php');
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
//                $msj = "ok";
            }
        }

        if ($_GET['id']) {

            $this->id = $_GET['id'];

            $usuario = $this->selectClientById();
        }

        include ('View/Page/Cliente/EditarCliente.php');
    }

}
