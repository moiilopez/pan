
<form id="defaultForm" enctype="multipart/form-data" method="POST" action="" class="form-horizontal">
    <?php
    if (isset($msj)) :
        if ($msj == "ok"):
            ?>
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert">x</button>
                <p>Usuario registrado con Exito</p>
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert">x</button>
                <p>Error, no se pudo registrar</p>
            </div>    
        <?php
        endif;
    endif;
    ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="nombre" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Apellido</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="apellido" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Username</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="username" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-5">
            <input type="email" class="form-control" name="email" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Contraseña</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="contrasena" required>
        </div>
    </div>
    <!--                    <div class="form-group">
                            <label class="col-sm-3 control-label">Tipo de Usuario</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" class="flat" name="tipo" value="2"> Usuario
                                </label>
                                <label>
                                    <input type="radio" class="flat" name="tipo" value="3"> Cliente
                                </label>
                            </div>
                        </div>-->
    <div class="form-group">
        <label class="col-sm-3 control-label">Documento</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="documento">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Telefono</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="telefono">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Direccion</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="direccion">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Imagen</label>
        <div class="col-sm-5">
            <input type="file" name="imagen" class="btn-default btn-file" accept="image/*">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <input type="submit" class="btn btn-primary" name="submit" value="Insertar">
        </div>
    </div>
</form>
