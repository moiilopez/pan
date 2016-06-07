<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pedido</title>
    </head>
    <body style="font-family: Verdana">
        Pedido
        <br><br>
        <?php if (isset($_SESSION['Pedido']) && !empty($_SESSION['Pedido']['Productos'])): ?>
            <table border="1" style="border: solid #007dbb; margin: 10px; float: left">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($_SESSION['Pedido']['Productos'] as $carrito):
                        ?>
                        <tr>
                            <td style="width: 80px; text-align: center"><?php echo $i; ?></td>
                            <td style="width: 80px; text-align: center"><?php echo $carrito['Nombre']; ?></td>
                            <td style="width: 80px; text-align: center"><?php echo $carrito['Precio']; ?></td>
                            <td style="width: 80px; text-align: center"><?php echo $carrito['CantidadProducto']; ?></td>
                            <td style="width: 80px; text-align: center"><?php echo $carrito['TotalProducto']; ?></td>
                            <td style="width: 80px; text-align: center"><a href="index.php?Controller=PedidoController&Action=eliminar&Id=<?php echo $carrito['Id'] ?>" style="float:right; margin-right: 10px"><button>eliminar</button></a></td>
                        </tr>

                        <?php
                        $i++;
                    endforeach;
                    ?>
                </tbody>
            </table>
            <div style="border: solid #007dbb; margin: 10px; width: 180px; height: 120px; float: left; padding: 5px 0 0 20px">
                <p>
                    Cantidad de productos: <strong><?php echo $_SESSION['Pedido']['Cantidad']; ?></strong> <br><br>
                    Total: <strong><?php echo'$' . $_SESSION['Pedido']['Total']; ?></strong>
                </p>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
            <?php
        else :
            echo 'Su carrito esta vacio';
        endif;
        ?>
        <a href="index.php">Seguir Comprando</a>
    </body>
</html>
