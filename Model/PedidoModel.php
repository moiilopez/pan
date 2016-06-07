<?php

class PedidoModel extends Dao {

    protected $id;
    protected $articulo;
    protected $productos;
    protected $cliente;
    protected $estado;
    protected $cantidadProducto;
    protected $cantidadTotal;
    protected $total;

    public function insertPedido() {

        $stmt = 'INSERT INTO pedido (Cliente,Fecha,Estado,Cant_Productos,Total) '
                . 'VALUES (:cliente,now(),:estado,:cantidad,:total)';

        $parameters [':cliente'] = $this->cliente;
        $parameters [':estado'] = $this->estado;
        $parameters [':cantidad'] = $this->cantidadTotal;
        $parameters [':total'] = $this->total;

        $lastInsertId = $this->returnIdQuery($stmt, $parameters);

        
        for ($i = 0; $i < count($this->productos); $i++ ){
            
            $stmt2[$i] = 'INSERT INTO pedido_vs_producto (pedido_Id,producto_Id,cantidad) '
                    . 'VALUES (:pedido,:producto,:cantidad)';
            
            $parameters2 [$i][':pedido'] = $lastInsertId;
            $parameters2 [$i][':producto'] = $this->productos[$i];
            $parameters2 [$i][':cantidad'] = $this->cantidadProducto[$i];
        }
        
        var_dump($parameters2);
        
        return $this->multipleQuery($stmt2, $parameters2);
    }

}
