<?php

class TipoModel extends Dao {

    protected $id;
    protected $nombre;
    protected $categoria;

    public function insert() {

        $stmt = "INSERT INTO tipo_producto (Nombre,Categoria)"
                . "VALUES (:nombre,:categoria)";

        $parameters [':nombre'] = $this->nombre;
        $parameters [':categoria'] = $this->categoria;

        return $this->simpleQuery($stmt, $parameters);
    }

    public function select() {

        $stmt = "SELECT * FROM tipo_producto";

        return $this->resultQuery($stmt, array());
    }

    public function selectById() {

        $stmt = "SELECT * FROM tipo_producto "
                . "WHERE Id = :id";

        $parameters [':id'] = $this->id;

        return $this->resultQuery($stmt, $parameters);
    }

    public function selectByCategory($categoria) {

        $stmt = "SELECT * FROM tipo_producto "
                . "WHERE Categoria like :categoria";

        $parameters [':categoria'] = $categoria;
       
        return $this->resultQuery($stmt, $parameters);
    }

    public function update() {

        $stmt = "UPDATE tipo_producto "
                . "SET Nombre = :nombre, Categoria = :categoria "
                . "WHERE Id = :id";

        $parameters [':id'] = $this->id;
        $parameters [':nombre'] = $this->nombre;
        $parameters [':categoria'] = $this->categoria;

        return $this->simpleQuery($stmt, $parameters);
    }

    public function delete() {

        $stmt = "DELETE FROM tipo_producto "
                . "WHERE Id = :id";

        $parameters [':id'] = $this->id;

        return $this->simpleQuery($stmt, $parameters);
    }

}
