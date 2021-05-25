<?php include 'includes/layout/header.php'?>
<body>
    <!-- Main content -->
<div class="container">
<?php include 'includes/layout/nav-bar.php'?>
<section class="content">
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
        <div class="box-header">
            <h3 class="box-title">Maneja los usuarios en esta sección</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="registros" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Rol</th>
                <th>Acciones</th>                 
            </tr>
            </thead>
            <tbody>
                <?php
                 try {
                    $sql = "SELECT * ";
                    $sql .= " FROM usuarios, roles ";
                    $sql .= " WHERE usuarios.ROLID=roles.ROLID ";
                    $sql .= " ORDER BY NOMBRE ASC ";
                    $resultado = $conn->query($sql);
                 } catch (Exception $e) {
                     $error = $e->getMessage();
                     echo $error;
                 }
                 while ($usuario = $resultado->fetch_assoc() ) {?>
                    <tr>
                        <td><?php echo $usuario['NOMBRE']; ?></td>
                        <td><?php echo $usuario['EDAD']; ?></td>
                        <td><?php echo $usuario['SEXO']; ?></td>
                        <td><?php echo $usuario['DESCRIPCION']; ?></td>
                        <td><a href="editar-registro.php?id=<?php echo $usuario['ID']; ?>" class="btn bg-orange btn-flat margin">
                        <i class="fa fa-pencil"></i></a>
                            <a href="#" data-id="<?php echo $usuario['ID'];?>" data-tipo="evento" class="btn bg-maroon btn-flat borrar-registro margin">
                        <i class="fa fa-trash"></i></a>
                        </td> 
                    </tr>                 
                <?php
                }
                ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Rol</th>
                <th>Acciones</th> 
            </tr>
            </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
</div>
<?php include 'includes/layout/footer.php' ?>