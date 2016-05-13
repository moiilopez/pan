<?php

class LoginController extends LoginModel {

    public function entrar() {

        if (isset($_POST['submit'])) {

            $this->username = $_POST['username'];
            $this->password = $_POST['password'];

            $_SESSION["pan"] = $this->Logar();

            if ($_SESSION["pan"]) {

                header("location: index.php?Controller=AdminController&Action=index");
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
            echo '<META HTTP-EQUIV=Refresh CONTENT="3; URL=index.php">';
        }
    }

}
