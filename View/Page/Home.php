<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach ($todos as $tod):
            ?>
            <div style="border: 2px solid; height: 100px; width: 200px; padding: 10px 0 0 10px; float: left">
                <?php
                echo $tod['Nombre'] . '<br>';
                echo '$ ' . $tod['Precio'] . '<br>';
                echo $tod['Descripcion'];
                ?>
                <br>
                <a href="index.php?Controller=PedidoController&Action=agregar&Id=<?php echo $tod['Id'] ?>" style="float:right; margin-right: 10px"><button>Agregar al carrito</button></a>
            </div>
            <?php
        endforeach;
        echo '<br><br><br><br><br><br>';
        if (!isset($_SESSION["pan"])):
            ?>
            <a href="index.php?Controller=LoginController&Action=entrar">Login</a>
            <?php
        else :
            echo 'Bienvenido: ' . $_SESSION["pan"]["Nombre"] . '<br><br>';
            ?>
            <a href="index.php?Controller=LoginController&Action=salir">Salir</a>
        <?php endif; ?>
        <br><br>
        <a href="index.php?Controller=PedidoController&Action=mostrar">Pedido</a>
    </body>
</html>
