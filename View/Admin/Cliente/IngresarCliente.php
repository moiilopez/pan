<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Insertar Cliente</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
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
            </div>
        </div>
    </div>
</div>