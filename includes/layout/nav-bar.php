<!--
Esta seccion se podria refactorizar con una funcion de php que tome como parametro
la url actual y en base a eso sirva los elementos correspondientes del menu,
tambien se podria utilizar javascript, pero en este caso la balanza se inclina
por la celeridad.
-->
<div class="nav">
    <?php echo !strpos($_SERVER['PHP_SELF'], "index.php") ? "
    <a href=\"index.php\">
    <button class=\"nav-button \">Volver</button>
</a>" : ""?>
    <?php echo !strpos($_SERVER['PHP_SELF'], "nuevo-registro.php") ? "
    <a href=\"nuevo-registro.php\">
    <button class=\"nav-button \">Crear nuevo registro</button>
</a>" : ""?>
    <?php echo !strpos($_SERVER['PHP_SELF'], "chart.php") ? "
    <a href=\"chart.php\">
    <button class=\"nav-button \">Ver gráficos</button>
</a>" : ""?>
</div>