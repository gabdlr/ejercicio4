<?php
include_once 'includes/bd.php';

$sql = " SELECT COUNT(*) FROM usuarios WHERE SEXO = 'M' ";
$resultado = $conn->query($sql);
$resultado = $resultado->fetch_assoc();
$arreglo_resultados = array();
$arreglo_resultados['M'] = $resultado['COUNT(*)'];


$sql = " SELECT COUNT(*) FROM usuarios WHERE SEXO = 'H' ";
$resultado = $conn->query($sql);
$resultado = $resultado->fetch_assoc();
$arreglo_resultados['H'] = $resultado['COUNT(*)'];
$conn->close();


echo json_encode($arreglo_resultados);
?>