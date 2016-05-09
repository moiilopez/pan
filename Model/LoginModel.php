<?php
class LoginModel extends Dao {
    
    protected $username;
    protected $password;
    protected $email;
    
    protected function logar(){
        
        $stmt = "SELECT tipo_usuario.nombre AS tipo,usuario.* "
                . " FROM usuario "
                . " INNER JOIN tipo_usuario "
                . " ON usuario.tipo = tipo_usuario.id "
                . " WHERE username = :username || email = :username && contrasena = :contrasena";
        
        $parameters [':username'] = $this->username;
        $parameters [':contrasena'] = $this->contrasena;
       
        
        return $this->resultQuery($stmt, $parameters);
    }
}