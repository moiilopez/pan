<?php

class LoginController extends LoginModel {

    public function entrar() {

        if (isset($_POST['submit'])) {

            $this->username = $_POST['username'];
            $this->password = $_POST['password'];

            $_SESSION["pan"] = $this->Logar();

            if ($_SESSION["pan"]["Tipo"] == 3) {
                header("location: index.php");
            } elseif ($_SESSION["pan"]["Tipo"] == 2 || $_SESSION["pan"]["Tipo"] == 1) {
                header("location: index.php?Controller=AdminController&Action=index");
            } else {
                $msj = 'Usuario o Contrseña invalidos';
            }
        }

        include 'View/Admin/Login.php';
    }

    public function salir() {

        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
            echo '<div class="alert alert-defalult">'
            . '<p>Saliendo...</p>'
            . '</div>';
            echo '<META HTTP-EQUIV=Refresh CONTENT="1; URL=index.php">';
        }
    }

}
