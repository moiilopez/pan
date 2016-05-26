<?php

class LoginModel extends Dao {

    protected $username;
    protected $password;
    protected $email;

    protected function logar() {

        $stmt = "SELECT tipo_usuario.nombre AS tipo,usuario.* "
                . " FROM usuario "
                . " INNER JOIN tipo_usuario "
                . " ON usuario.tipo = tipo_usuario.id "
                . " WHERE BINARY contrasena = :contrasena && BINARY username = :username || BINARY email = :username";

        $parameters [':username'] = $this->username;
        $parameters [':contrasena'] = $this->password;

        return $this->resultQuery($stmt, $parameters);
    }

}
