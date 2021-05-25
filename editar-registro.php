<?php
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)) {
    header('Location: index.php');
}
?>
<?php include 'includes/layout/header.php'?>
<?php
    try {
    $sql = "SELECT * FROM usuarios, roles ";
    $sql .= " WHERE usuarios.ROLID=roles.ROLID AND $id = ID ";
    $resultado = $conn->query($sql);
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
    }
    $usuario = $resultado->fetch_assoc();
?>
<div class="container">
<?php include 'includes/layout/nav-bar.php'?>
<div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Editar Usuario</h3>    
    </div>
    <div class="box-body">
    <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="model.php">
    <?php include 'includes/layout/formulario-usuarios.php' ?>
        <div class="box-footer">
            <input type="hidden" name="id_usuario" value="<?php echo $id ?>">
            <input type="hidden" name="registro" value="actualizar">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
    </div>
    <!-- /.box-body -->
    
</div>
<!-- /.box -->
</div>
<?php include 'includes/layout/footer.php'; ?>