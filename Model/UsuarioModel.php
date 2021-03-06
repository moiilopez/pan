<?php

class UsuarioModel extends Dao {
 
    public $id;
    public $nombre;
    public $apellido;
    public $username;
    public $email;
    public $contrasena;
    public $imagen;
    public $tipo;
    public $documento;
    public $telefono;
    public $direccion;
    
    public function insert() {
        
        $stmt = "INSERT INTO usuario (Nombre,Apellido,Username,Email,Contrasena,Imagen,Tipo,Documento,Telefono,Direccion,Fecha)"
                . " VALUES (:nombre,:apellido,:username,:email,:contrasena,:imagen,:tipo,:documento,:telefono,:direccion,now())";
        
        $parameters [':nombre'] = $this->nombre;
        $parameters [':apellido'] = $this->apellido;
        $parameters [':username'] = $this->username;
        $parameters [':email'] = $this->email;
        $parameters [':contrasena'] = $this->contrasena;
        $parameters [':imagen'] = $this->imagen;
        $parameters [':tipo'] = $this->tipo;
        $parameters [':documento'] = $this->documento;
        $parameters [':telefono'] = $this->telefono;
        $parameters [':direccion'] = $this->direccion;
        
        return $this->simpleQuery($stmt,$parameters);
    }
    
    public function select() {
 
        $stmt = "SELECT * FROM usuario";
        
        return $this->resultQuery($stmt,array());
    }
    
    public function selectClient() {
 
        $stmt = "SELECT * FROM usuario "
                . "WHERE Tipo = 3";
        
        return $this->resultQuery($stmt,array());
    }
    
    public function selectById() {
        
        $stmt = "SELECT * FROM usuario "
                . "WHERE Id = :id";
        
        $parameters [':id'] = $this->id;
        
        return $this->resultQuery($stmt,$parameters);
    }
    
    public function selectClientById() {
        
        $stmt = "SELECT * FROM usuario "
                . "WHERE Id = :id && Tipo = 3";
        
        $parameters [':id'] = $this->id;
        
        return $this->resultQuery($stmt,$parameters);
    }
    
    public function update() {
        
        $stmt = "UPDATE usuario "
                . "SET Nombre = :nombre, Apellido = :apellido, Username = :username, Email = :email, Contrasena = :contrasena, Imagen = :imagen, Documento = :documento, Telefono = :telefono, Direccion = :direccion "
                . "WHERE Id = :id";
        
        $parameters [':id'] = $this->id;
        $parameters [':nombre'] = $this->nombre;
        $parameters [':apellido'] = $this->apellido;
        $parameters [':username'] = $this->username;
        $parameters [':email'] = $this->email;
        $parameters [':contrasena'] = $this->contrasena;
        $parameters [':imagen'] = $this->imagen;
        $parameters [':documento'] = $this->documento;
        $parameters [':telefono'] = $this->telefono;
        $parameters [':direccion'] = $this->direccion;

        return $this->simpleQuery($stmt,$parameters);
    }
    
    public function delete() {
        
        $stmt = "DELETE FROM usuario "
                . "WHERE Id = :id";
        
        $parameters [':id'] = $this->id;
        
        return $this->simpleQuery($stmt,$parameters);
    }
    
}
