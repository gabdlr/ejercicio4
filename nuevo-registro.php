<?php include 'includes/layout/header.php'?>

<div class="container">
<?php include 'includes/layout/nav-bar.php'?>
<div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Crear Usuario</h3> 
    </div>
    <div class="box-body">
    <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="model.php">
    <?php include 'includes/layout/formulario-usuarios.php' ?>
        <div class="box-footer">
            <input type="hidden" name="registro" value="nuevo">
            <button type="submit" class="btn btn-primary">Añadir</button>
        </div>
        </form>
    </div>
    <!-- /.box-body -->
    
</div>
<!-- /.box -->
</div>
<?php include 'includes/layout/footer.php'?>