<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de Usuarios</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $us): ?>
                            <tr>
                                <td><?php echo $us ['Id'] ?></td>
                                <td><?php echo $us ['Nombre'] ?></td>
                                <td><?php echo $us ['Apellido'] ?></td>
                                <td><?php echo $us ['Username'] ?></td>
                                <td><?php echo $us ['Email'] ?></td>
                                <td><?php echo $us ['Documento'] ?></td>
                                <td><?php echo $us ['Telefono'] ?></td>
                                <td><?php echo $us ['Direccion'] ?></td>
                                <td>
                                    <?php if ($_SESSION['pan'][0]['Nombre'] == $us ['Nombre'] || $_SESSION['pan'][0]['Tipo'] == 1) : ?>
                                        <a href="index.php?Controller=UsuarioController&Action=actualizar&id=<?php echo $us ['Id'] ?>">
                                            <button class="btn btn-warning btn-xs" type="button">
                                                <i class="fa fa-pencil-square"></i>
                                            </button>
                                        </a>|
                                        <a href="index.php?Controller=UsuarioController&Action=eliminar&id=<?php echo $us ['Id'] ?>">
                                            <button class="btn btn-danger btn-xs" type="button">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</div>