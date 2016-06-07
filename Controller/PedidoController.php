<?php

class PedidoController extends PedidoModel {

    public function __construct() {

        if (!isset($_SESSION['Pedido'])) {

            $_SESSION['Pedido']['Productos'] = array();
            $_SESSION['Pedido']['Cantidad'] = 0;
            $_SESSION['Pedido']['Total'] = 0;
        }
    }

    public function mostrar() {

        include 'View/Page/Pedido.php';
    }

    public function agregar() {

        if (isset($_GET['Id'])) {

            $this->id = $_GET['Id'];

            if (isset($_SESSION['Pedido']['Productos'][$this->id])) {

                $_SESSION['Pedido']['Productos'][$this->id]['CantidadProducto'] += 1;
                $_SESSION['Pedido']['Productos'][$this->id]['TotalProducto'] += $_SESSION['Pedido']['Productos'][$this->id]['Precio'];
                $_SESSION['Pedido']['Cantidad'] += 1;
                $_SESSION['Pedido']['Total'] += $_SESSION['Pedido']['Productos'][$this->id]['Precio'];
            } else {

                $productoModel = new ProductoModel();
                $productoModel->id = $this->id;

                $this->articulo = $productoModel->selectById();

                $this->articulo['Fecha'] = date('d/m/Y - H:i:s');
                $this->articulo['CantidadProducto'] = 1;
                $this->articulo['TotalProducto'] = $this->articulo['Precio'];

                $_SESSION['Pedido']['Productos'][$this->id] = $this->articulo;
                $_SESSION['Pedido']['Cantidad'] += $this->articulo['CantidadProducto'];
                $_SESSION['Pedido']['Total'] += $this->articulo['TotalProducto'];
            }

            if ($_SESSION['Pedido']['Productos'][$this->id]) {

                header('Location: index.php?Controller=PedidoController&Action=mostrar');
            }
        }
    }

    public function eliminar() {

        if (isset($_GET['Id'])) {

            $this->id = $_GET['Id'];

            if ($_SESSION['Pedido']['Productos'][$this->id]['CantidadProducto'] > 1) {

                $_SESSION['Pedido']['Productos'][$this->id]['CantidadProducto'] -= 1;
                $_SESSION['Pedido']['Productos'][$this->id]['TotalProducto'] -= $_SESSION['Pedido']['Productos'][$this->id]['Precio'];
                $_SESSION['Pedido']['Cantidad'] -= 1;
                $_SESSION['Pedido']['Total'] -= $_SESSION['Pedido']['Productos'][$this->id]['Precio'];
            } else {

                unset($_SESSION['Pedido']['Productos'][$this->id]);
                $_SESSION['Pedido']['Cantidad'] -= 1;
                $_SESSION['Pedido']['Total'] -= $_SESSION['Pedido']['Productos'][$this->id]['Precio'];
            }
        }

        header('Location: index.php?Controller=PedidoController&Action=mostrar');
    }

    public function confirmarPedido() {

        if (!isset($_SESSION['pan'])) {
            $msj = "Antes de realizar tu pedido debes ingresar al sistema";
            header('Location: index.php?Controller=LoginController&Action=entrar&msj=' . $msj);
        }

        if (isset($_SESSION['Pedido'])) {

            $recibe = $_SESSION['Pedido']['Productos'];
            $i = 0;
            foreach ($recibe as $row) {
                $this->productos[$i] = $row['Id'];
                $this->cantidadProducto[$i] = $row['Cantidad'];
                $i++;
            }

            $this->cliente = $_SESSION['pan']['Id'];
            $this->estado = 0;
            $this->cantidadTotal = 0;

            foreach ($_SESSION['Pedido']['Productos'] as $pedido) {
                $this->cantidadTotal += $pedido['Cantidad'];
            }

            $this->total = 0;

            foreach ($_SESSION['Pedido']['Productos'] as $pedido) {
                $this->total += $pedido['Cantidad'];
            }

            if ($this->insertPedido()) {
                $msj = "ok";
                $_SESSION['Pedido'] = NULL;
                echo 'Pedido registrado con exito';
            }
        }
    }

}
