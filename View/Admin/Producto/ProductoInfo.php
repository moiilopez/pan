<script>
    $(document).ready(function () {
        $("#submit").hide();

        $("#disp").click(function () {
            $("#submit").show();
        });
    });
</script>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $producto['Nombre']; ?></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-image">
                        <img src="Img/Upload/<?php echo $producto['Imagen']; ?>" alt="..." />
                    </div>  
                </div>

                <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                    <h3 class="prod_title"><?php echo $producto['Nombre']; ?></h3>
                    <div class="product_price">
                        <h4 class=""><strong>ID:</strong> <?php echo $producto['Id']; ?></h4>
                        <h4 class=""><strong>Tipo:</strong> <?php echo $producto['Tip']; ?></h4>
                        <h4 class=""><strong>Fecha de ingreso:</strong> <?php echo $producto['Fecha']; ?></h4>
                    </div>
                    <br>
                    <div class="">
                        <div class="product_price">
                            <h1 class="price"><strong>Precio: </strong> <?php echo '$ ' . $producto['Precio']; ?></h1>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="">
                        <a href="index.php?Controller=ProductoController&Action=actualizar&id=<?php echo $producto['Id'] ?>"><button type="button" class="btn btn-primary btn-lg">Editar</button></a>
                        <?php if ($producto['Estado'] == 1): ?>
                            <a href="index.php?Controller=ProductoController&Action=desactivar&id=<?php echo $producto['Id'] ?>"><button type="button" class="btn btn-danger btn-lg">Desactivar</button></a>
                        <?php else : ?>
                            <a href="index.php?Controller=ProductoController&Action=activar&id=<?php echo $producto['Id'] ?>"><button type="button" class="btn btn-success btn-lg">Activar</button></a>
                        <?php endif; ?>
                    </div>
                    <br>
                    <div class="col-sm-14" style="margin-left: -45px">
                        <form method="POST" action="index.php?Controller=ProductoController&Action=disponible" class="form-horizontal">
                            <input type="text" value="<?php echo $producto ['Id'] ?>" hidden name="id">
                            <label class="col-sm-4 control-label">Disponibilidad: </label>
                            <div class="col-sm-4">
                                <select class="form-control" name="disponible" id="disp" required>
                                    <?php
                                    for ($i = 0; $i < 3; $i++) :
                                        if ($producto ['Disponible'] == $i) :
                                            ?>
                                            <option value="<?php echo $i ?>" selected><?php echo $disponibilidad[$i] ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $i ?>" ><?php echo $disponibilidad[$i] ?></option>
                                        <?php
                                        endif;
                                    endfor;
                                    ?>  
                                </select>
                            </div>
                            <input type="submit" class="btn btn-success" id="submit" name="submit" value="Cambiar Estado">
                        </form>

                    </div>
                </div>


                <div class="col-md-12">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Descripcion</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab"  aria-expanded="false">Profile</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <p><?php echo $producto['Descripcion']; ?></p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <p></p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <p></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>