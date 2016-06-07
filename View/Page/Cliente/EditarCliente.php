
<?php if (isset($usuario) && $usuario): ?>
<form id="defaultForm" enctype="multipart/form-data" method="POST" action="" class="form-horizontal">
    <?php
    if (isset($msj)) :
        if ($msj == "ok"):
            ?>
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert">x</button>
                <p>Cliente actualizado con Exito</p>
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert">x</button>
                <p>Error, no se pudo actualizar</p>
            </div>    
        <?php
        endif;
    endif;
    ?>
    <input type="text"  name="nombre" value="<?php echo $usuario [0]['Id'] ?>" hidden>
    <div class="form-group">
        <label class="col-sm-3 control-label">Id</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="nom" value="<?php echo $usuario [0]['Id'] ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="nombre" value="<?php echo $usuario [0]['Nombre'] ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="apellido" value="<?php echo $usuario [0]['Apellido'] ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Username</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="username" value="<?php echo $usuario [0]['Username'] ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-5">
            <input type="email" class="form-control" name="email" value="<?php echo $usuario [0]['Email'] ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Contraseña</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="contrasena" value="<?php echo $usuario [0]['Contrasena'] ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Documento</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="documento" value="<?php echo $usuario [0]['Documento'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Telefono</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="telefono" value="<?php echo $usuario [0]['Telefono'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Direccion</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="direccion" value="<?php echo $usuario [0]['Direccion'] ?>"s>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Imagen</label>
        <div class="col-sm-5">
            <img src="Img/Users/<?php echo $usuario[0]['Imagen'] ?>" style="width: 50%"/>
            <br><br>
            <input type="file" name="imagen" class="btn-default" id="nueva" accept="image/*">
            <input type="button" class="btn btn-default" id="boton" value="cambiar imagen">
        </div>
    </div>
    <input type="hidden" name="actual" value="<?php echo $usuario [0]['Imagen'] ?>">
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <input type="submit" class="btn btn-primary" name="submit" value="Actualizar">
        </div>
    </div>
</form>
<?php
    else :
        echo 'Sin datos para editar';
    endif;

